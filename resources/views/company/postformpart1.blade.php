<form role="form" enctype="multipart/form-data" method="POST" action="{{route('formpart1')}}" >
    @csrf

    <h5 class=" text-center  card-header"><b>Job Details</b></h5>
    <div class="progress" style="height: 5px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 5%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <div class="card-body">
        <div class="form-group">
            <label for="JobTitle">Job Title</label>
        <input name="JobTitle" value="{{ old('JobTitle', isset(Auth::user()->profile->JobTitle) ? Auth::user()->profile->JobTitle : isset(Session::get('formpart1')['JobTitle']) ? Session::get('formpart1')['JobTitle'] : ''  ) }}" type="text" class="form-control @error('JobTitle') is-invalid @enderror " id="JobTitle" placeholder="Job Title">
            @error('JobTitle')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
                <label for="Location">Location</label>
                <input name="Location" value="{{ old('Location', isset(Auth::user()->profile->Location) ? Auth::user()->profile->Location : isset(Session::get('formpart1')['Location']) ? Session::get('formpart1')['Location'] : ''  ) }}" type="text" class="form-control @error('Location') is-invalid @enderror" id="Location" placeholder="City / Pin code">
                @error('Location')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="card-footer d-flex justify-content-between">
        <a href="{{Route('postjob')}}" class="btn btn-outline-danger "> <i class="fas fa-angle-left"></i> Back</a>
        <button type="submit" class="btn btn-primary ml-auto">Continue <i class="fas fa-angle-right"></i></button>
        </div>
</form>
