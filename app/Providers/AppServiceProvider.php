<?php

namespace App\Providers;

use App\Mail\VerifyEmail;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        User::created(function($user)
        {
            if($user->verified != 1)
            {   retry(5,function() use($user) {
                    Mail::to($user)->send(new VerifyEmail($user));
                },100);
            }

        });
    }
}
