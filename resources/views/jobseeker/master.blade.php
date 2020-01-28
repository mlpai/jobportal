@extends('layouts.AdminTemplate')

@section('title','Jobseeker Panel')

@section('navbar')
<div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('images/')}}/@if(isset(Auth::user()->profile->photo)){{ Auth::user()->profile->photo != null ? 'profiles/'.Auth::user()->profile->photo : 'person_1.jpg' }}@else{{'person_1.jpg'}}@endif" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ucwords(strtolower(Auth::user()->name))}}</a>
          </div>
        </div>


        <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                  <li class="nav-item">
                    <a href="{{Route('jobseeker')}}" class="nav-link {{Request::is('jobseekers/dashboard*') ? 'active' : ''}} ">
                      <i class="nav-icon fas orange-ico fa-tachometer-alt"></i>
                      <p>
                        Dashboard
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{Route('messages')}}" class="nav-link {{Request::is('jobseekers/messages*')  ? 'active' : ''}}">
                      <i class="nav-icon teal-ico fas fa-envelope"></i>
                      <p>
                          Messages
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{Route('profile.index')}}" class="nav-link {{Request::is('jobseekers/profile*')  ? 'active' : ''}}">
                      <i class="nav-icon pink-ico fas fa-users"></i>
                      <p>
                          Profile
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                          <p>
                          <i class="nav-icon red-ico fas fa-power-off"></i>
                           {{ __('Logout') }} </p>
                          </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                  </li>
                </ul>
              </nav>

</div>
@endsection

@push('scripts')
@if (Session::has('swalalert'))
<script>
    swal.fire({
        title: '{{Session('title')}}',
        text: '{{Session('message')}}',
        type: '{{Session('swalalert')}}',
        confirmButtonText: 'Ok'
        });
</script>
@elseif(Session::has('toastalert'))
    <script>
    Toast.fire({
        type: '{{Session('toastalert')}}',
        title: '{{Session('message')}}'
    })
    </script>
@endif
@endpush
