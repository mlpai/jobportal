<?php

namespace App\Chat;

use Illuminate\Database\Eloquent\Model;

class CompanyJobseekerMsg extends Model
{
    protected $guarded = [];

    public function Companies()
    {
        return $this->hasOne('App\Company','id','company_id');
    }

    public function Jobseekers()
    {
        return $this->hasOne('App\Jobseeker','id','jobseeker_id');
    }

}
