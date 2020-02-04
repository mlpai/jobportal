@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
@endpush
