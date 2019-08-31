<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\MedicalBoard;
use Faker\Generator as Faker;

$factory->define(MedicalBoard::class, function (Faker $faker) {
    return [
        'registration_number'=> $faker->numberBetween(20, 22),
        'name'=> $faker->name,
        'field'=> $faker->jobTitle,
        'registration_date'=> $faker->date('Y-m-d', 'now'),
        'user_id'=> function(){
        return factory(App\User::class)->create()->id;
        },
        'employ_id'=> function(){
        return factory(App\Models\Employ::class)->create()->id;
        }

    ];
});
