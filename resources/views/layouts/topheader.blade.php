<section class="home-section {{ isset(Request::segments()[0]) ? Request::segments()[0] == 'job-details' ? 'inner-page' : '' : '' }} {{ isset(Request::segments()[0]) ? Request::segments()[0] == 'job-listings' ? 'inner-page' : '' : '' }} section-hero overlay bg-image" style="background-image: url('{{asset('images/hero_1.jpg')}}');" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                    @if(isset(Request::segments()[0]) ? Request::segments()[0] == 'job-details' : '')
                <div class="mb-2">
                    <h1 class="text-white font-weight-bold">
                            @section('title',$post->JobTitle)
                            {{$post->JobTitle}}
                        @else
                <div class="mb-3 text-center">
                    <h1 class="text-white font-weight-bold">
                        {{ isset(Request::segments()[0]) ? Request::segments()[0] == 'job-listings' ? 'Job Listings' : 'Get Hired Now' : 'Get Hired Now' }}</h1>
                        <p>Find your dream job here</p>
                        @endif
                </div>
                @if(!isset(Request::segments()[1]))
                    <form method="post" action="{{Route('searchJobs')}}" class="search-jobs-form">
                        @csrf
                        <div class="row mb-5">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <input type="text" value='{{old('JobTitle')}}' name="JobTitle" class="form-control form-control-lg" placeholder="Job title, keywords...">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">

                                <select name="Location" class="form-control">
                                <option value="">Anywhere</option>
                                @foreach ($cities->unique('Location') as $city)
                                    <option>{{$city->Location}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <select name="JobType" class="form-control">
                                <option value="1">Full Time</option>
                                <option value="2">Part Time</option>
                                <option selected value="">Any</option>
                            </select>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="fas fa-search  icon mr-2"></span>Search Job</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    </section>
