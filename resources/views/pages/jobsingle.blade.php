@extends('layouts.master')

@section('content')
        <div class="site-wrap">
            @include('layouts.navbar')
            @include('layouts.topheader')

            @include('layouts.summary')

            @include('layouts.footer')
    </div>
@endsection
