<?php

namespace App\Http\Controllers;

use App\Company;
use App\Jobseeker;
use App\PostedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyDashboardController extends Controller
{
    public function index()
    {
        $company = Company::findorfail(Auth::user()->id);
        $jobseekers = Jobseeker::with('JobseekerProfile')->whereHas('JobseekerProfile',function($profile){
            $profile->where('visibility',1);
        })->get();

        $countPerson = 0;
        foreach($company->jobs as $job)
        {
            $countPerson += $job->jobseekers->count();
        }

        return view('company.index',['company'=>$company,'interestedPerson' => $countPerson,'jobseekers'=>$jobseekers]);
    }

    // Set Job Status
    public function changeJobStatus(PostedJob $post,$jobseeker = null, $status = 1)
    {
        // dd($post);
        $jobseeker = Jobseeker::where('userType','JOBSEEKER_USER')->findorfail($jobseeker);

        if(!$jobseeker->posts()->where(['jobseeker_id'=>$jobseeker->id,'posted_job_id'=>$post->id,'status'=>$status])->exists())
        {
          $jobseeker->posts()->updateExistingPivot($post->id,['type'=>1,'status'=>$status]);
        }
        return ['Success'=>'Status changed '];
    }

}
