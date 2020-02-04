@extends('admin.master')


@section('mainSection')
    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-cyan ">
                  <div class="inner">
                  <h3>0</h3>
                    <p>Companies</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-building"></i>
                  </div>
                  <a href="{{route('postjob')}}" class="small-box-footer">Show <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue ">
                  <div class="inner">
                  <h3>0</h3>
                    <p>Jobseekers</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user"></i>
                  </div>
                  <a href="{{route('postjob')}}" class="small-box-footer">Show <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-dark ">
                  <div class="inner">
                  <h3>0</h3>
                    <p>Total Jobs</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-bullhorn"></i>
                  </div>
                  <a href="{{route('postjob')}}" class="small-box-footer">Show <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green ">
                  <div class="inner">
                  <h3>0</h3>
                    <p>Applied Jobs</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-chart-area"></i>
                  </div>
                  <a href="{{route('postjob')}}" class="small-box-footer">Show <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

        </div>

        <hr color="red"/>

        <h4>Status Wise Jobseekers</h4>

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-fuchsia ">
                  <div class="inner">
                  <h3>0</h3>
                    <p>Awaiting</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-building"></i>
                  </div>
                  <a href="{{route('postjob')}}" class="small-box-footer">Show <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box  bg-cyan">
                  <div class="inner">
                  <h3>0</h3>
                    <p>Reviewed</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user"></i>
                  </div>
                  <a href="{{route('postjob')}}" class="small-box-footer">Show <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue ">
                  <div class="inner">
                  <h3>0</h3>
                    <p>Contacting</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-bullhorn"></i>
                  </div>
                  <a href="{{route('postjob')}}" class="small-box-footer">Show <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-primary ">
                  <div class="inner">
                  <h3>0</h3>
                    <p>Interviewd</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-chart-area"></i>
                  </div>
                  <a href="{{route('postjob')}}" class="small-box-footer">Show <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

        </div>

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-teal ">
                  <div class="inner">
                  <h3>0</h3>
                    <p>Offer Made</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-building"></i>
                  </div>
                  <a href="{{route('postjob')}}" class="small-box-footer">Show <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-danger ">
                  <div class="inner">
                  <h3>0</h3>
                    <p>Rejected</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user"></i>
                  </div>
                  <a href="{{route('postjob')}}" class="small-box-footer">Show <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green ">
                  <div class="inner">
                  <h3>0</h3>
                    <p>Hired</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-bullhorn"></i>
                  </div>
                  <a href="{{route('postjob')}}" class="small-box-footer">Show <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
        </div>


    </div>
@endsection
