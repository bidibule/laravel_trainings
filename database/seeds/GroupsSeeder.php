<?php

use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
    }
}
