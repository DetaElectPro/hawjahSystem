<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\MedicalField;
use Faker\Generator as Faker;

$factory->define(MedicalField::class, function (Faker $faker) {
    return [
        'name'=> $faker->jobTitle
    ];
});
