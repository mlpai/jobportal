<form role="form" enctype="multipart/form-data" method="POST" action="{{route('formpart3')}}" >
    @csrf

    <h5 class=" text-center  card-header"><b>Job Description : <u>{{isset(Session::get('formpart1')['JobTitle']) ? Session::get('formpart1')['JobTitle'] : 'No Post'}}</u></b></h5>
    <div class="progress" style="height: 5px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 70%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    {{-- {{ dd(Request::session()->all()) }} --}}
    <div class="card-body">

            <div class="form-group">
                    <label for="IndustryType">What is the industry of the hiring company ?  </label>
                    <select name="IndustryType" class="form-control @error('IndustryType') is-invalid @enderror " name="IndustryType" id="IndustryType" >
                            <option disabled>Select an option </option>
                            <option value="1" @if(old('IndustryType', isset(Auth::user()->profile->IndustryType) ? Auth::user()->profile->IndustryType : isset(Session::get('formpart3')['IndustryType']) ? Session::get('formpart3')['IndustryType'] : '') ==1) selected @endif>IT/ITes</option>
                            <option value="2" @if(old('IndustryType', isset(Auth::user()->profile->IndustryType) ? Auth::user()->profile->IndustryType : isset(Session::get('formpart3')['IndustryType']) ? Session::get('formpart3')['IndustryType'] : '') ==2) selected @endif>Accountent</option>
                    </select>
                @error('IndustryType')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>

        <label for="salaryFrom" class="">Job Summary </label>
            <div class="form-row">
                <div class="col">
                    <textarea class="form-control @error('JobSummary') is-invalid @enderror " placeholder="Job Summary" name="JobSummary" id="JobSummary" > {{old('JobSummary', isset(Auth::user()->profile->JobSummary) ? Auth::user()->profile->JobSummary : isset(Session::get('formpart3')['JobSummary']) ? Session::get('formpart3')['JobSummary'] : '' ) }}</textarea>
                    @error('JobSummary')<div class="text-red">{{ $message }}</div> @enderror
                </div>
            </div>
            <label for="salaryFrom" class="">Responsibilities & Duties </label>
            <div class="form-row">
                <div class="col">
                    <textarea class="form-control @error('responsibility') is-invalid @enderror " placeholder="Responsibilities & Duties" name="responsibility" id="responsibility" > {{old('responsibility', isset(Auth::user()->profile->responsibility) ? Auth::user()->profile->responsibility : isset(Session::get('formpart3')['responsibility']) ? Session::get('formpart3')['responsibility'] : '' ) }}</textarea>
                    @error('responsibility')<div class="text-red">{{ $message }}</div> @enderror
                </div>
            </div>
            <label for="salaryFrom" class="">Experience / Skills / Qualifications / Others </label>
            <div class="form-row">
                <div class="col">
                    <textarea class="form-control @error('skills') is-invalid @enderror " placeholder="Experience / Skills / Qualifications / Others" name="skills" id="skills" > {{old('skills', isset(Auth::user()->profile->skills) ? Auth::user()->profile->skills : isset(Session::get('formpart3')['skills']) ? Session::get('formpart3')['skills'] : '' ) }}</textarea>
                    @error('skills')<div class="text-red">{{ $message }}</div> @enderror
                </div>
            </div>

    </div>

        <div class="card-footer d-flex justify-content-between">
        <a href="{{Route('formpart2')}}" class="btn btn-outline-danger "> <i class="fas fa-angle-left"></i> Back</a>
        <button type="submit" class="btn btn-primary ml-auto">Preview <i class="fas fa-angle-right"></i></button>
        </div>
</form>

@push('scripts')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'skills' );
    CKEDITOR.replace( 'responsibility' );
    CKEDITOR.replace( 'JobSummary' );
</script>
@endpush
