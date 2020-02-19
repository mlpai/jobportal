@extends('admin.master')

@section('title',$jobseeker->name)

@section('screen',$jobseeker->name)

@section('mainSection')

<section class="content">
    <div class="jumbotron bg-light py-1">
        <div class="row ">
           <div class="col-md-8">
            <div class="d-flex">

                @if($jobseeker->jobseekerProfile->profile_photo != null)

                    <img height="100"  class="img-circle img-responsive" src='{{asset('images/profiles/').'/'.$jobseeker->jobseekerProfile->profile_photo}}' />

                @endif

                <h4 class="py-3 pl-3 heading">
                        <b>{{$jobseeker->name}}</b>
                    <br/>
                    <small class='text-secondary'> <i> as {{$jobseeker->JobseekerProfile->profile_title}}.
                    <br/>
                    <span class="text-secondary" style="font-size:12px;font-weight:100;" >Last Updated :
                        {{date("d-M-Y @ h:i A",strtotime($jobseeker->JobseekerProfile->updated_at))}} </span> </i>
                    </small>
                    </h4>
                </div>
            </div>
            <div class="col-md-4 pt-2">
                <h5>
                    <b>Profile Visibility </b>:
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" @if($jobseeker->JobseekerProfile->visibility) checked @endif type="radio" name="profile_visible" id="" value="1"> Public
                        </label>
                        &nbsp;
                        <label class="form-check-label">
                                <input class="form-check-input" @if($jobseeker->JobseekerProfile->visibility != 1) checked @endif type="radio" name="profile_visible" id="" value="0"> Private
                            </label>
                    </div>
                </h5>

                <div class="mt-4">
                    <b>
                    <a href="{{route('getpdf',[$jobseeker->id])}}" target="_blank" class="btn btn-dark">View Resume</a>
                    </b>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        @include('jobseeker.jobseekerProfilePart')
        {{-- end card 8 --}}
        <div class="col-md-4">
               <div class="card">
                   <div class="card-header text-bold">
                       My Jobs
                   </div>
                   <div class="card-body">

                       <a href="#" class="card-text text-secondary text-bold">Saved <span class="badge badge-primary float-right">{{$jobseeker->posts()->where('type',0)->count()}}</span> </a>
                       <br/>
                       <a href="{{route('messages')}}" class="card-text text-secondary text-bold">Applied <span class="badge badge-danger float-right">{{$jobseeker->posts()->where('type',1)->count()}}</span></a>

                    </div>
               </div>



        </div>
    </div>

</section>
@endsection

@push('scripts')
<script>
    function handler(key)
    {
        var token =  $('input[name="_token"]').attr('value');
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "Experiences/"+key,
                    method:'delete',
                    data: {'_token' :token},
                    success: function(data) {
                        swal.fire(
                            data[0],
                            data[1],
                            data[2]
                        )
                        setTimeout(reload,1500);
                    }
                });
            }
        })
    }

    function reload()
    {
        window.location.href = "{{route('jobseekers.show',[$jobseeker->id])}}";
    }
</script>
@endpush
