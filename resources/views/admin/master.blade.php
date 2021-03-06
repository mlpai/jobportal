@extends('layouts.AdminTemplate')

@section('title','Admin Panel')

@section('themetitle',"Super Admin")

@section('navbar')
<div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                  <li class="nav-item">
                    <a href="{{Route('admin')}}" class="nav-link {{Request::is('admin/dashboard') ? 'active' : ''}} ">
                      <i class="nav-icon fas orange-ico fa-tachometer-alt"></i>
                      <p>
                        Dashboard
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{Route('companies.index')}}" class="nav-link {{Request::is('admin/dashboard/companies*')  ? 'active' : ''}}">
                      <i class="nav-icon teal-ico fas fa-building"></i>
                      <p>
                          Companies
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{Route('jobseekers.index')}}" class="nav-link {{Request::is('admin/dashboard/jobseekers*')  ? 'active' : ''}}">
                      <i class="nav-icon pink-ico fas fa-users"></i>
                      <p>
                          Jobseekers
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{Route('profile.index')}}" class="nav-link {{Request::is('admin/profile*')  ? 'active' : ''}}">
                      <i class="nav-icon blue-ico fas fa-cogs"></i>
                      <p>
                          Masters
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
