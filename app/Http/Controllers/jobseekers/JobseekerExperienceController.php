<?php

namespace App\Http\Controllers\jobSeekers;

use App\jobseeker_experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobseeker;
use Illuminate\Support\Facades\Auth;

class JobseekerExperienceController extends Controller
{
    public function create()
    {

        return view('jobseeker.experience_add');

    }

    public function store(Request $request)
    {
        // dd($request->all());
        $jobseeker =  Jobseeker::findorfail(Auth::user()->id);
        $experience = $request->validate($this->getExperience());

            if($request->has('currently_working'))
            {
                $experience['currently_working']  =1;
            } else
            {
                $experience['currently_working'] = 0;
            }

            // dd($jobseeker->jobseekerExperience->id);

            $jobseeker->jobseekerExperience()->updateOrCreate($experience);

            if($jobseeker->JobseekerProfile->career_level == 0) { $jobseeker->JobseekerProfile->career_level = 1; $jobseeker->JobseekerProfile->save();  }

            return redirect()->route('profile.index')->with(['toastalert'=>'success','message'=>'Experience has been added !!']);


    }

    public function edit(jobseeker_experience $Experience)
    {

        $jobseeker = Jobseeker::findorfail($Experience->jobseeker->id);
        if($jobseeker->id == Auth::user()->id)
        {
            return view('jobseeker.experience_add',compact('Experience'));
        } else
        {
            return redirect()->route('profile.index');
        }
    }


    public function update(Request $request, jobseeker_experience $Experience)
    {
        // dd($Experience);

        $jobseeker = Jobseeker::findorfail($Experience->jobseeker->id);

        if($jobseeker->id != Auth::user()->id)
        {
            return view('jobseeker.experience_add',compact('jobseeker'));
        }
            else
        {
            $experience = $request->validate($this->getExperience());

            if($request->has('currently_working'))
            {
                $experience['currently_working']  =  1;
            } else
            {
                $experience['currently_working'] = 0;
            }

            // dd($jobseeker->jobseekerExperience->id);

            $jobseeker->jobseekerExperience()->updateOrCreate(["id"=>$Experience->id],$experience);
            if($jobseeker->JobseekerProfile->career_level == 0) { $jobseeker->JobseekerProfile->career_level = 1; $jobseeker->JobseekerProfile->save();  }
            // dd($jobseeker->JobseekerProfile->career_level);
            return redirect()->route('profile.index')->with(['toastalert'=>'success','message'=>'Experience has been added !!']);
        }

    }



    public function destroy(jobseeker_experience $Experience)
    {

        if(Auth::user()->id == $Experience->jobseeker->id)
        {
            $Experience->delete();

            if($Experience->jobseeker->JobseekerExperience->count() < 1)
            {
                $Experience->jobseeker->JobseekerProfile->career_level = 0; $Experience->jobseeker->JobseekerProfile->save();
            }


            return  ["Deleted !","{$Experience->job_role} Details has been deleted","success"];
        } else
        {
            return ["Opps !","There's Something Wrong, Please try later","error"];
        }
    }

    public function getExperience()
    {
        $experience = [
            'job_role' => 'required|string',
            'company_name' => 'required|string',
            'location' => 'required|string',
            'experience_year' => 'nullable|integer|required_unless:experience_month,""',
            'experience_month' => 'required_unless:experience_year,""',
            'drawn_salary' => 'nullable|numeric',
            'job_responsibility' => 'nullable|string',
        ];
        return $experience;
    }
}
