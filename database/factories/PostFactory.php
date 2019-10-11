<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostedJob;
use Faker\Generator as Faker;
use App\User;

$factory->define(PostedJob::class, function (Faker $faker) {
    return [
        'JobTitle' => $faker->jobTitle,
        'company_id' => $faker->randomElement(User::where('userType','COMPANY_USER')->get()->pluck('id')->toArray()),
        'Location'=> $faker->randomElement(['delhi','bihar','chandigarh']),
        'JobType' => $faker->numberBetween(1,3),
        'salaryFrom'=>$faker->numberBetween(10000,15000),
        'salaryTo'=>$faker->numberBetween(15000,25000),
        'salarytime'=>$faker->numberBetween(1,2),
        'Positions' => $faker->numberBetween(1,5),
        'IndustryType' => $faker->numberBetween(1,2),
        'JobSummary' => $faker->paragraph(),
        'responsibility' => $faker->paragraph(),
        'skills' => $faker->paragraph(),
    ];
});
