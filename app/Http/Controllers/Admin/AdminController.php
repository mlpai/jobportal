<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobseeker;
use App\PostedJob;

class AdminController extends Controller
{
    function dashboard(){

        // Get Details and sent to Dashboard
        $jcount = Jobseeker::has('JobseekerProfile')->count();
        $ccount = Company::has('jobs')->count();
        $postcount = PostedJob::all()->count();
        $postApplied = Jobseeker::has('posts')->count();
        $status = Jobseeker::has('posts')->with('posts')->get();
        $response =[0,0,0,0,0,0,0];
        foreach($status as $state)
        {
            for($i = 1; $i<7; $i++){
                switch($i)
                {
                    case 1:
                        
                        if($state->posts()->where(['status'=>$i])->count()> 0)
                        {
                            $response[0] = $state->posts()->where(['status'=>$i])->count();
                        }                
                    break;
                    case 2:
                        if($state->posts()->where(['status'=>$i])->count()> 0)
                        {
                            $response[1] = $state->posts()->where(['status'=>$i])->count();
                        }                
                    break;
                    case 3:
                        if($state->posts()->where(['status'=>$i])->count()> 0)
                        {
                            $response[2] = $state->posts()->where(['status'=>$i])->count();
                        }                
                    break;
                    case 4:
                        if($state->posts()->where(['status'=>$i])->count()> 0)
                        {
                            $response[3] = $state->posts()->where(['status'=>$i])->count();
                        }                
                    break;
                    case 5:
                        if($state->posts()->where(['status'=>$i])->count()> 0)
                        {
                            $response[4] = $state->posts()->where(['status'=>$i])->count();
                        }                
                    break;
                    case 6:
                        if($state->posts()->where(['status'=>$i])->count()> 0)
                        {
                            $response[5] = $state->posts()->where(['status'=>$i])->count();
                        }                
                    break;
                    case 7:
                        if($state->posts()->where(['status'=>$i])->count()> 0)
                        {
                            $response[6] = $state->posts()->where(['status'=>$i])->count();
                        }                
                    break;
                }
            }
        }

        return view('admin/dashboard',['response'=>$response,'postApplied'=>$postApplied,'jobseeker'=>$jcount,'posts'=>$postcount,'company'=>$ccount]);
    }
}
