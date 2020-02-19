@extends('admin.master')

@section('title','Edit-'.$jobseeker->name)

@section('screen','Edit / '.$jobseeker->name)

@section('mainSection')
<section class="content">

    <div class="container">
            {{-- @if($errors->any())
                @foreach ($errors->all() as $item)
                    <li>{{$item}}</li>
                @endforeach
            @endif --}}

            <form class="form-horizontal" action="@if(isset($jobseeker)) {{Route('jobseekers.update',$jobseeker->id)}} @else {{Route('jobseekers.store')}} @endif" enctype="multipart/form-data" method="post">
                @csrf
                @isset($jobseeker) @method('patch') @endisset
            <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                                <label for="name">Your Name<mandantory></mandantory></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name',$jobseeker->name)}}" name="name" id="name" aria-describedby="name" placeholder="Your Name">
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
@endsection

