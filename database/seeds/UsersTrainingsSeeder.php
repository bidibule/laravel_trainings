<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;


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
        $faker = Faker::create();

        foreach($users as $user){
            
            foreach($user->groups as $group){

                foreach($group->trainings as $training){
                    $attributes = array();
                    $attributes['status'] = rand(0,1);

                    if($attributes['status'] == 1){
                        $attributes['completion_date'] =  $faker->dateTimeBetween('Y-m-d');
                    }

                    $user->trainings()->attach($training->id,$attributes);
                }
            }
            
        }


    }
}
