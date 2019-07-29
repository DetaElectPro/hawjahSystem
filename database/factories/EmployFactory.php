<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Employ;
use Faker\Generator as Faker;

$factory->define(Employ::class, function (Faker $faker) {
    return [
        'job_title' => $faker->jobTitle,
        'graduation_date' => $faker->date('Y-m-d'),
        'birth_of_date' => $faker->date('Y-m-d', '-35 years'),
        'address' => $faker->address,
        'years_of_experience' => $faker->numberBetween(1, 3),
        'cv' => $faker->firstName,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }

    ];
});
