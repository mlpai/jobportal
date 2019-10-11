 @extends('company.adminlte')
@section('title','Company\'s Profile')
@section('screen','Profile')

@section('mainSection')
    <div class='container-fluid'>
        <div class="row">
            <div class="offset-1 col-md-10">
                @if(Request::path()=='company/profile/edit')
                    <div class="card">
                        <form role="form" enctype="multipart/form-data" method="POST" action="{{route('CreateProfile')}}" >
                            @csrf
                            <div class="card-body">
                                <h3 class="mb-4" style="border-bottom:1px solid rgb(234, 234, 234);">Accounts Information</h3>
                                <div class="form-group">
                                    <label for="CompanyName">Company Name</label>
                                    <input name="CompanyName" value="{{ old('CompanyName', isset($company->CompanyProfile->CompanyName) ? $company->Companyprofile->CompanyName : '' ) }}" type="text" class="form-control @error('CompanyName') is-invalid @enderror " id="CompanyName" placeholder="Company Name">
                                    @error('CompanyName')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="CompanySize">Company Size</label>
                                    <select id="CompanySize" value="{{ old('CompanySize', isset($company->CompanyProfile->CompanySize) ? $company->CompanyProfile->CompanySize : '' ) }}" class="form-control @error('CompanySize') is-invalid @enderror" name="CompanySize"  >
                                        <option  disabled value="">How many employees?</option>
                                        <option value="1" @if(old('CompanySize',isset($company->CompanyProfile->CompanySize) ? $company->CompanyProfile->CompanySize : "") == 1) selected @endif > 1 - 49</option>
                                        <option value="2" @if(old('CompanySize',isset($company->CompanyProfile->CompanySize) ? $company->CompanyProfile->CompanySize : "") == 2) selected @endif > 50 - 149</option>
                                        <option value="3" @if(old('CompanySize',isset($company->CompanyProfile->CompanySize) ? $company->CompanyProfile->CompanySize : "") == 3) selected @endif > 150 - 249</option>
                                        <option value="4" @if(old('CompanySize',isset($company->CompanyProfile->CompanySize) ? $company->CompanyProfile->CompanySize : "") == 4) selected @endif > 250 - 499</option>
                                        <option value="5" @if(old('CompanySize',isset($company->CompanyProfile->CompanySize) ? $company->CompanyProfile->CompanySize : "") == 5) selected @endif > 500 - 749</option>
                                        <option value="6" @if(old('CompanySize',isset($company->CompanyProfile->CompanySize) ? $company->CompanyProfile->CompanySize : "") == 6) selected @endif > 750 - 999</option>
                                        <option value="7" @if(old('CompanySize',isset($company->CompanyProfile->CompanySize) ? $company->CompanyProfile->CompanySize : "") == 7) selected @endif > 1000 +</option>
                                    </select>
                                    @error('CompanySize')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="form-group">
                                        <label for="Phone">Phone</label>
                                        <input name="phone" value="{{ old('phone', isset($company->CompanyProfile->phone) ? $company->CompanyProfile->phone : '' ) }}" type="text" class="form-control @error('phone') is-invalid @enderror" id="Phone" placeholder="Phone Number Without Country Code">
                                        @error('phone')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="form-group">
                                        <label for="RecruiterType">Are you a recruiter hiring for a client?</label>
                                        <select name="RecruiterType" class="form-control @error('RecruiterType') is-invalid @enderror" id="RecruiterType">
                                            <option disabled value="">Select an option</option>
                                            <option value="1" @if(old('RecruiterType',isset($company->CompanyProfile->RecruiterType) ? $company->CompanyProfile->RecruiterType : "") == 1) selected @endif >Yes - I am hiring for a client</option>
                                            <option  value="2" @if(old('RecruiterType',isset($company->CompanyProfile->RecruiterType) ? $company->CompanyProfile->RecruiterType : "") == 2) selected @endif>No - I am a direct employer hiring our next employee</option>
                                        </select>
                                        @error('RecruiterType')<div class="alert alert-danger">{{ $message }}</div>@enderror

                                </div>

                                <div class="form-group">
                                        <label for="Refrence">How did you hear about us?</label>
                                        <select id="Refrece" class="form-control @error('Refrence') is-invalid @enderror" name="Refrence">
                                            <option disabled value="">Select Refrence</option>
                                            <option  value="1" @if(old('Refrence',isset($company->CompanyProfile->Refrence) ? $company->CompanyProfile->Refrence : "") == 1) selected @endif >Other</option>
                                            <option  value="2" @if(old('Refrence',isset($company->CompanyProfile->Refrence) ? $company->CompanyProfile->Refrence : "") == 2) selected @endif >Podcast</option>
                                            <option  value="3" @if(old('Refrence',isset($company->CompanyProfile->Refrence) ? $company->CompanyProfile->Refrence : "") == 3) selected @endif >Billboard</option>
                                            <option  value="4" @if(old('Refrence',isset($company->CompanyProfile->Refrence) ? $company->CompanyProfile->Refrence : "") == 4) selected @endif >Radio (AM/FM/XM)</option>
                                            <option  value="5" @if(old('Refrence',isset($company->CompanyProfile->Refrence) ? $company->CompanyProfile->Refrence : "") == 5) selected @endif >Online Video</option>
                                            <option  value="6" @if(old('Refrence',isset($company->CompanyProfile->Refrence) ? $company->CompanyProfile->Refrence : "") == 6) selected @endif >Newspaper</option>
                                            <option  value="7" @if(old('Refrence',isset($company->CompanyProfile->Refrence) ? $company->CompanyProfile->Refrence : "") == 7) selected @endif >Streaming Audio (Spotify, Pandora, etc.)</option>
                                            <option  value="8" @if(old('Refrence',isset($company->CompanyProfile->Refrence) ? $company->CompanyProfile->Refrence : "") == 8) selected @endif >TV</option>
                                            <option  value="9" @if(old('Refrence',isset($company->CompanyProfile->Refrence) ? $company->CompanyProfile->Refrence : "") == 9) selected @endif >Word of Mouth</option>
                                            <option  value="10" @if(old('Refrence',isset($company->CompanyProfile->Refrence) ? $company->CompanyProfile->Refrence : "") == 10) selected @endif >Search Engine (ex. Google, Bing, Yahoo)</option>
                                            <option  value="11" @if(old('Refrence',isset($company->CompanyProfile->Refrence) ? $company->CompanyProfile->Refrence : "") == 11) selected @endif >Social Media</option>
                                            <option  value="12" @if(old('Refrence',isset($company->CompanyProfile->Refrence) ? $company->CompanyProfile->Refrence : "") == 12) selected @endif >In the Mail</option>
                                        </select>
                                        @error('Refrence')<div class="alert alert-danger">{{ $message }}</div>@enderror

                                </div>

                                <div class="form-group">
                                        <label for="CompanyAddress">Address</label>
                                        <textarea class="form-control @error('CompanyAddress') is-invalid @enderror" name="CompanyAddress" id="CompanyAddress" placeholder="Company Address">{{ old('CompanyAddress', isset($company->CompanyProfile->CompanyAddress) ? $company->CompanyProfile->CompanyAddress : '' ) }}</textarea>
                                        @error('CompanyAddress')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo">
                                    @error('photo')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                </div>
                            </div>

                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card card-primary">
                                <div class="card-body card-profile">
                                <img class="profile-user-img d-flex img-circle" src="../../images/@if(isset($company->CompanyProfile->photo)){{ $company->CompanyProfile->photo != null ? 'profiles/'.$company->CompanyProfile->photo : 'person_1.jpg' }}@else{{'person_1.jpg'}}@endif" alt="User profile picture">

                                <h3 class="profile-username text-center">{{$company->name}}</h3>
                                <p class="text-muted text-center">at ({{ isset($company->CompanyProfile->CompanyName) ? $company->CompanyProfile->CompanyName : '' }})</p>
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                    <b>Mobile</b>: <a href="tel:+91{{ isset($company->CompanyProfile->phone) ? $company->CompanyProfile->phone : '' }}"> +91 {{ isset($company->CompanyProfile->phone) ? $company->CompanyProfile->phone : '' }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Employee(s)</b>: {{ isset($company->CompanyProfile->CompanySize) ? $company->CompanyProfile->CompanySize : '' }}
                                    </li>
                                    <li class="list-group-item">
                                            <b>Type of Recruiter</b>: {{ucwords(strtolower(str_replace("_"," ",isset($company->CompanyProfile->RecruiterType) ? $company->CompanyProfile->RecruiterType : '')))}}
                                    </li>
                                </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                        <div class="col-md-5">
                                <div class="card card-primary">
                                    <div class="card-body card-profile">

                                    <h3 class="profile-username text-center">Address</h3>

                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                                {{ isset($company->CompanyProfile->CompanyAddress) ? $company->CompanyProfile->CompanyAddress : '' }}
                                        </li>
                                        <li class="list-group-item">
                                        <b>Email</b> <a class="pull-right">{{$company->email}}</a>
                                        </li>
                                    </ul>

                                    <a href="{{Route('EditProfile')}}" class="btn btn-outline-primary btn-block"><i class="fas fa-edit"></i> <b>Edit</b></a>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                @endif
            </div>
        </div>
    </div>
@endsection


                    @push('scripts')
                        @if (Session::has('warning'))
                        <script>
                            swal.fire({
                                title: 'Warning!',
                                text: '{{Session('warning')}}',
                                type: 'warning',
                                confirmButtonText: 'Ok'
                                });
                        </script>
                        @elseif(Session::has('success'))
                            <script>
                            Toast.fire({
                                type: 'success',
                                title: '{{Session('success')}}'
                            })
                            </script>
                        @endif
                    @endpush
