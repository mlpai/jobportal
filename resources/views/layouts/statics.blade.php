<section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
        <div class="row mb-5 justify-content-center">
        <div class="col-md-7 text-center">
            <h2 class="section-title mb-2 text-white">Careers Statistics</h2>
            {{-- <p class="lead text-white">What we have in last few years</p> --}}
        </div>
        </div>
        <div class="row pb-0 block__19738 section-counter">

        <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
            <strong class="number" data-number="1930">{{$jobseekersCount}}</strong>
            </div>
            <span class="caption">Candidates</span>
        </div>

        <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
            <strong class="number" data-number="{{$posts->total()}}">{{$posts->total()}}</strong>
            </div>
            <span class="caption">Jobs Posted</span>
        </div>

        <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
            <strong class="number" data-number="120">{{$count}}</strong>
            </div>
            <span class="caption">Jobs Filled</span>
        </div>

        <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
            <strong class="number" data-number="550">{{$usersCount}}</strong>
            </div>
            <span class="caption">Companies</span>
        </div>


        </div>
    </div>
    </section>
