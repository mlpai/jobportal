<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\JobseekerProfile;
use Faker\Generator as Faker;

$factory->define(JobseekerProfile::class, function (Faker $faker) {
    return [
        'profile_title' => $faker->jobTitle,
        'address' => $faker->address,
        'career_level' => $faker->randomElement([0,1]),
        'key_skills' =>   $faker->randomElement(['Typing','IELTS','PHP','Typescripts']).','.$faker->randomElement(['Typing','IELTS','PHP','Typescripts']).','.$faker->randomElement(['Typing','IELTS','PHP','Typescripts']),
        'current_salary' => random_int(10000,20000),
    ];
});
