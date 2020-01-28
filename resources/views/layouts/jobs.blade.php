<section class="site-section">
    <div class="container">

        <div class="row mb-5 justify-content-center">
        <div class="col-md-7 text-center" id="jobs">
            <h2 class="section-title mb-2">{{number_format($posts->total())}} Job Listed</h2>
        </div>
        </div>


        @foreach ($posts as $post)
            {{-- {{dd($post)}} --}}
            <div class="mb-3">
                <div class="row align-items-start job-item border-bottom pb-3 mb-2 pt-2">
                    <div class="col-md-2">
                    <a href="{{Route('firstJob').'/'.$post->id.'/'.str_slug($post->JobTitle)}}"><img style="height:65px" src="{{asset('images/profiles').'/'.$post->Company->CompanyProfile->photo}}" alt="Image" class="img-fluid img-thumbnail"></a>
                    </div>
                    <div class="col-md-4">
                    <span class="badge badge-primary px-2 py-1 mb-3">{{$post->JobType['type']}}</span>
                    <h2><a href="{{Route('firstJob').'/'.$post->id.'/'.str_slug($post->JobTitle)}}">{{$post->JobTitle}}</a> </h2>
                    <p class="meta">Publisher: <strong>{{$post->Company->name}}</strong> In: <strong>{{App\Http\Controllers\CompanyPostsController::getCompanyType($post->IndustryType)}}</strong></p>
                    </div>
                    <div class="col-md-3 text-left">
                    <h3>{{$post->Location}}</h3>
                    <span class="meta">India</span>
                    </div>
                    <div class="col-md-3 text-md-right">
                    <strong class="text-black"><i class="fas fa-rupee-sign"></i>{{$post->salaryFrom}} &mdash; <i class="fas fa-rupee-sign"></i>{{$post->salaryTo}}</strong>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="row pagination-wrap">

        <div class="col-md-6 text-center text-md-left">
            <div class="ml-auto">
                {{$posts->fragment('jobs')->links()}}
            </div>
        </div>
        </div>

    </div>
    </section>
