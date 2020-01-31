<?php

namespace App\Http\Controllers\jobseekers;

use App\Jobseeker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KeySkill;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use PDF;

class jobseekerProfileController extends Controller
{

    public function index()
    {
        $jobseeker = Jobseeker::findorfail(Auth::user()->id);
        if($jobseeker->jobseekerProfile != null)
           {
               $Exmonths = $jobseeker->jobseekerExperience->sum('experience_month');
               $Exyear = intval($Exmonths / 12);
               $month = intval($Exmonths % 12);
               $year = $jobseeker->jobseekerExperience->sum('experience_year') + $Exyear;
               return view('jobseeker.profile',['jobseeker'=>$jobseeker,'experience'=>[$year,$month]]);
            }
        else {
            return redirect()->route('profile.create')->with(['swalalert'=>'info','title'=>'Mandantory','message'=>'Please enter profile details !!']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobseeker = Jobseeker::findorfail(Auth::user()->id);
        $selectedkeyskills = $jobseeker->keyskills->pluck('keyskill','keyskill');

        if($jobseeker->jobseekerProfile == null)
        {
             return view('jobseeker.profile_edit',['selectedkeyskills'=>$selectedkeyskills]);
        }
            else
        {
            return redirect()->route('profile.edit',$jobseeker->id);
        }
    }



    public function store(Request $request)
    {
        // dd($request->all());
        $jobseeker = Jobseeker::findorfail(Auth::user()->id);

        $profile = $request->validate($this->getProfile());

        if($request->has('name'))
        {
            $request->validate(['name' => 'required|regex:/^[\pL\s\-]+$/u',]);
            $jobseeker->name = ucwords($request->name);
            $jobseeker->save();
        }

        //image controlling
        if($request->has('profile_photo'))
        {
            //find and remove old pic if available
               // dd($company);
                $oldFile = $jobseeker->jobseekerProfile != null ? $jobseeker->jobseekerProfile->profile_photo : null;

                if($oldFile!=null)
                {
                    if(file_exists("images/profiles/".$oldFile))
                    {
          //              $ss =  unlink("images/profiles/".$oldFile);
                    }
                }
            //---------------------------------------

            $Imagename = date('Ymdhis').'_IMG.jpg';
            $img = Image::make($request->profile_photo);
            $img->fit(400,null,function($constraint){
                $constraint->aspectRatio();
            })->text($jobseeker->name,$img->width()/2,$img->height()-10,function($font){
                $font->file(5);
                $font->color('ff0000');
                $font->align('center');
                $font->valign('middle');
            });
            $img->save("images/profiles/".$Imagename, 80, 'jpg');
            //return $img->response('jpg');
            $profile['profile_photo'] = $Imagename;
        }

        // $profile['key_skills'] = implode(',',$request->key_skills);

        $qualification = $request->validate($this->getEducation());



        $jobseeker->jobseekerProfile()->updateOrCreate(['id'=> $jobseeker->jobseekerProfile!=null ? $jobseeker->jobseekerProfile->id : '0'], $profile);

        $jobseeker->Keyskills()->saveMany($request->validate(['key_skills' => 'required']));

        $jobseeker->jobseekerEducation()->updateOrCreate($qualification);

        return redirect()->route('profile.index')->with(['toastalert'=>'success','message'=>'Details has been updated !!']);



        //        $jobseeker->jobseekerEducation = $qualification;

        //      $jobseeker->push();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
         $jobseeker = Jobseeker::findorfail(Auth::user()->id);
         $selectedkeyskills = $jobseeker->keyskills->pluck('keyskill','keyskill');
         return view('jobseeker.profile_edit',compact('jobseeker','selectedkeyskills'));
    }


    public function update(Request $request, $id)
    {
        $jobseeker = Jobseeker::findorfail(Auth::user()->id);

        $profile = $request->validate($this->getProfile());

        if($request->has('name'))
        {
            $request->validate(['name' => 'required|regex:/^[\pL\s\-]+$/u',]);
            $jobseeker->name = ucwords($request->name);
            $jobseeker->save();
        }

        //image controlling
        if($request->has('profile_photo'))
        {
            //find and remove old pic if available
               // dd($company);
                $oldFile = $jobseeker->jobseekerProfile != null ? $jobseeker->jobseekerProfile->profile_photo : null;

                if($oldFile!=null)
                {
                    if(file_exists("images/profiles/".$oldFile))
                    {
          //              $ss =  unlink("images/profiles/".$oldFile);
                    }
                }
            //---------------------------------------

            $Imagename = date('Ymdhis').'_IMG.jpg';
            $img = Image::make($request->profile_photo);
            $img->fit(400,null,function($constraint){
                $constraint->aspectRatio();
            })->text($jobseeker->name,$img->width()/2,$img->height()-10,function($font){
                $font->file(5);
                $font->color('ff0000');
                $font->align('center');
                $font->valign('middle');
            });
            $img->save("images/profiles/".$Imagename, 80, 'jpg');
            //return $img->response('jpg');
            $profile['profile_photo'] = $Imagename;
        }


        $qualification = $request->validate($this->getEducation());

        // $profile['key_skills'] = implode(',',$request->key_skills);
        foreach($request->key_skills as $skill)
        {
            $jobseeker->Keyskills()->updateOrCreate(['keyskill'=>$skill]);
        }

        // dd($jobseeker->Keyskills);

        $jobseeker->jobseekerProfile()->updateOrCreate(['id'=> $jobseeker->jobseekerProfile!=null ? $jobseeker->jobseekerProfile->id : '0'], $profile);
        $jobseeker->jobseekerEducation()->updateOrCreate(['id'=> $jobseeker->jobseekerProfile!=null ? $jobseeker->jobseekerProfile->id : '0'],$qualification);

        return redirect()->route('profile.index')->with(['toastalert'=>'success','message'=>'Details has been updated !!']);

        // dd($jobseeker);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getProfile()
    {
        $profile = [
            'profile_title' => 'required',
            'address' => 'required',
            'current_salary' => 'required|numeric',
            'mobile' => 'required|digits:10',
            'profile_photo' => 'sometimes|image|max:1500',
        ];
        return $profile;
    }

    public function getEducation()
    {
        $qualification = [
            'qualification' => 'required',
            'university' => 'required',
            'year' => 'required',
            'percentage' => 'nullable|string',
        ];
        return $qualification;
    }

    public function getEmailProfile($token)
    {

        // dd(is_numeric($token));
        $jobseeker = Jobseeker::findorfail(sha1("#$^*^&%ASKj54".$token."$^*^&%A@SKj54"));
        // dd($jobseeker);
        $Exmonths = $jobseeker->jobseekerExperience->sum('experience_month');
        $Exyear = intval($Exmonths / 12);
        $month = intval($Exmonths % 12);
        $year = $jobseeker->jobseekerExperience->sum('experience_year') + $Exyear;
        $pdf = PDF::loadview('jobseeker.resume',['jobseeker'=>$jobseeker]);
        return $pdf->download(str_slug(Auth::user()->name." Resume").'.pdf');
    }

    public function getpdf()
    {
        $jobseeker = Jobseeker::findorfail(Auth::user()->id);
        $Exmonths = $jobseeker->jobseekerExperience->sum('experience_month');
        $Exyear = intval($Exmonths / 12);
        $month = intval($Exmonths % 12);
        $year = $jobseeker->jobseekerExperience->sum('experience_year') + $Exyear;
        $pdf = PDF::loadview('jobseeker.resume',['jobseeker'=>$jobseeker]);
        return $pdf->download(str_slug(Auth::user()->name." Resume").'.pdf');
    }

}
