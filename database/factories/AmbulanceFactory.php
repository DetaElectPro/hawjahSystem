<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ambulance;
use Faker\Generator as Faker;

$factory->define(Ambulance::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'address' => $faker->word,
        'longitude' => $faker->word,
        'latitude' => $faker->word,
        'user_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
