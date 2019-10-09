<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AcceptEmergencyServiced;
use Faker\Generator as Faker;

$factory->define(AcceptEmergencyServiced::class, function (Faker $faker) {

    return [
        'needing' => $faker->word,
        'image' => $faker->word,
        'price' => $faker->word,
        'emergency_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
