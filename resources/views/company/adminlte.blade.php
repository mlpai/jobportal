@extends('layouts.AdminTemplate')
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

<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="{{Route('dashboard')}}" class="nav-link {{Request::is('company/dashboard*') ? 'active' : ''}} ">
        <i class="nav-icon fas orange-ico fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item">
        <a href="{{Route('postjob')}}" class="nav-link {{Request::is('company/post-job*')  ? 'active' : ''}}">
          <i class="nav-icon fas yellow-ico fa-briefcase"></i>
          <p>
              Post Job
          </p>
        </a>
      </li>
    <li class="nav-item">
      <a href="{{Route('ShowProfile')}}" class="nav-link {{Request::is('company/profile*')  ? 'active' : ''}}">
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
<!-- /.sidebar-menu -->
</div>
  @endsection
