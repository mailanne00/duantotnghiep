@extends('client.layouts.app')

@section('content')
    <section class="flat-title-page inner">
        <div class="overlay"></div>
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading mg-bt-12">
                        <h1 class="heading text-center">Signup</h1>
                    </div>
                    <div class="breadcrumbs style2">
                        <ul>
                            <li><a href="index-2.html">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li>Signup</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tf-login tf-section">
        <div class="themesflat-container">
            <div class="row">
                <div class="col-12">
                    <h2 class="tf-title-heading ct style-1">
                        Sigup To NFTs
                    </h2>

                    <div class="flat-form box-login-social">
                        <div class="box-title-login">
                            <h5>Login with social</h5>
                        </div>
                        <ul>
                            <li>
                                <a href="{{ route('client.login') }}" class="sc-button style-2 fl-button pri-3">
                                    <i class="fas fa-user"></i>
                                    <span>Login</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('client.dangky') }}" class="sc-button style-2 fl-button pri-3">
                                    <i class="fas fa-user-plus"></i>
                                    <span>Register</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="flat-form box-login-email">
                        <div class="box-title-login">
                            <h5>Or login with email</h5>
                        </div>

                        <div class="form-inner">
                            <form action="{{ route('dangky.store') }}" method="POST" id="contactform">
                                @csrf
                                <input id="ten" name="ten" tabindex="1" value="" aria-required="true"
                                    required type="text" placeholder="Your Full Name">
                                <input id="email" name="email" tabindex="2" value="" aria-required="true"
                                    type="email" placeholder="Your Email Address" required>
                                <input id="pass" name="password" tabindex="3" value="" aria-required="true"
                                    type="password" placeholder="Set Your Password" required>
                                <div class="row-form style-1">
                                    <label>Remember me
                                        <input type="checkbox">
                                        <span class="btn-checkbox"></span>
                                    </label>
                                    <a href="#" class="forgot-pass">Forgot Password ?</a>
                                </div>
                                <button class="submit" type="submit">Đăng ký</button>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
