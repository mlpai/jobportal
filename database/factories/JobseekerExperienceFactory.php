<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\jobseeker_experience;
use Faker\Generator as Faker;

$factory->define(jobseeker_experience::class, function (Faker $faker) {
    return [
            'job_role'=> $faker->jobTitle ,
            'company_name'=> $faker->company ,
            'location'=> $faker->address ,
            'experience_year'=> random_int(0,12) ,
            'experience_month'=> random_int(0,12),
            'drawn_salary'=> random_int(10,50).'000',
            'job_responsibility'=> $faker->paragraph(1),
            'currently_working' => 0,
    ];
});
