<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PostedJob;
use App\Company;
use App\Jobseeker;
use App\Mail\testmail;
use App\User;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{

    protected function CompanyJob()
    {
        $posts = PostedJob::where('job_status',1);
        return $posts;
    }

    public function home()
    {


        $posts = $this->CompanyJob();
        $cities = $posts->get('Location');
        $posts = $posts->orderBy('created_at','desc')->paginate(5);
        $usersCount = Company::has('CompanyProfile')->count();
        $jobseekersCount = Jobseeker::has('JobseekerProfile')->count();
        return view('index')->with(compact('posts','usersCount','jobseekersCount','cities'));
    }

    public function joblistings()
    {
        $posts = $this->CompanyJob();
        $cities = $posts->get('Location');
        $posts = $posts->orderBy('created_at','desc')->paginate(10);
        return view('pages.joblistings')->with(compact('posts','cities'));
    }

    public function singlejob($id = 1)
    {

         $post = $this->CompanyJob()->findorfail($id);
        //  dd($post->jobseekers->isEmpty());
        $post->views = $post->views + 1;
        $post->save();
        return view('pages.jobsingle')->with(compact('post'));
    }

    public function searchJob(Request $request)
    {
        $data = $request->validate([
            'JobTitle' => 'sometimes',
            'Location' => 'sometimes',
            'JobType' => 'sometimes',
        ]);
        // dd($data);
        $posts = new PostedJob();
        $cities = $posts->get('Location');

        $posts = $posts->with('Company')->Where([
            ['JobTitle','like','%'.$request->JobTitle.'%'],
            ['Location','like','%'.$request->Location.'%'],
            ['JobType','like','%'.$request->JobType.'%'],
            ['job_status','1'],
            ])->latest();
        $posts = $posts->paginate($posts->count());
        return view('pages.joblistings')->with(compact('posts','cities'));
    }

}
