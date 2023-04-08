@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Sign Up</h2>
                    <p>Don't have an account?</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Normal Breadcrumb End -->

<!-- Signup Section Begin -->
<section class="signup spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login__form">
                    <h3>Sign Up</h3>
                    <form action="#">
                        <div class="input__item">
                            <input type="text" placeholder="Email address">
                            <span><i class="fa fa-envelope"></i></span>
                        </div>
                        <div class="input__item">
                            <input type="text" placeholder="Your Name">
                            <span><i class="fa fa-user"></i></span>
                        </div>
                        <div class="input__item">
                            <input type="text" placeholder="Password">
                            <span><i class="fa fa-unlock"></i></span>
                        </div>
                        <button type="submit" class="site-btn">Register Now</button>
                    </form>
                    <h5>Already have an account? <a href="#">Log In!</a></h5>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login__social__links">
                    <h3>Sign With:</h3>
                    <ul>
                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With Facebook</a>
                        </li>
                        <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Signup Section End -->
@endsection
