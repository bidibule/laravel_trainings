<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Group;
use App\Training;

class TrainingGroupsController extends Controller
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

        $training = Training::findOrFail($id);

        // Synchronisation des groupes
        $training->groups()->sync($request->get('groups'));

        // Synchronisation des trainings associés
        $training->syncUsersByGroups($request->get('groups'));

        return redirect()->route('admin.admin.trainings.show',['id'=> $training->id]);
    }

    public function edit(Training $training){

        $groups = Group::orderBy('name','ASC')->get();

        return view('admin.trainings.edit_groups',compact('training', 'groups'));
    }
}
