@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="{{asset('img/normal-breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Forgot Password</h2>
                    <p>Did you forget your password? Reset them here.</p>
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
                    <h3>Remind the password</h3>
                    <form method="POST" action="{{ route('forgot-password.send-reset-link') }}">
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
                            <input name="email" id="email" type="email" placeholder="Email address">
                            <span><i class="fa fa-envelope"></i></span>
                        </div>
                        <button type="submit" class="site-btn">Send</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login__register">
                    <h3>Steps</h3>
                    <p>1. Enter your email address.</p>
                    <p>2. Password reset link will be sent to the email address.</p>
                    <p>3. Use the reset link you set a new password.</p>
                    <p>In case you don't remember your email address, resetting your password will be impossible.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
