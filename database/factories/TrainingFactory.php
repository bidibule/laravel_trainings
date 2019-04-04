<?php

use Faker\Generator as Faker;

$factory->define(App\Training::class, function (Faker $faker) {
    $first_particle = ['G','P','R'];
    $second_particle = ['DOC','MAN','ISM','INF','LEG','MON','OPE','PER','SUP','VAL'];

    
    return [
        'name' => $faker->randomElement($first_particle).'-'.$faker->randomElement($second_particle).'-V0'.$faker->numberBetween(1,3).'-'.$faker->sentence,
        'effective_date' => $faker->date('Y-m-d'),
        'status' => $faker->numberBetween(0,3)
    ];
});
