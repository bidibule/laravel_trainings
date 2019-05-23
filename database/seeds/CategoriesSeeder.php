<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            
        // Making 7 groups
        DB::table('categories')->insert([
            [ 
                'abbreviation' => 'cus',
                'title' => 'Customer'
            ],
            [ 
                'abbreviation' => 'des',
                'title' => 'Design'
            ],
            [ 
                'abbreviation' => 'ope',
                'title' => 'Operational'
            ],
            [ 
                'abbreviation' => 'sup',
                'title' => 'Supplier'
            ],
            [ 
                'abbreviation' => 'inf',
                'title' => 'Infrastructure'
            ],
            [ 
                'abbreviation' => 'doc',
                'title' => 'Document'
            ],
        ]);
    }
}
