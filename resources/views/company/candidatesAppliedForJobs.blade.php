@extends('company.adminlte')

@section('title',"Jobseekers" )
@section('screen',"Jobseekers" )

@section('mainSection')

{{$jobseekers->links()}}

<div class="row">
    @foreach ($jobseekers as $jobseeker)
        <div class="col-md-5">
        <div class="card card-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-dark ">
              <div class="widget-user-image">
                @isset($jobseeker->jobseekerProfile->profile_photo)
                <img class="img-circle" src="{{asset('images/profiles/'.$jobseeker->JobseekerProfile->profile_photo)}}" alt="User Avatar">
                @endisset
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{$jobseeker->name}}</h3>
              <h5 class="widget-user-desc text-fuchsia">{{$jobseeker->JobseekerProfile->profile_title ?? ""}}</h5>
            </div>
            <div class="card-body no-padding">
                <div id="accordion{{$jobseeker->id}}">
                    <div class="card">
                        <div class="card-header" id="sjobseeker{{$jobseeker->id}}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#btnn{{$jobseeker->id}}" aria-expanded="true" aria-controls="btnn{{$jobseeker->id}}">
                                About
                            </button>
                        </h5>
                        </div>
                        <div id="btnn{{$jobseeker->id}}" class="collapse " aria-labelledby="sjobseeker{{$jobseeker->id}}" data-parent="#accordion{{$jobseeker->id}}">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item font-weight-bold d-flex justify-content-between align-items-center">
                                  Experience
                                  <span class="badge badge-dark">{{$jobseeker->JobseekerProfile->career_level ?? 0 == 0 ? "Fresher" : "Experienced"}}</span>
                                </li>
                                <li class="list-group-item font-weight-bold d-flex justify-content-between align-items-center">
                                  Email
                                  <span class="badge badge-dark"><a class="link text-white " href="mailto:{{$jobseeker->email}}">{{$jobseeker->email}}</a></span>
                                </li>
                                <li class="list-group-item font-weight-bold d-flex justify-content-between align-items-center">
                                  Education
                                  <span class="badge badge-dark">{{$jobseeker->JobseekerEducation->qualification ?? "Not Given"}}</span>
                                </li>
                                <li class="list-group-item font-weight-bold d-flex justify-content-between align-items-center">
                                    Location:
                                  {{$jobseeker->JobseekerProfile->address ?? "Not Given"}}
                                  </li>
                              </ul>
                        </div>
                        </div>
                    </div>
                    @if($jobseeker->JobseekerProfile->career_level ?? 0 == 1)
                        <div class="card">
                            <div class="card-header" id="sjobseeker{{$jobseeker->id}}">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#btnn{{$jobseeker->id}}2" aria-expanded="true" aria-controls="btnn{{$jobseeker->id}}">
                                    Total Experience @php
                                            $Exmonths = $jobseeker->jobseekerExperience->sum('experience_month');
                                            $Exyear = intval($Exmonths / 12);
                                            $month = intval($Exmonths % 12);
                                            $year = $jobseeker->jobseekerExperience->sum('experience_year') + $Exyear;
                                    @endphp
                                    @if($jobseeker->jobseekerExperience->count() > 0 && $year < 1 && $month < 1 )

                                    @endif
                                    {{ $year > 0 ? $year." Year" : "" }}
                                    {{$month > 0 ? $month." Months" : "" }}
                                </button>
                            </h5>
                            </div>
                            <div id="btnn{{$jobseeker->id}}2" class="collapse " aria-labelledby="sjobseeker{{$jobseeker->id}}" data-parent="#accordion{{$jobseeker->id}}">
                            <div class="card-body">
                            <ol class="m-0 pl-2">
                                @foreach($jobseeker->jobseekerExperience as $job)
                                    <li class="{{$job->currently_working == 1 ? "" : ''}}">
                                        <u data-toggle="tooltip" data-placement="top" title="Works as a {{$job->job_role}}">{{$job->job_role}}</u> at <b>
                                        {{$job->company_name}} </b> <span class="badge badge-warning" title="Experience">  {{($job->experience_year == null || $job->experience_year < 1) ? "" : $job->experience_year." Year"}}</span> <span class="badge badge-warning">{{($job->experience_month == null || $job->experience_month < 1) ? "" : $job->experience_month." Months"}} </span>
                                    </li>
                                @endforeach
                                </ol>
                            </div>
                            </div>
                        </div>
                    @endif
                    <div class="card">
                            <div class="card-header" id="sjobseeker{{$jobseeker->id}}">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#chat{{$jobseeker->id}}" aria-expanded="true" aria-controls="chat{{$jobseeker->id}}">
                                    Messages
                                </button>
                            </h5>
                            </div>
                            <div id="chat{{$jobseeker->id}}" class="collapse show" aria-labelledby="sjobseeker{{$jobseeker->id}}" data-parent="#accordion{{$jobseeker->id}}">
                                <chatbox ></chatbox>
                                {{-- <div class="">
                                    <div class="box box-warning direct-chat direct-chat-warning">

                                            <div class="box-body">
                                              <!-- Conversations are loaded here -->
                                              <div class="direct-chat-messages">
                                                <!-- Message. Default to the left -->
                                                <div class="direct-chat-msg">
                                                  <div class="direct-chat-info clearfix">
                                                    <span class="direct-chat-name float-left">{{$jobseeker->name}}</span>
                                                    <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                                  </div>
                                                  <!-- /.direct-chat-info -->
                                                  <img class="direct-chat-img" src="{{asset('images/profiles/'.$jobseeker->JobseekerProfile->profile_photo)}}" alt="message user image">
                                                  <!-- /.direct-chat-img -->
                                                  <div class="direct-chat-text">
                                                    Is this template really for free? That's unbelievable!
                                                  </div>
                                                  <!-- /.direct-chat-text -->
                                                </div>
                                                <!-- /.direct-chat-msg -->
                                                <!-- Message to the right -->
                                                <div class="direct-chat-msg right">
                                                  <div class="direct-chat-info clearfix ">
                                                    <span class="direct-chat-name float-right">{{Auth::user()->name}}</span>
                                                    <span class="direct-chat-timestamp float-left ">23 Jan 2:05 pm</span>
                                                  </div>
                                                  <!-- /.direct-chat-info -->
                                                  <img class="direct-chat-img" src="{{asset('images/profiles/'.$jobseeker->JobseekerProfile->profile_photo)}}" alt="message user image">
                                                  <!-- /.direct-chat-img -->
                                                  <div class="direct-chat-text">
                                                    You better believe it!
                                                  </div>
                                                  <!-- /.direct-chat-text -->
                                                </div>
                                              </div>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer">
                                              <form action="{{Route('chatPost')}}" method="post">
                                                @csrf
                                                <div class="input-group">
                                                  <input type="text" name="message" placeholder="Type Message ..." class="form-control @error('message') is-invalid @enderror">
                                                  <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-warning btn-flat">Send</button>
                                                      </span>
                                                </div>
                                              </form>
                                            </div>
                                            <!-- /.box-footer-->
                                          </div>
                            </div> --}}
                            </div>
                        </div>
                </div>
            </div>
          </div>
        </div>
    @endforeach

</div>
{{$jobseekers->links()}}
@endsection
