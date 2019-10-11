@extends('company.adminlte')

@section('screen','Add a Job')

@section('title','Create a New Job')

@section('mainSection')

    <div class="offset-md-2 col-md-8">
            <div class="card ">

                @switch(last(Request::segments()))
                        @case('create-step-1')

                            @include('company.postformpart1')

                        @break
                        @case('create-step-2')
                            @if(Session::has('formpart1'))
                                @include('company.postformpart2')
                            @else
                                <script>window.location.href = "{{Route('formpart1')}}";</script>
                            @endif
                        @break
                        @case('create-step-3')
                            @if(Session::has('formpart2'))
                                @include('company.postformpart3')
                            @else
                                <script>window.location.href = "{{Route('formpart2')}}";</script>
                            @endif

                        @break
                        @case('create-review')
                            @if(Session::has('formpart2'))
                                @include('company.postformreview')
                            @else
                                <script>window.location.href = "{{Route('formpart3')}}";</script>
                            @endif
                        @break
                        @default
                @endswitch
            </div>
    </div>
@endsection
