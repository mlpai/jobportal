<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobseekerkeyskill extends Model
{
    protected $guarded = [];

    public function jobseeker()
    {
        return $this->belongsTo('App\Jobseeker');
    }
}
