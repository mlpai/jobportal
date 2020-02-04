<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Company $company)
    {
        $company = $company->findorfail(Auth::user()->id);
        return view('company.CompanyProfile',compact('company'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Company $company)
    {
        $company = Company::findorfail(Auth::user()->id);

        $data = $request->validate([
            'CompanyName' => 'required',
            'CompanySize' => 'required',
            'phone' => 'required|digits:10',
            'RecruiterType' => 'required',
            'Refrence'  => 'required',
            'CompanyAddress' => 'required',
            'photo'=>   'sometimes|image|max:1000'
        ]);
        if($request->has('photo'))
        {
            //find and remove old pic if available
               // dd($company);
                $oldFile = $company->CompanyProfile != null ? $company->CompanyProfile->photo : null;

                if($oldFile!=null)
                {
                    if(file_exists("public/images/profiles/".$oldFile))
                    {
                        $ss =  unlink("public/images/profiles/".$oldFile);
                    }
                }
            //---------------------------------------
            $Imagename = date('Ymdhis').'_IMG.jpg';
            $img = Image::make($request->photo);
            $img->fit(400,null,function($constraint){
                $constraint->aspectRatio();
            })->text($company->name,$img->width()/2,$img->height()-10,function($font){
                $font->file(5);
                $font->color('ff0000');
                $font->align('center');
                $font->valign('middle');
            });
            $img->save("public/images/profiles/".$Imagename, 80, 'jpg');
            //return $img->response('jpg');
            $data['photo'] = $Imagename;
        }
        // dd(Auth::user()->CompanyProfile);
        $company->CompanyProfile()->updateOrCreate(['id'=> $company->CompanyProfile!=null ? $company->CompanyProfile->id : '0'],$data);
        return redirect(Route('ShowProfile'))->with('success', 'Profile Created');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
