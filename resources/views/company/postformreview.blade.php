

    @csrf

    @if(Request::segments()[2] != 'show')
    <h5 class=" text-center  card-header"><b>Review For : <u>{{isset(Session::get('formpart1')['JobTitle']) ? Session::get('formpart1')['JobTitle'] : 'No Post'}}</u></b></h5> @endif
    <div class="progress" style="height: 5px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 100%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    {{-- {{ dd(Request::session()->all()) }} --}}
    <div class="card-body">

            <div class="card">
                    <h5 class="card-header">Job Details <a href="{{Route('formpart1')}}" class="btn-link" style="float:right;" > <i title="edit" class="fas red-ico fa-edit"></i> Edit</a> </h5>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Job</th>
                                    <td>{{Session::get('formpart1')['JobTitle']}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Location</th>
                                    {{-- Session::get('formpart1')['Location'] --}}
                                    <td>{{Session::get('formpart1')['Location'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                  </div>

                  <div class="card">
                        <h5 class="card-header">Additional Details <a href="{{Route('formpart2')}}" class="btn-link" style="float:right;" > <i title="edit" class="fas red-ico fa-edit"></i> Edit</a> </h5>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">What type of job is it ? </th>
                                        <td>{{ App\Http\Controllers\CompanyPostsController::getJobType(Session::get('formpart2')['JobType']) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Salary For this Job ? (Optional)</th>
                                        <td>
                                            {{Session::get('formpart2')['salaryFrom']}}
                                            - {{Session::get('formpart2')['salaryTo']}} /
                                            {{App\Http\Controllers\CompanyPostsController::getSalaryType(Session::get('formpart2')['salarytime'])}}
                                        </td>
                                    </tr>
                                    <tr>
                                            <th scope="row">How many hires do you want to make for this position ?</th>
                                            <td>
                                                {{Session::get('formpart2')['Positions']}} Persons
                                            </td>
                                        </tr>

                                </tbody>
                            </table>
                        </div>
                      </div>

                      <div class="card">
                        <h5 class="card-header">Job Description <a href="{{Route('formpart3')}}" class="btn-link" style="float:right;" > <i title="edit" class="fas red-ico fa-edit"></i> Edit</a> </h5>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">What is the industry of the hiring company ? </th>
                                        <td>{{ App\Http\Controllers\CompanyPostsController::getCompanyType(Session::get('formpart3')['IndustryType'])}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Job Summary</th>
                                        <td>
                                            {!! Session::get('formpart3')['JobSummary']!!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Responsibilities & Duties</th>
                                        <td>
                                            {!! Session::get('formpart3')['responsibility']!!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Experience / Skills / Qualifications / Others</th>
                                        <td>
                                            {!! Session::get('formpart3')['skills'] !!}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                      </div>


    </div>

        <div class="card-footer d-flex justify-content-between">
        <a href="{{Request::segments()[2] == 'show' ? route('postjob') : Route('formpart3')}}" class="btn btn-outline-danger "> <i class="fas fa-angle-left"></i> Back</a>
        @if(Request::segments()[2] != 'show')
        <a href="{{Session::get('updateRequest')['change'] ? route('formpart3Update') : Route('SavePost')}}"  class="btn btn-primary ml-auto"><i class="fas fa-save"></i> {{Request::segments()[2] == 'show' ? 'Update' : 'Save' }} </a>
        @endif
        </div>
