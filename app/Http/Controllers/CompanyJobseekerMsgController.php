<?php

namespace App\Http\Controllers;

use App\Chat\CompanyJobseekerMsg;
use App\Company;
use App\Jobseeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyJobseekerMsgController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'message' => 'required|max:500',
        ]);

        if($request->cid == Auth::user()->id)
        {
            $request->jid;
        }
    }

    public function destroy(CompanyJobseekerMsg $companyJobseekerMsg)
    {
        //
    }
}
