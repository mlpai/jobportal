@extends('company.adminlte')
@section('title','Dashboard')
@section('screen','Dashboard')

@section('mainSection')

<div class="container">
    <div class="row">
            <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-cyan ">
                      <div class="inner">
                      <h3>{{$company->jobs()->where('job_status',1)->count()}}</h3>

                        <p>Jobs Posted</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-briefcase"></i>
                      </div>
                      <a href="{{route('postjob')}}" class="small-box-footer">Show <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-olive ">
                          <div class="inner">
                            <h3>{{$interestedPerson}}</h3>

                            <p>Interested Jobseekers</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-user"></i>
                          </div>
                          <a href="{{route('postjob')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>

                      <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-maroon ">
                              <div class="inner">
                                <h3>{{$jobseekers->count()}}</h3>

                                <p>Jobseekers</p>
                              </div>
                              <div class="icon">
                                <i class="fas fa-users"></i>
                              </div>
                              <a href="{{route('postjob')}}" class="small-box-footer">Search Candidates <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                          </div>
    </div>
</div>
@endsection
