<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\AcceptRequest;
use Faker\Generator as Faker;

$factory->define(AcceptRequest::class, function (Faker $faker) {
    return [
        'notes' => $faker->paragraph,
        'recommendation' => $faker->paragraph,
        'rating' => $faker->numberBetween(1, 6),
        'request_id' => function () {
            return factory(App\Models\RequestSpecialist::class)->create()->id;
        },
        'user_id' => function () {
            return factory(\App\Models\Auth\User\User::class)->create()->id;
        },
    ];
});
