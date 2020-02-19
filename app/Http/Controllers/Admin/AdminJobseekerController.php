<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobseeker;
use PDF;
class AdminJobseekerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobseeker = Jobseeker::has('JobseekerProfile')->latest()->paginate(10);
        return view('admin/jobseekers/index',['jobseeker'=>$jobseeker]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jobseeker $jobseeker)
    {
        $Exmonths = $jobseeker->jobseekerExperience->sum('experience_month');
        $Exyear = intval($Exmonths / 12);
        $month = intval($Exmonths % 12);
        $year = $jobseeker->jobseekerExperience->sum('experience_year') + $Exyear;
        return view('admin.jobseekers.jobseekerinfo',['jobseeker'=>$jobseeker,'experience'=>[$year,$month]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobseeker $jobseeker)
    {
         $selectedkeyskills = $jobseeker->keyskills->pluck('keyskill','keyskill');
         return view('admin.jobseekers.jobseekereditinfo',compact('jobseeker','selectedkeyskills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jobseeker $jobseeker)
    {
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
                $oldFile = $jobseeker->JobseekerProfile != null ? $jobseeker->JobseekerProfile->profile_photo : null;

                if($oldFile!=null)
                {
                    if(file_exists("public/images/profiles/".$oldFile))
                    {
          //              $ss =  unlink("public/images/profiles/".$oldFile);
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
            $img->save("public/images/profiles/".$Imagename, 80, 'jpg');
            //return $img->response('jpg');
            $profile['profile_photo'] = $Imagename;
        }


        $qualification = $request->validate($this->getEducation());

        // $profile['key_skills'] = implode(',',$request->key_skills);
        $request->validate(['key_skills'=>'required']);


		foreach($request->key_skills as $skill)
        {
            $jobseeker->Keyskills()->updateOrCreate(['keyskill'=>$skill]);
        }

        // dd($jobseeker->Keyskills);

        $jobseeker->JobseekerProfile()->updateOrCreate(['id'=> $jobseeker->JobseekerProfile!=null ? $jobseeker->JobseekerProfile->id : '0'], $profile);
        $jobseeker->jobseekerEducation()->updateOrCreate(['id'=> $jobseeker->JobseekerProfile!=null ? $jobseeker->JobseekerProfile->id : '0'],$qualification);

        return redirect()->route('jobseekers.show',[$jobseeker->id])->with(['toastalert'=>'success','message'=>'Details has been updated !!']);

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

    public function getpdf($id)
    {
        $jobseeker = Jobseeker::findorfail($id);
        $Exmonths = $jobseeker->jobseekerExperience->sum('experience_month');
        $Exyear = intval($Exmonths / 12);
        $month = intval($Exmonths % 12);
        $year = $jobseeker->jobseekerExperience->sum('experience_year') + $Exyear;
        $pdf = PDF::loadview('jobseeker.resume',['jobseeker'=>$jobseeker]);
        return $pdf->download(str_slug($jobseeker->name." Resume").'.pdf');
    }

}
