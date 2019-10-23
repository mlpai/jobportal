@extends('jobseeker.master')

@section('screen','Messages')

@section('mainSection')

<div class="container">
    {{-- {{dd($posts->toJson())}} --}}
<message :posts='{{$posts->toJson() }}'  :jobseeker='{{Auth::user()->id}}' ></message>
</div>

@endsection
