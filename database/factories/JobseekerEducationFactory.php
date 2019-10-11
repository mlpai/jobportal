<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\jobseeker_education;
use Faker\Generator as Faker;

$factory->define(jobseeker_education::class, function (Faker $faker) {
    return [
        'qualification' => $faker->randomElement(['BCA','BA','MBA','MCA']),
        'university' => $faker->randomElement(['Lovely Professioal University','Panjab University','Punjab Technical University','Punjabi University']),
        'year' => $faker->randomElement(['2015','2016','2018','2017']),
        'percentage' => random_int(60,90),
    ];
});
