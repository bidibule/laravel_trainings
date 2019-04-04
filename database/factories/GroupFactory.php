<?php

use Faker\Generator as Faker;

$factory->define(App\Group::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['IT','BioIT','Production','Comex','All'])
    ];
});
