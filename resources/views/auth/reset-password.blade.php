@extends('layouts.app')

@section('title', 'New Password')

@section('content')
    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="{{asset('img/normal-breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>New Password</h2>
                        <p>Here you can define a new password for your account.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->
    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form forgot__password">
                        <h3>Set a new password</h3>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="input__item">
                                <input name="email" id="email" type="email" placeholder="Email Address" value="{{ $email }}">
                                <span><i class="fa fa-envelope"></i></span>
                            </div>
                            <div class="input__item">
                                <input name="password" id="password" type="password" placeholder="Password">
                                <span><i class="fa fa-unlock"></i></span>
                            </div>
                            <div class="input__item">
                                <input name="password_confirmation" id="password_confirmation" type="password" placeholder="Password Confirm">
                                <span><i class="fa fa-unlock"></i></span>
                            </div>
                            <button type="submit" class="site-btn">Send</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Info</h3>
                        <p>This password reset link is only active for 60 minutes, after this period to reset you will need to generate the reset link again from the "Forgot Password" form. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
