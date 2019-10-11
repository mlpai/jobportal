<?php

namespace App\Http\Controllers\jobseekers;

use App\Jobseeker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PostedJob;
use DateTime;
use Illuminate\Support\Facades\Auth;

class jobseekerController extends Controller
{
    public function index()
    {
        //$jobseeker->posts->isEmpty()
        return view('jobseeker.index');
    }

    public function create(PostedJob $post,$type = 1)
    {
        $jobseeker = Jobseeker::where('userType','JOBSEEKER_USER')->findorfail(Auth::user()->id);
        if($jobseeker->JobseekerProfile == null ){
            return redirect()->route('profile.create')->with(['swalalert'=>'info','title'=>'Mandantory','message'=>'Please enter profile details !!']);
        }
        // $post = array('type'=>$type);
        if(!$jobseeker->posts()->where(['jobseeker_id'=>$jobseeker->id,'posted_job_id'=>$post->id,'type'=>$type])->exists())
          {
            $jobseeker->posts()->attach($post,['type'=>$type]);
            //$jobseeker->posts()->sync($post);
          }
        return redirect()->back();
    }
}
