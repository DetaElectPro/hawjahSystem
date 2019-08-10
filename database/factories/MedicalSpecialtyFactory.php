<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\MedicalSpecialty;
use Faker\Generator as Faker;

$factory->define(MedicalSpecialty::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->jobTitle,
        'medical_id' => random_int(1, 20)
    ];
});
