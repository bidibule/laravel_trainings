<?php

namespace App\Http\Controllers\Member;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use App\Training;

class TrainingsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = User::findOrFail(auth()->id())->trainings()->get();

        $trainings_incompleted = $trainings->where('pivot.status',0);
        $trainings_completed = $trainings->where('pivot.status',1);

        $compliance_percentage = (count($trainings) == 0) ? 0 : round((count($trainings_completed)/count($trainings)*100),2);

        return view('member.trainings.index', compact('trainings_incompleted','trainings_completed','compliance_percentage'));
    }

     /**
     * Display the specified resource with the users and completion status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){  
        
        $training = User::findOrFail(auth()->id())->trainings()->where('id',$id)->first(); 
        return view('member.trainings.show',compact('training'));
    
    }

    public function updateTrainingStatus($id){

        $training = User::findOrFail(auth()->id())->trainings()->where('id',$id)->first();

        $training->users()->updateExistingPivot(auth()->id(),['status' => 1 ,'completion_date' => date('Y-m-d')]);
        
        session()->flash('message', 'Training is now completed');
        return redirect()->route('member.trainings.index');

    }
}
