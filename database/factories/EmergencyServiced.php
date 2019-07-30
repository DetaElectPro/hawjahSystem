<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\EmergencyServiced;
use Faker\Generator as Faker;

$factory->define(EmergencyServiced::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address'=> $faker->address,
        'price_per_day'=> $faker->numberBetween(200, 1000),
        'available_bed'=> $faker->numberBetween(2,9),
        'type' =>$faker->firstName,
        'user_id'=> function(){
        return factory(App\User::class)->create()->id;
        }
    ];
});
