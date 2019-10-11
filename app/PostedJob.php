<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class PostedJob extends Model
{
    protected $guarded = [];


    public function Company()
    {
        return $this->belongsTo('App\Company');
    }

    public function jobseekers()
    {
        return $this->belongsToMany('App\Jobseeker')->withTimestamps();
    }


    public function getJobTypeAttribute($value)
    {
        switch($value)
        {
            case  1 :
                return ['type'=>'Full Time','id'=>$value];
            break;
            case 2:
                return ['type'=>'Part Time','id'=>$value];
            break;
            default:
                return ['type'=>'Full/Part','id'=>$value];
            break;
        }
    }
}
