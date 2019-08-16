<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MedicalSpecialty;
use Faker\Generator as Faker;

$factory->define(MedicalSpecialty::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'medical_id' => function(){
        return factory(App\Models\MedicalField::class)->create()->id;
        },
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
