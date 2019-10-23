<?php

namespace App\Http\Controllers;

use App\Chat\CompanyJobseekerMsg;
use App\Company;
use App\Jobseeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyJobseekerMsgController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->validate([
            'message' => 'required|max:500',
            'jobseeker_id' => 'required|integer',
            'company_id' => 'required|integer',
        ]);

        if($request->company_id == Auth::user()->id || $request->jobseeker_id == Auth::user()->id)
        {
            $data['sentBy'] = 1;
            if($request->company_id == Auth::user()->id)
                {$data['sentBy'] = 0;} //0 for company 1 for jobseeker
            CompanyJobseekerMsg::create($data);
        } else {
            return "Invalid User";
        }

        // Store in table

    }

    public function destroy(CompanyJobseekerMsg $companyJobseekerMsg)
    {
        //
    }
}
