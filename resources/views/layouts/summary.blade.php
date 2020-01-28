<section class="site-section">
        <div class="container">
          <div class="row align-items-center mb-5">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <div class="d-flex align-items-center">
                <div class="border p-2 d-inline-block mr-3 rounded">
                    <img style="height:65px" src="{{asset('images/profiles').'/'.$post->Company->CompanyProfile->photo}}" alt="Image" class="img-fluid img-thumbnail">
                </div>
                <div>
                  <h2>{{$post->JobTitle}}</h2>
                  <div >
                    <span class="m-2"><span class="fas red-ico fa-briefcase mr-2"></span>{{$post->Location}}</span>
                    <span class="m-2"><span class="fas teal-ico fa-map-marker mr-2"></span>India</span>
                    <span class="m-2"><i class="fas green-ico fa-clock" ></i> <span class="text-primary">{{$post->JobType['type']}}</span></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="row">
                @auth
                    @if(Auth::user()->userType != "COMPANY_USER")
                        @if(!Auth::guest())
                            @if(in_array(Auth::user()->id,$post->jobseekers()->where('type',0)->get()->pluck('id')->toArray()))
                    <div class="col-6">
                            <a href="#" class="btn btn-block btn-success disabled btn-md"><span class="fas fa-heart mr-2 text-danger"></span>Already Saved</a>
                      </div>
                      @else
                      <div class="col-6">
                            <a href="{{route('applyPost',[$post->id,0])}}" class="btn btn-block btn-outline-dark btn-light btn-md"><span class="fas fa-heart mr-2 text-danger"></span>Save
                              Job</a>
                          </div>
                    @endif

                    @else
                    <div class="col-6">
                            <a href="{{route('applyPost',[$post->id,0])}}" class="btn btn-block btn-outline-dark btn-light btn-md"><span class="fas fa-heart mr-2 text-danger"></span>Save
                              Job</a>
                          </div>
                    @endif

                    @endif
                @endauth

                @if(!Auth::guest())
                    @if(in_array(Auth::user()->id,$post->jobseekers()->where('type',1)->get()->pluck('id')->toArray()))
                        <div class="col-6">
                            <a href="#" class="btn btn-block btn-danger disabled btn-md">Already Applied</a>
                    </div>
                    @elseif(Auth::user()->userType == "COMPANY_USER")
                        <div class="col-12">
                            <b class="bg-primary p-1">Sorry ! Recruiter can not Apply for Jobs. Register or login as a jobseeker first</b>
                        </div>
                    @else
                    <div class="col-6">
                        <a href="{{route('applyPost',$post->id)}}" class="btn btn-block btn-primary btn-md">Apply Now</a>
                    </div>
                    @endif

                @else
                    <div class="col-6">
                        <a href="{{route('applyPost',$post->id)}}" class="btn btn-block btn-primary btn-md">Apply Now</a>
                    </div>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8">
              <div class="mb-5">
                <figure class="mb-5">
                    {{-- <img src="{{asset('images/sq_img_1.jpg')}}" alt="{{$post->JobTitle}}" class="img-fluid rounded"> --}}
                </figure>
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="fas red-ico fa-align-left mr-3"></span>Job
                  Description</h3>
                    {!! $post->JobSummary !!}
              </div>
              <div class="mb-5">
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="fas red-ico fa-rocket mr-3"></span>Responsibilities</h3>
                {!! $post->responsibility !!}
              </div>

              <div class="mb-5">
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="fas red-ico fa-book mr-3"></span>Education +
                  Experience</h3>
                {!! $post->skills !!}
              </div>


            </div>
            <div class="col-lg-4">
              <div class="bg-light p-3 border rounded mb-4">
                <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
                <ul class="list-unstyled pl-3 mb-0">
                  <li class="mb-2"><strong class="text-black">Published on:</strong> {{date('d M Y',strtotime($post->created_at))}}</li>
                  <li class="mb-2"><strong class="text-black">Vacancy:</strong> {{$post->Positions}}</li>
                  <li class="mb-2"><strong class="text-black">Employment Status:</strong> {{$post->JobType['type']}}</li>
                  <li class="mb-2"><strong class="text-black">Job Location:</strong> {{$post->Location}}</li>
                  <li class="mb-2"><strong class="text-black">Salary:</strong> <i class="fas fa-rupee-sign"></i>{{$post->salaryFrom}} ~ <i class="fas fa-rupee-sign"></i>{{$post->salaryTo}}</li>
                </ul>
              </div>

              <div class="bg-light p-3 border rounded">
                <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
                <div class="pb-4">
                  {!!
                    Share::currentPage('Apply for this Job')
                    ->facebook()
                    ->twitter()
                    ->linkedin('Apply this job')
                    ->whatsapp();
                    !!}
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>


      @push('scripts')
         <script src="{{ asset('js/share.js') }}"></script>
      @endpush

    @push('styles')
        <style>
            #social-links li {
                list-style: none;
                float:left;
                margin-right: 10px;
                font-size: 20px;
            }
        </style>
    @endpush
