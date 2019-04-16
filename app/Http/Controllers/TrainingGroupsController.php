<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Training;

class TrainingGroupsController extends Controller
{
    public function update(Request $request, $id){

        $training = Training::findOrFail($id);

        // Synchronisation des groupes
        $training->groups()->sync($request->get('groups'));

        // Synchronisation des trainings associés
        $training->syncUsersByGroups($request->get('groups'));

        return redirect()->route('trainings.show',['id'=> $training->id]);
    }

    public function edit(Training $training){

        $groups = Group::orderBy('name','ASC')->get();

        return view('trainings.edit_groups',compact('training', 'groups'));
    }
}
