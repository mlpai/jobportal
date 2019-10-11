<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Company extends User
{
    public function Jobs()
    {
        return $this->hasMany('App\PostedJob');
    }

    public function CompanyProfile()
    {
        return $this->hasOne('App\CompanyProfiles');
    }


}
