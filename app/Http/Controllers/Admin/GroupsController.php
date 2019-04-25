<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\Group;
use App\Training;

class GroupsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $groups = Group::with('users')->orderBy('name','ASC')->get();

        return view('admin.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.groups.create');
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
            'name' => 'required|unique:groups|max:255',
        ]);

        $new_group = Group::create($attributes);

        return redirect()->route('admin.admin.groups.edit',['id'=> $new_group->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::with('users', 'trainings')->findOrFail($id);
        return  view('admin.groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        $users = User::orderBy('name','ASC')->get();
        $trainings = Training::orderBy('name', 'ASC')->get();

        return view('admin.groups.edit',compact('group','users', 'trainings'));
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
            'name' => 'required|max:255',
        ]);
        
        $group = Group::findOrFail($id);
        $group->update($attributes);

        return redirect()->route('admin.admin.groups.index');
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
