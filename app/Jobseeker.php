<?php

namespace App;


class Jobseeker extends User
{

    public function Jobs()
    {
        return $this->doesnthave('App\PostedJob');
    }

    public function JobseekerProfile()
    {
        return $this->hasOne('App\JobseekerProfile');
    }

    public function jobseekerExperience()
    {
        return $this->hasMany('App\jobseeker_experience');
    }

    public function jobseekerEducation()
    {
        return $this->hasOne('App\jobseeker_education');
    }

    public function posts()
    {
        return $this->belongsToMany('App\PostedJob')->withTimestamps();
    }

}
