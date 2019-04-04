<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersTrainingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // We will link real training to user linked to this group
        $users = User::with('groups.trainings')->get();

        foreach($users as $user){
            
            foreach($user->groups as $group){

                foreach($group->trainings as $training){
                    $user->trainings()->attach($training->id,['status' => rand(0,1)]);
                }
            }
            
        }


    }
}
