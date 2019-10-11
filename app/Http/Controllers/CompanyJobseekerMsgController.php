<?php

namespace App\Http\Controllers;

use App\Chat\CompanyJobseekerMsg;
use Illuminate\Http\Request;

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

        dd($data);
    }

    public function destroy(CompanyJobseekerMsg $companyJobseekerMsg)
    {
        //
    }
}
