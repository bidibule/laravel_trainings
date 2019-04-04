<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
