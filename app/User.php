<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     const VERIFIED_USER = '1';
     const UNVERIFIED_USER = '0';

     const COMPANY_USER = 'COMPANY_USER';
     const JOBSEEKER_USER = 'JOBSEEKER_USER';
     const ADMIN_USER = 'ADMIN_USER';

     protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password','userType','verified','user_token',
    ];

    public function setUserTypeAttribute($value)
    {
        if(is_numeric($value))
        {
            switch($value)
            {
                case 0 :
                    return $this->attributes['userType'] = User::COMPANY_USER;
                    break;
                case 1 :
                    return $this->attributes['userType'] = User::JOBSEEKER_USER;
                    break;
            }
        }
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','user_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function posts()
    // {
    //     return $this->hasMany('App\PostedJob');
    // }


    public function is_Verfied()
    {
        return $this->verified == User::VERIFIED_USER;
    }

    public static function generateVerificationCode()
    {
        return str_random(40);
    }

}
