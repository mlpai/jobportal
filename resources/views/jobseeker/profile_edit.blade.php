@extends('jobseeker.master')

@section('screen','Profile Details')

@section('title','Profile Details')

@section('mainSection')
{{-- profile --}}
<section class="content">

    <div class="container">
            {{-- @if($errors->any())
                @foreach ($errors->all() as $item)
                    <li>{{$item}}</li>
                @endforeach
            @endif --}}

            <form class="form-horizontal" action="@if(isset($jobseeker)) {{Route('profile.update',$jobseeker->id)}} @else {{Route('profile.store')}} @endif" enctype="multipart/form-data" method="post">
                @csrf
                @isset($jobseeker) @method('patch') @endisset
            <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                                <label for="name">Your Name<mandantory></mandantory></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name',Auth::user()->name)}}" name="name" id="name" aria-describedby="name" placeholder="Your Name">
                                @error('name') <div class="alert alert-danger">{{$message}}</div> @enderror
                              </div>

                      <div class="form-group">
                        <label for="profile_title">Profile Title<mandantory></mandantory></label>
                        <input type="text" class="form-control @error('profile_title') is-invalid @enderror" value="{{old('profile_title',isset($jobseeker) ? $jobseeker->JobseekerProfile->profile_title : '')}}" name="profile_title" id="profile_title" aria-describedby="emailHelp" placeholder="Enter Profile Title">
                        <small id="profile_title" class="form-text text-muted">Like PHP Developer, Accountant, Doctor etc.</small>
                        @error('profile_title') <div class="alert alert-danger">{{$message}}</div> @enderror
                      </div>

                        <div class="form-group">
                                <label for="Education">Education<mandantory></mandantory></label>
                                <input type="text" class="form-control @error('qualification') is-invalid @enderror" value="{{old('qualification',isset($jobseeker) ? $jobseeker->JobseekerEducation->qualification : '')}}" name="qualification" id="qualification"  placeholder="BA, BCA, MCA etc.">
                                @error('qualification') <div class="alert alert-danger">{{$message}}</div> @enderror
                                <br/>
                                <small id="university" class="form-text text-muted">University/Board<mandantory></mandantory></small>
                                <input type="text" value="{{old('university',isset($jobseeker) ? $jobseeker->JobseekerEducation->university : '')}}" class="form-control @error('university') is-invalid @enderror" name="university" id="university"  placeholder="Board/University">
                                @error('university') <div class="alert alert-danger">{{$message}}</div> @enderror
                                <br/>
                                <small id="year" class="form-text text-muted">Passing Year<mandantory></mandantory></small>
                                <input type="date" value="{{old('year',isset($jobseeker) ? $jobseeker->JobseekerEducation->year : '')}}" class="form-control cutomeDatePicker @error('year') is-invalid @enderror" name="year" id="year"  placeholder="Year of passing">
                                @error('year') <div class="alert alert-danger">{{$message}}</div> @enderror
                                <br/>
                                <small id="percentage" class="form-text text-muted">Percentage Obtained in academics</small>
                                <input type="text" value="{{old('percentage',isset($jobseeker) ? $jobseeker->JobseekerEducation->percentage : '')}}" class="form-control @error('percentage') is-invalid @enderror" name="percentage" id="percentage" placeholder="eg: 60%, 89.9%">
                                @error('percentage') <div class="alert alert-danger">{{$message}}</div> @enderror
                        </div>


                  </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                        <label for="address">Current Mobile<mandantory></mandantory></label>
                                        <input class="form-control @error('mobile') is-invalid @enderror" name="mobile" id="mobile" value='{{old('mobile',isset($jobseeker) ? $jobseeker->JobseekerProfile->mobile : '')}}'/>
                                        @error('mobile') <div class="alert alert-danger">{{$message}}</div> @enderror
                                    </div>
                                <div class="form-group">
                                        <label for="address">Current/Expected Salary/Month<mandantory></mandantory></label>
                                        <input class="form-control @error('current_salary') is-invalid @enderror" name="current_salary" id="current_salary" value='{{old('current_salary',isset($jobseeker) ? $jobseeker->JobseekerProfile->current_salary : '')}}'/>
                                        @error('current_salary') <div class="alert alert-danger">{{$message}}</div> @enderror
                                    </div>

                                <div class="form-group">
                                        <label for="address">Your Address<mandantory></mandantory></label>
                                        <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address">{{old('address',isset($jobseeker) ? $jobseeker->JobseekerProfile->address : '')}}</textarea>
                                        @error('address') <div class="alert alert-danger">{{$message}}</div> @enderror
                                    </div>

                            <div class="form-group">

                                <label for="KeySkills">Key Skills<mandantory></mandantory></label>
                                {{Form::select('key_skills[]', $selectedkeyskills , $selectedkeyskills ,['multiple'=>'true','class'=>'form-control js-example-basic-multiple'])}}
                                @error('key_skills') <div class="alert alert-danger">{{$message}}</div> @enderror
                            </div>
                                <div class="custom-file">
                                    <input type="file" onchange="fname(this)" name="profile_photo" class="custom-file-input @error('profile_photo') is-invalid @enderror" id="customFile">
                                    <label class="custom-file-label" id="fileLable" for="customFile">Select Your Photo</label>
                                  </div>
                                  @error('profile_photo') <div class="alert alert-danger">{{$message}}</div> @enderror
                    </div>
            </div>
            <br/>

                <div class="container d-flex ">
                    <a href="{{route('profile.index')}}" class="btn btn-warning align-content-start ">Back</a>
                    <button type="submit" class="btn btn-primary m-auto d-block">Update Profile</button>
                </div>
        </div>
    </form>
    </div>
    <br/>

