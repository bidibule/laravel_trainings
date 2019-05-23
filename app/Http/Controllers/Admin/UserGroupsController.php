<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
Use App\User;
use App\Group;

class UserGroupsController extends Controller
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
    
    
    public function update(Request $request, $id){

        $user = User::findOrFail($id);

        // Synchronisation des groupes
        $user->groups()->sync($request->get('groups'));

        // Synchronisation des trainings associés
        $user->syncTrainingsByGroups($request->get('groups'));

        return redirect()->route('admin.users.show',['id'=> $user->id]);
    }

    public function edit(User $user){

        $groups = Group::orderBy('name','ASC')->get();

        return view('admin.users.edit_groups',compact('user', 'groups'));
    }
}
