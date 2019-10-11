<div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="fas fa-times js-menu-toggle"></span>
        </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
        <div class="container-fluid">
        <div class="row align-items-center">
            <div class="site-logo col-6">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('images/siteLogo.png')}}" class="img-responsive" height="50" >
                        {{ config('app.name', 'Laravel') }}
                    </a>
            </div>

            <nav class="mx-auto site-navigation">
                <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                    <li><a href="/" class=" {{ Request::path() == '/' ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{Route('joblistings')}}" class="{{ Request::path() == 'job-listings' ? 'active' : '' }}">Job Listings</a></li>
                    <li class="d-lg-none"><a href="{{Route('postjob')}}" >Post Job</a></li>
                    @guest
                        <li>
                            <a href="{{ route('login') }} ">Login</a>
                        </li>
                    @if (Route::has('register'))
                        <li>
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else

                        <li>
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <span class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        Dashboard
                                    </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                                </a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                            </span>
                        </li>
                    @endguest
                </ul>
            </nav>

            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                <div class="ml-auto">
                    {{-- <a href="contact" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 fas fa-paper-plane"></span>Contact Us</a> --}}
                    <a href="{{Route('postjob')}}" class="btn btn-warning border-width-2 d-none d-lg-inline-block"><span class="mr-2 fas fa-suitcase"></span>Post Job</a>
                </div>
                <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="fas fa-bars h3 m-0 p-0 mt-2"></span></a>
            </div>

            </div>
        </div>
    </header>
