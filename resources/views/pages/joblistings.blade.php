@extends('layouts.master')

@section('content')
        <div class="site-wrap">
            @include('layouts.navbar')
            @include('layouts.topheader')

            @include('layouts.jobs')
            @include('layouts.companieslogo')

            @include('layouts.singup')
            @include('layouts.footer')
    </div>
@endsection
