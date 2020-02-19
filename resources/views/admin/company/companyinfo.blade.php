@extends('admin.master')

@section('title',$company->companyprofile->CompanyName)

@section('screen',$company->companyprofile->CompanyName)

@section('mainSection')

    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Jobs</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card text-center">
                    <div class="card-header">
                      <b>{{$company->companyProfile->CompanyName}}</b>
                      <a href="{{route('companies.edit',[$company->id])}}" >
                        <i title="Edit Details" class="float-right btn  fa red-ico fa-pencil"></i>
                      </a>
                    </div>
                    <div class="card-body table-responsive ">
                        <table class="table table-bordered table-hover " >
                            <tr>
                                <th>Representative</th>
                                <td>{{$company->name}}</td>
                                <th>Email</th>
                                <td>{{$company->email}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td class="text-left" colspan="3">{{$company->CompanyProfile->CompanyAddress}}</td>
                            </tr>
                            <tr>
                                <th>Type of Recruiter</th>
                                <td class="text-left" colspan="3">
                                    @switch($company->CompanyProfile->RecruiterType)
                                        @case(1)
                                        Yes - I am hiring for a client
                                            @break
                                        @case(2)
                                        No - I am a direct employer hiring our next employee
                                            @break
                                        @default

                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <th>How did you hear about us?</th>
                                <td class="text-left" colspan="3">
                                    @switch($company->CompanyProfile->RecruiterType)
                                        @case(1)
                                        Other
                                            @break
                                        @case(2)
                                        Podcast
                                            @break
                                        @case(3)
                                        Billboard
                                            @break
                                        @case(4)
                                        Radio (AM/FM/XM)
                                            @break
                                        @case(5)
                                        Online Video
                                            @break
                                        @case(6)
                                        Newspaper
                                            @break
                                        @case(7)
                                        Streaming Audio (Spotify, Pandora, etc.)
                                        @case(8)
                                        TV
                                        @case(9)
                                        Word of Mouth
                                        @case(10)
                                        Search Engine (ex. Google, Bing, Yahoo)
                                        @case(11)
                                        Social Media
                                        @case(12)
                                        In the Mail
                                            @break
                                        @default
                                    @endswitch
                                </td>
                            </tr>
                        </table>

                    </div>
                  </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card mb-3">
                    <div class="row no-gutters">
                      <div class="col-md-3">
                        <img src="{{asset('images/profiles').'/'.$company->CompanyProfile->photo}}" class="card-img img-fluid " alt="{{$company->name}}">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                            <div class="table-responsive" >
                                <table class="table table-bordered table-hover" >
                                    <tr>
                                        <th>
                                            Company Size (Man-Power)
                                        </th>
                                        <td>
                                            *Approx {{$company->CompanyProfile->CompanySize}} Employee.
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Phone Number
                                        </th>
                                        <td>
                                            {{$company->CompanyProfile->phone}}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="card" >
                <div class="card-header">
                    All Jobs Posted by {{$company->CompanyProfile->CompanyName}}
                </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Post Title</th>
                                    <th>Location</th>
                                    <th>Created at</th>
                                    <th>Candidates</th>
                                    <th>Views</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($company->Jobs as $key=>$job)
                                    <tr>
                                        <th>{{++$key}}</th>
                                        <th>{{$job->JobTitle}}</th>
                                        <th>{{$job->Location}}</th>
                                        <th>{{date('d-M-y',strtotime($job->created_at))}}</th>
                                        <td>@if($job->jobseekers()->where('type',1)->count() > 0) <a href="{{route('candidates',$job->id)}}/{{str_slug($job->JobTitle)}}"> {{$job->jobseekers()->where('type',1)->count()}} Candidated </a> @else 0 Candidate @endif</td>
                                        <td>{{$job->views}}</td>
                                        <th>
                                            <job-status cmp_id = {{$company->id}} post_id='{{$job->id}}' url1 = '{{route('adminPostUpdate')}}' text = '{{$job->job_status}}' ></job-status>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
    </div>

@endsection
