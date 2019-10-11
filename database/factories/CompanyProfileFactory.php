<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CompanyProfiles;
use Faker\Generator as Faker;
use App\User;

$factory->define(CompanyProfiles::class, function (Faker $faker) {
    return [

            'CompanyName' => $faker->company,
            'CompanySize' => $faker->numberBetween(1,50),
            'phone' => $faker->phoneNumber,
            'RecruiterType' => $faker->numberBetween(1,2),
            'Refrence' => $faker->numberBetween(1,5),
            'CompanyAddress' => $faker->address,
            'photo' => $faker->randomElement(['1.jpg','2.jpg','3.jpg']),
    ];
});
