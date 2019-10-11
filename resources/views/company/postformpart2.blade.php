<form role="form" enctype="multipart/form-data" method="POST" action="{{route('formpart2')}}" >
    @csrf

    <h5 class=" text-center  card-header"><b>Additional Details</b></h5>
    <div class="progress" style="height: 5px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 40%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    {{-- {{ dd(Request::session()->all()) }} --}}
    <div class="card-body">
        <b>What type of job is it ? </b><br/><br/>
        <div class="form-group">

            <div class="form-check form-check-inline">
            <input class="form-check-input" @if(old('JobType', isset(Auth::user()->profile->JobType) ? Auth::user()->profile->JobType['id'] : isset(Session::get('formpart2')['JobType']) ? Session::get('formpart2')['JobType'] : '') ==1) checked @endif type="radio" name="JobType" id="JobType1" value="1">
            <label class="form-check-label" for="JobType1">Full Time</label>
            </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" @if(old('JobType', isset(Auth::user()->profile->JobType) ? Auth::user()->profile->JobType['id'] : isset(Session::get('formpart2')['JobType']) ? Session::get('formpart2')['JobType'] : '') ==2) checked @endif name="JobType" id="JobType2" value="2">
            <label class="form-check-label" for="JobType2">Part Time</label>

        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" @if(old('JobType', isset(Auth::user()->profile->JobType) ? Auth::user()->profile->JobType['id'] : isset(Session::get('formpart2')['JobType']) ? Session::get('formpart2')['JobType'] : '') ==3) checked @endif name="JobType" id="JobType3" value="3">
            <label class="form-check-label" for="JobType3">Both</label>

        </div>
        @error('JobType')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>

        <label for="salaryFrom" class="">Salary For this Job ? (Optional) </label>
        <div class="form-row">
            <div class="col">
                <input type="number" value="{{old('salaryFrom', isset(Auth::user()->profile->salaryFrom) ? Auth::user()->profile->salaryFrom : isset(Session::get('formpart2')['salaryFrom']) ? Session::get('formpart2')['salaryFrom'] : '') }}" class="form-control @error('salaryFrom') is-invalid @enderror " name="salaryFrom" id="salaryFrom" placeholder="Salary From">
                @error('salaryFrom')<div class="text-red">{{ $message }}</div> @enderror

            </div>
            <div class="col">
                <input type="number" value="{{old('salaryTo', isset(Auth::user()->profile->salaryTo) ? Auth::user()->profile->salaryTo : isset(Session::get('formpart2')['salaryTo']) ? Session::get('formpart2')['salaryTo'] : '') }}" class="form-control @error('salaryTo') is-invalid @enderror " name="salaryTo" id="salaryTo" placeholder="Salary To">
                @error('salaryTo')<div class="text-red">{{ $message }}</div> @enderror
            </div>
            <div class="col">
                <select class="form-control @error('salarytime') is-invalid @enderror" name="salarytime" >
                    <option disabled>Select an option</option>
                    <option value="1" @if(old('salarytime', isset(Auth::user()->profile->salarytime) ? Auth::user()->profile->salarytime : isset(Session::get('formpart2')['salarytime'])? Session::get('formpart2')['salarytime'] :'') ==1) selected @endif >Per Month</option>
                    <option value="2" @if(old('salarytime', isset(Auth::user()->profile->salarytime) ? Auth::user()->profile->salarytime : isset(Session::get('formpart2')['salarytime'])? Session::get('formpart2')['salarytime'] :'') ==2) selected @endif>Annual</option>
                </select>
            </div>
        </div>

        <div class="form-group">
                <label for="Positions">How many hires do you want to make for this position ? </label>
                <select name="Positions" class="form-control @error('Positions') is-invalid @enderror " name="Positions" id="Positions" >
                    <option disabled>Select an option </option>
                    <option value="1" @if(old('Positions', isset(Auth::user()->profile->Positions) ? Auth::user()->profile->Positions : isset(Session::get('formpart2')['Positions'])? Session::get('formpart2')['Positions'] : '') ==1) selected @endif>1 Person</option>
                    <option value="2" @if(old('Positions', isset(Auth::user()->profile->Positions) ? Auth::user()->profile->Positions : isset(Session::get('formpart2')['Positions'])? Session::get('formpart2')['Positions'] : '') ==2) selected @endif>2 Persons</option>
                    <option value="3" @if(old('Positions', isset(Auth::user()->profile->Positions) ? Auth::user()->profile->Positions : isset(Session::get('formpart2')['Positions'])? Session::get('formpart2')['Positions'] : '') ==3) selected @endif>3 Persons</option>
                    <option value="4" @if(old('Positions', isset(Auth::user()->profile->Positions) ? Auth::user()->profile->Positions : isset(Session::get('formpart2')['Positions'])? Session::get('formpart2')['Positions'] : '') ==4) selected @endif>4 Persons</option>
                    <option value="5" @if(old('Positions', isset(Auth::user()->profile->Positions) ? Auth::user()->profile->Positions : isset(Session::get('formpart2')['Positions'])? Session::get('formpart2')['Positions'] : '') ==5) selected @endif>5 Persons</option>
                    <option value="6" @if(old('Positions', isset(Auth::user()->profile->Positions) ? Auth::user()->profile->Positions : isset(Session::get('formpart2')['Positions'])? Session::get('formpart2')['Positions'] : '') ==6) selected @endif>6 Persons</option>
                </select>
                @error('Positions')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>


    </div>

        <div class="card-footer d-flex justify-content-between">
        <a href="{{Route('formpart1')}}" class="btn btn-outline-danger "> <i class="fas fa-angle-left"></i> Back</a>
        <button type="submit" class="btn btn-primary ml-auto">Continue <i class="fas fa-angle-right"></i></button>
        </div>
</form>
