@extends('jobseeker.master')

@section('screen','Profile Details')

@section('title','Profile Details')

@section('mainSection')
<section class="content">

    <div class="container">
            <form class="form-horizontal" action="@if(isset($Experience)) {{Route('Experiences.update',$Experience->id)}} @else {{Route('Experiences.store')}} @endif"  method="post">
                    @csrf
                    @isset($Experience) @method('patch') @endisset
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                    <label for="CurrentJob">Previous Jobs</label>
                                    <input type="text" class="form-control @error('job_role') is-invalid @enderror" name="job_role" id="Qualification" value="{{old('job_role',$Experience->job_role ?? "")}}" placeholder="Job Title">
                                    @error('job_role') <div class="alert alert-danger">{{$message}}</div> @enderror
                                    <br/>
                                    <small id="company_name" class="form-text text-muted">Company Name</small>
                                    <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" id="company_name" value="{{old('company_name',$Experience->company_name ?? "")}}" placeholder="Company Name">
                                    @error('company_name') <div class="alert alert-danger">{{$message}}</div> @enderror
                                    <br/>
                                    <small id="location" class="form-text text-muted">Job location</small>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" id="location" value="{{old('location',$Experience->location ?? "")}}" placeholder="eg: delhi, Ludhiana, Gurugram etc">
                                    @error('location') <div class="alert alert-danger">{{$message}}</div> @enderror
                                    <br/>

                                    <small class="form-text text-muted">Total Experience </small>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select class="form-control @error('experience_year') is-invalid @enderror" name='experience_year'>
                                                    <option value=''>Select</option>
                                                    @for ($i = 0; $i <= 12; $i++)
                                                        <option {{old('experience_year',$Experience->experience_year ?? "") == $i ? "selected" : ""}} value='{{$i}}'>{{$i}} Year</option>
                                                    @endfor
                                            </select>
                                            @error('experience_year') <div class="alert alert-danger">{{$message}}</div> @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <select class="form-control @error('experience_month') is-invalid @enderror" name='experience_month'>
                                                <option value=''>Select</option>
                                                 @for ($i = 0; $i <= 12; $i++)
                                                        <option {{old('experience_month',$Experience->experience_month ?? "") == $i ? "selected" : ""}} value='{{$i}}'>{{$i}} Month</option>
                                                    @endfor
                                            </select>
                                            @error('experience_month') <div class="alert alert-danger">{{$message}}</div> @enderror
                                        </div>
                                        <div class="col-md-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" {{old('currently_working',$Experience->currently_working ?? "") == 1 ? "checked" : ""}}  class="custom-control-input @error('currently_working') is-invalid @enderror" name="currently_working" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1"><abbr data-toggle="tooltip" title="Tick if you're currently working at this company"> Working </abbr></label>
                                            @error('currently_working') <div class="alert alert-danger">{{$message}}</div> @enderror
                                        </div>
                                        </div>
                                    </div>
                                        <br/>
                                        <small for="CurrentJob">Drawn Salary</small>
                                        <input type="number" class="form-control @error('drawn_salary') is-invalid @enderror" name="drawn_salary" id="drawn_salary" value="{{old('drawn_salary',$Experience->drawn_salary ?? "")}}" placeholder="">
                                         @error('drawn_salary') <div class="alert alert-danger">{{$message}}</div> @enderror
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                    <label for="CurrentJob">Job Responsibility</label>
                                    <textarea id="job_responsibility" name="job_responsibility" class="form-control @error('job_responsibility') is-invalid @enderror"> {{old('job_responsibility',$Experience->job_responsibility ?? "")}}</textarea>
                                    @error('job_responsibility') <div class="alert alert-danger">{{$message}}</div> @enderror
                                </div>
                    </div>
            </div>
            <br/>

                <div class="container d-flex ">
                    <a href="{{route('profile.index')}}" class="btn btn-warning align-content-start ">Back</a>
                    <button type="submit" class="btn btn-primary m-auto d-block">Save Profile</button>
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
    CKEDITOR.replace('job_responsibility');
</script>
@endpush
