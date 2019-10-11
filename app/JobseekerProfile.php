<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobseekerProfile extends Model
{
    protected $guarded = [];


    public function company()
    {
        return $this->belongsTo('App\Jobseeker');
    }

}
