<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobseeker_education extends Model
{
    protected $guarded = [];

    public function jobseeker()
    {
        return $this->belongsTo('App\Jobseeker');
    }
}
