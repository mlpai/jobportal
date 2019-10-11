@extends('layouts.app')
@section('content')

@include('layouts.navbar2')

@push('styles')
    <style>
          html,body{
    background-color: #ce07070d;
    background-image: url(http://job2.io/images/canada.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    height: 100%;
    font-family: 'Numans', sans-serif;
    }
        .register{
            background: -webkit-linear-gradient(left, #3931afbd, #00c6ff6b);
            margin-top: 3%;
            padding: 3%;
            border-radius:50px;
        }
        .register-left{
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }
        .register-left a{
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            font-weight: bold;
            margin-top: 5%;
            margin-bottom: 1%;
            cursor: pointer;
        }
        .register-right{
            background: #f8f9fa;
            border-top-left-radius: 10% 50%;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10% 50%;
        }
        .register-left img{
            margin-top: 15%;
            margin-bottom: 5%;
            width: 25%;
            -webkit-animation: mover 2s infinite  alternate;
            animation: mover 1s infinite  alternate;
        }
        @-webkit-keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        @keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        .register-left p{
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }
        .register .register-form{
            padding: 10%;
            margin-top: 10%;
        }
        .btnRegister{
            float: right;
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }
        .register .nav-tabs{
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }
        .register .nav-tabs .nav-link{
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }
        .register .nav-tabs .nav-link:hover{
            border: none;
        }
        .register .nav-tabs .nav-link.active{
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }
        .register-heading{
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
        }
    </style>
@endpush

<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://i.ibb.co/YtLdjc2/3f44aa7e-eb6e-4973-b0dc-36552fd98a71-200x200.png" alt="easy jobs" border="0">
            <h3>Welcome</h3>
            <p>You are 30 seconds away to build your career!</p>
            <a href="login" class="btn btn-success">Login</a><br/>
            <a href="{{route('google','google')}}" class="btn btn-warning"><i class="fab red-ico fa-google-plus-g"></i> Login</a><br/>
            <a href="{{route('google','facebook')}}" class="btn btn-danger"><i class="fab yellow-ico fa-facebook-f"></i> Login</a><br/>
        </div>
        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Jobseeker</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Recruiter</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h2 class="register-heading">Apply as a Jobseeker</h2>
                    <div class="row register-form">
                        <div class="col-md-12">

                            <div class="form-group">
                                <input id="name" type="text" placeholder="Enter your Name * " class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="email" type="email" placeholder="Email *" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" placeholder="Password *" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <input id="password-confirm" type="password" placeholder="Confirm Password *" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <input id="RegistrationType" value="1" class="form-control" name="userType" required type="hidden">

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h2  class="register-heading">Apply as a Hirer</h2>
                    <div class="row register-form">

                        <div class="col-md-12">

                            <div class="form-group">
                                <input id="name" type="text" placeholder="Repersentative Name * " class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="email" type="email" placeholder="Offical Email *" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" placeholder="Password *" class="form-control" name="password" required autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <input id="password-confirm" type="password" placeholder="Confirm Password *" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <input id="RegistrationType" value="0" class="form-control" name="userType" required type="hidden">

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>

                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
