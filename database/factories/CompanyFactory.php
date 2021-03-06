<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'userType'=>   0,
        'verified'=>   $verified = $faker->randomElement([User::VERIFIED_USER,User::UNVERIFIED_USER]),
        'user_token'=> $verified == 0 ? User::generateVerificationCode() : null,
        'remember_token' => Str::random(10),
    ];
});
