<?php

use Faker\Generator as Faker;

$factory->define(App\Training::class, function (Faker $faker) {
    
    return [
        'category_id' => $faker->numberBetween(1,6),
        'name' => $faker->sentence,
        'effective_date' => $faker->date('d-m-Y'),
        'status' => $faker->numberBetween(0,3),
        'type' => $faker->numberBetween(0,5),
        'path' => 'public/trainings/sample/sample-sop.pdf'
    ];
});
