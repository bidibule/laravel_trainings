<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use App\User;
use App\Group;
use App\Training;

class UsersController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name','ASC')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('admin.users.create',compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation step
        $attributes = $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|max:255',
            'password' => 'required|min:8'
        ]);

        //hashing password
        $attributes['password'] = Hash::make($attributes['password']);
        
        User::create($attributes);

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('trainings')->findOrFail($id);

        $user->trainings_incompleted = $user->trainings->where('pivot.status',0);
        $user->trainings_completed = $user->trainings->where('pivot.status',1);
        $compliance_percentage = (count($user->trainings) > 0) ? round((count($user->trainings_completed)/count($user->trainings)*100),2) : 0;
      
        return view('admin.users.show',compact('user','compliance_percentage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $groups = Group::all();
        $trainings = Training::all();

        return view('admin.users.edit',compact('user','groups','trainings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 
        $attributes = $request->validate([
            'email' => ['required',Rule::unique('users')->ignore($id)],
            'name' => 'required|max:255',
            'password' => 'nullable|string|min:8'
        ]);
        
        //Checking if password is not null and if so, just remove the password attribute
        if($request->filled('password'))
            $attributes['password'] = Hash::make($attributes['password']);
        else
            unset($attributes['password']);

        $user = User::findOrFail($id);
        $user->update($attributes);

        return redirect()->route('admin.users.show',['id'=> $user->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
