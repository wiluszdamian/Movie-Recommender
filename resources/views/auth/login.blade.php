@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Sign In</h2>
                    <p>Welcome to the Movie Recommender site.</p>
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
                <div class="login__form">
                    <h3>Login</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
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
                            <input name="email" id="email" type="text" placeholder="Email address">
                            <span><i class="fa fa-envelope"></i></span>
                        </div>
                        <div class="input__item">
                            <input name="password" id="password" type="password" placeholder="Password">
                            <span><i class="fa fa-unlock"></i></span>
                        </div>
                        <button type="submit" class="site-btn">Login Now</button>
                    </form>
                    <a href="{{ route('forgot-password.index') }}" class="forget_pass">Forgot Your Password?</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login__register">
                    <h3>Dont’t Have An Account?</h3>
                    <a href="{{ url('register') }}" class="primary-btn">Register Now</a>
                </div>
            </div>
        </div>
        <div class="login__social">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="login__social__links">
                        <span>or</span>
                        <ul>
                            <li><a href="{{ route('demo') }}" class="facebook"><i class="fa fa-facebook"></i> Sign in With
                                    Facebook</a></li>
                            <li><a href="{{ route('demo') }}" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                            <li><a href="{{ route('demo') }}" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Login Section End -->
@endsection
