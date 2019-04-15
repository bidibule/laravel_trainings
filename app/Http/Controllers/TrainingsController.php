<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use App\Training;
use App\User;
use App\Group;

class TrainingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = Training::orderBy('name','ASC')->get();
        

        return view('trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('trainings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // Validation step
        $attributes = $request->validate([
            'name' => 'required|max:255',
            'effective_date' => 'required|date_format:d-m-Y',
            'status' => 'integer|between:0,3',
            'file-training' => 'file|mimes:pdf'
        ]);

        // Store uploaded file
        $file_training = $request->file('file-training');

        // Getting a unique filename for path
        $path = $this->getUniqueFilename($file_training);

        $attributes['path'] = $file_training->storeAs('public/trainings',$path);

        Training::create($attributes);

        return redirect()->route('trainings.index');
    }

    /**
     * Display the specified resource with the users and completion status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){  
        $training = Training::with('users')->find($id);

        //Checking percentage
        $training->total_completion_percentage = ($training->users()->wherePivot('status', 1)->count() / $training->users->count())*100;
      
        return view('trainings.show',compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $training = Training::find($id);
        $users = User::all();
        $groups = Group::all();

        return view('trainings.edit',compact('training','users','groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        // Validation step
        $attributes = $request->validate([
            'name' => 'required|max:255',
            'effective_date' => 'required|date_format:d-m-Y',
            'status' => 'integer|between:0,3'
        ]);
 
        $training = Training::findOrFail($id);
        
        $training->groups()->sync($request->get('groups'));

        // Sync Trainings
        if($request->has('groups'))
            $training->syncUsersByGroups($request->get('groups'));
        else {
           // Removing all links
            $training->users()->detach();
        }

        // Store uploaded file
        if($request->has('file-training') != null){
            $file_training = $request->file('file-training');
    
            // Getting a unique filename for path
            $path = $this->getUniqueFilename($file_training);

            $attributes['path'] = $file_training->storeAs('public/trainings',$path);

            //delete old file
            Storage::delete($training->path);

        }
        

        $training->update($attributes);

        return redirect()->route('trainings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

    }

    /**
     *  Sanitize original filename and get a unique filename for the uploaded PDF
     */
    protected function getUniqueFilename(UploadedFile $file) {
        
        //get file without ext
        $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        $filename = basename($file->getClientOriginalName(),".".$ext);

        return Str::random(12).'-'.Str::lower(Str::slug($filename).'.'.$file->guessClientExtension());
    }
}
