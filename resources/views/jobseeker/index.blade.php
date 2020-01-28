@extends('jobseeker.master')

@section('screen','Dashboard')

@section('mainSection')
<div class="container">
<div class="row">
        <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-cyan ">
                  <div class="inner">
                  <h3>{{$jobseeker->posts()->where('type',0)->count()}}</h3>

                    <p>Saved Jobs</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-save"></i>
                  </div>
                  <a href="{{route('postjob')}}" class="small-box-footer">Show <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-olive ">
                      <div class="inner">
                        <h3>{{$jobseeker->posts()->where('type',1)->count()}}</h3>

                        <p>Applied Jobs</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-briefcase"></i>
                      </div>
                      <a href="{{route('messages')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-maroon ">
                          <div class="inner">
                            <h3>{{$jobs->count()}}</h3>

                            <p>Total Jobs</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-search"></i>
                          </div>
                          <a href="{{route('joblistings',"#jobs")}}" class="small-box-footer">Search Jobs <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
</div>
</div>
@endsection
