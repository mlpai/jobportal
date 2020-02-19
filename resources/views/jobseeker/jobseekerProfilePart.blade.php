
<div class="col-md-8">
            <div class="card">
                <div class="card-header">
                        <h4 class="card-title text-bold ">
                                Profile Summary
                                <a class="link" href="{{Request::is('admin/dashboard/jobseekers*') ? Route('jobseekers.edit',$jobseeker->id) : Route('profile.edit',$jobseeker->id)}}" style="float:right;"><span class="fas red-ico fa-pencil-alt"></span></a>
                            </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">Profile Heading</th>
                                <td>{{$jobseeker->JobseekerProfile->profile_title}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Career lavel</th>
                                <td>{{$jobseeker->JobseekerProfile->career_level == 0 ? 'Fresher' : 'Experienced'}}</td>
                            </tr>

                            <tr>
                                    <th scope="row">Current Job</th>

                                    @if($jobseeker->jobseekerExperience->where('currently_working',1)->first() != null)
                                        <td>
                                            @foreach($jobseeker->jobseekerExperience->where('currently_working',1) as $job)
                                                <u data-toggle="tooltip" data-placement="top" title="Works as a {{$job->job_role}}">{{$job->job_role}}</u> at <b>
                                                {{$job->company_name}}</b>
                                                <span onclick="handler({{$job->id}})" style="cursor:pointer" class="fas fa-trash-alt red-ico float-right "></span>
                                                @if(Request::is('admin/dashboard/jobseekers*') == false) <a href="{{route('Experiences.edit',$job->id)}}" ><span class="fas fa-pencil-alt blue-ico float-right mr-4"></span></a> @endif
                                                <br/>
                                                @isset($job->job_responsibility)
                                                <a class="" data-toggle="collapse" href="#collapseExample{{$job->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    <span class="fas green-ico fa-eye"></span> Show
                                                </a>
                                                <div class="collapse" id="collapseExample{{$job->id}}">
                                                    {!! $job->job_responsibility !!}</b>
                                                </div>
                                                @endisset
                                                <br/>
                                            @endforeach
                                        </td>
                                    @else
                                        <td>N/A</td>
                                    @endif

                            </tr>
                            <tr>
                                <th scope="row" >Previous Job</th>
                                <td>
                                      @foreach($jobseeker->jobseekerExperience->where('currently_working',0) as $job)
                                            <u data-toggle="tooltip" data-placement="top" title="Works as a {{$job->job_role}}">{{$job->job_role}}</u> at <b>
                                            {{$job->company_name}} </b> <span class="badge badge-warning" title="Experience">  {{($job->experience_year == null || $job->experience_year < 1) ? "" : $job->experience_year." Year"}}</span> <span class="badge badge-warning">{{($job->experience_month == null || $job->experience_month < 1) ? "" : $job->experience_month." Months"}} </span>
                                            <span onclick="handler({{$job->id}})" style="cursor:pointer" class="fas fa-trash-alt red-ico float-right "></span>
                                            @if(Request::is('admin/dashboard/jobseekers*') == false)
                                            <a href="{{route('Experiences.edit',$job->id)}}" ><span class="fas fa-pencil-alt blue-ico float-right mr-4"></span></a>@endif
                                            <br/>
                                      @endforeach

                                    @if(Request::is('admin/dashboard/jobseekers*') == false)
                                    <a href="{{route('Experiences.create')}}"><i class="fas fa-plus-circle"></i> Add previous Jobs</a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                    <th scope="row">Education</th>
                                    <td>{{$jobseeker->jobseekerEducation->qualification}}, {{$jobseeker->jobseekerEducation->university}}</td>
                                </tr>
                                <tr>
                                        <th scope="row">Location</th>
                                        <td>{{$jobseeker->JobseekerProfile->address}}</td>
                                </tr>
                                <tr>
                                        <th scope="row">Total Experience</th>
                                        <td>
                                            @if($jobseeker->jobseekerExperience->count() > 0 && $experience[0] < 1 && $experience[1] < 1 )
                                                Not Given
                                             @elseif($experience[0] < 1 && $experience[1] < 1)
                                                Fresher
                                             @endif
                                             {{ $experience[0] > 0 ? $experience[0]." Year" : "" }}
                                             {{$experience[1] > 0 ? $experience[1]." Months" : "" }}
                                        </td>
                                    </tr>
                                <tr>
                                    <th scope="row">Key Skills</th>
                                    <td>
                                        @foreach ($jobseeker->keyskills as $item)
                                            <span class="badge badge-secondary">{{$item->keyskill}}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                        <th scope="row">Expected Salary</th>
                                        <td><span class="fas fa-rupee-sign"></span> {{$jobseeker->JobseekerProfile->current_salary}} per month </td>
                                    </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
