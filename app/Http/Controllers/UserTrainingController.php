<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Training;
use App\User;

class UserTrainingController extends Controller
{
     /**
     * Show the specific training for this user
     *
     * @param  User  $user
     * @param int $training_id
     * @return \Illuminate\Http\Response
     */
    public function getUserTraining(User $user, $training_id){
        
        $training = $user->trainings->find($training_id);

        return view('trainings.show_user_training',compact('training'));

    }

    public function getUsersTraining(Training $training_id){
        
        $training = $training_id->users()->get();

        return view('trainings.show_training_and_users',compact('training'));

    }

    /**
     * Update the completion specific training for this user
     *
     * @param  User  $user
     * @param int $training_id
     * @return \Illuminate\Http\Response
     */
    public function updateTrainingStatus(User $user, $training_id){

        $training = $user->trainings->find($training_id);

        $completion_date = request()->has('completed') ? date('Y-m-d') : null;
        $training->users()->updateExistingPivot($user->id,['status' => request()->has('completed') ,'completion_date' => $completion_date]);
 
        return redirect()->route('users.show',['id' => $user->id]);

    }
}
