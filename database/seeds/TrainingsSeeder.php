<?php

use Illuminate\Database\Seeder;

class TrainingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Making 30 trainings and link them to group
        factory(App\Training::class, 50)->create()->each(function ($training) {
            $training->groups()->attach(rand(1,5));
            $training->save();
        });
    }
}
