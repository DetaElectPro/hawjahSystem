<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\RequestSpecialist;
use Faker\Generator as Faker;

$factory->define(RequestSpecialist::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'address' => $faker->address,
        'start_time' => $faker->time('H:i:s', 'now'),
        'end_time' => $faker->time('H:i:s', 'now'),
        'price' => $faker->numberBetween(100, 300),
        'medical_id' => function () {
            return factory(App\Models\MedicalSpecialty::class)->create()->id;
        },
        'status' => random_int(1, 3),
        'user_id'=> function(){
        return factory(App\User::class)->create()->id;
        }
    ];
});
