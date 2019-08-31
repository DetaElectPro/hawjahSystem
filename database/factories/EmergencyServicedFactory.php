<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EmergencyServiced;
use Faker\Generator as Faker;

$factory->define(EmergencyServiced::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'address' => $faker->word,
        'price_per_day' => $faker->word,
        'type' => $faker->word,
        'available' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