</section>
{{-- Enda --}}
@endsection

@push('scripts')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    flatpickr(".cutomeDatePicker");
    // CKEDITOR.replace('job_responsibility');
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            tags: true,
            tokenSeparators: [',']
        });
    });
    function fname(file){
        let filename =  file.value.substr(file.value.search("fakepath")+9,20);
        $("#fileLable").text(filename);
    }
</script>
@endpush




{{--

    <div class="col-md-6">
                        <div class="form-group">
                                <label for="CurrentJob">Current Job</label>
                                <input type="text" class="form-control @error('job_role') is-invalid @enderror" name="job_role" id="Qualification" value="{{old('job_role')}}" placeholder="Job Title">
                                @error('job_role') <div class="alert alert-danger">{{$message}}</div> @enderror
                                <br/>
                                <small id="company_name" class="form-text text-muted">Company Name</small>
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" id="company_name" value="{{old('company_name')}}" placeholder="company_name">
                                @error('company_name') <div class="alert alert-danger">{{$message}}</div> @enderror
                                <br/>
                                <small id="location" class="form-text text-muted">Job location</small>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" id="location" value="{{old('location')}}" placeholder="eg: delhi, Ludhiana, Gurugram etc">
                                @error('location') <div class="alert alert-danger">{{$message}}</div> @enderror
                                <br/>

                                <small class="form-text text-muted">Working Experience </small>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control cutomeDatePicker @error('job_from') is-invalid @enderror" value="{{old('job_from')}}" name="job_from" id="from"  placeholder="From Year">
                                        @error('job_from') <div class="alert alert-danger">{{$message}}</div> @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control cutomeDatePicker @error('job_end') is-invalid @enderror" value="{{old('job_end')}}" name="job_end" id="to"  placeholder="To Year">
                                        @error('job_end') <div class="alert alert-danger">{{$message}}</div> @enderror
                                    </div>
                                    <div class="col-md-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"  onchange="ch(this)" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Till Date</label>
                                      </div>
                                    </div>

                                </div>
                                <br/>
                                <small id="drawn_salary" class="form-text text-muted">Drawn Salary</small>
                                <input type="text" class="form-control @error('drawn_salary') is-invalid @enderror" name="drawn_salary" id="drawn_salary" value="{{old('drawn_salary')}}" placeholder="">
                                @error('drawn_salary') <div class="alert alert-danger">{{$message}}</div> @enderror
                                <br/>
                                <div class="form-group">
                                    <label for="KeySkills">Job Responsibility</label>
                                    <textarea id="job_responsibility" name="job_responsibility" class="form-control @error('job_responsibility') is-invalid @enderror"> {{old('job_responsibility')}}</textarea>
                                    @error('job_responsibility') <div class="alert alert-danger">{{$message}}</div> @enderror
                                </div>

                        </div>

                </div>
                --}}
