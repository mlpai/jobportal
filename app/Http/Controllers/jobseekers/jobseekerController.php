<?php

namespace App\Http\Controllers\jobseekers;

use App\Chat\CompanyJobseekerMsg;
use App\Company;
use App\Jobseeker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\JobAppliedNotification;
use App\Mail\PostAppliedNotification;
use App\PostedJob;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class jobseekerController extends Controller
{
    public function index()
    {
        $jobs = PostedJob::where('job_status',1)->get();
        $jobseeker = Jobseeker::findorfail(Auth::user()->id);
        return view('jobseeker.index')->with(compact(['jobseeker','jobs']));
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
              $jobseeker->posts()->attach($post,['type'=>$type,'status'=>1]);
            //   dd($jobseeker);
              Mail::to($post->company->email)->send(new PostAppliedNotification($post,$jobseeker));
              Mail::to($jobseeker->email)->send(new JobAppliedNotification($post,$jobseeker));
            //$jobseeker->posts()->sync($post);
          }
        return redirect()->back()->with(['Title'=>'Post Applied/Saved','success'=>'Related Email has been sent to your Email.']);
    }


    public function messages()
    {
        // $companies = CompanyJobseekerMsg::where('jobseeker_id',Auth::User()->id)->with('Companies')->get()->unique();
        $jobseekers = Jobseeker::findorfail(Auth::User()->id);
        $posts = $jobseekers->posts()->where('type',1)->get(['JobTitle','company_id']); //0 saved , 1 Applied
        // dd($posts);
        return view('jobseeker.messages')->with(compact('posts'));
    }

    public function GetMsg(Request $request,Jobseeker $Jobseekerid,Company $CompanyId)
    {
        $user = ['name'=>$Jobseekerid->name,'photo'=>$Jobseekerid->JobseekerProfile->profile_photo];
        $cmp = ['name'=>$CompanyId->name,'photo'=>$CompanyId->CompanyProfile->photo];
        $chats = CompanyJobseekerMsg::where('jobseeker_id',$Jobseekerid->id)->where('company_id',$CompanyId->id)->orderby('created_at','desc')->get();
        return json_encode(['chats'=>$chats,'user'=>$user,'cmp'=>$cmp]);
    }

}
