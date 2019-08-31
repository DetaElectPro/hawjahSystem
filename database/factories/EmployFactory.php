<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employ;
use Faker\Generator as Faker;

$factory->define(Employ::class, function (Faker $faker) {

    return [
        'job_title' => $faker->word,
        'graduation_date' => $faker->date('Y-m-d'),
        'birth_of_date' => $faker->date('Y-m-d'),
        'address' => $faker->word,
        'years_of_experience' => $faker->randomDigitNotNull,
        'cv' => $faker->text,
        'user_id'=> function(){
        return factory(App\Models\Auth\User\User::class)->create()->id;
        },
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
