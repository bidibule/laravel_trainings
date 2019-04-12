<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
use App\Group;

class UserGroupsController extends Controller
{
    public function update(Request $request, $id){

        $user = User::findOrFail($id);

        // Synchronisation des groupes
        $user->groups()->sync($request->get('groups'));

        // Synchronisation des trainings associés
        $user->assignTrainingsByGroups($request->get('groups'));

        return redirect()->route('users.show',['id'=> $user->id]);
    }

    public function edit(User $user){

        $groups = Group::orderBy('name','ASC')->get();

        return view('users.edit_groups',compact('user', 'groups'));
    }
}
