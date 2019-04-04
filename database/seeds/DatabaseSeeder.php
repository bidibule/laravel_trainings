<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Making 7 groups
        DB::table('groups')->insert([
            [ 'name' => 'IT'],
            [ 'name' => 'BioIT'],
            [ 'name' => 'Comex'],
            [ 'name' => 'All'],
            [ 'name' => 'Production']
        ]);

        // Inserting default user
        DB::table('users')->insert([
            [ 'name' => 'benjamin Blampain',
              'email' => 'benjamin.blampain@ankaroo.com',
              'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
            ],
           
        ]);

        
        // Making 20 users and link them to groups
        factory(App\User::class, 20)->create()->each(function ($user) {
            $user->groups()->attach(rand(1,5));
            $user->save();
        });

        // Making 30 trainings and link them to group
        factory(App\Training::class, 50)->create()->each(function ($training) {
            $training->groups()->attach(rand(1,5));
            $training->save();
        });
    }
}
