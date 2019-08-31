<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\EmergencyServiced::class, function (Faker $faker) {
    return [
        'price_per_day'=> 99.0,
        'name' => $faker->firstName,
        'address'=> $faker->address,
        'available'=> $faker->numberBetween(2,9),
        'type' =>$faker->firstName,
        'user_id'=> function(){
        return factory(App\User::class)->create()->id;
        }
    ];
});
