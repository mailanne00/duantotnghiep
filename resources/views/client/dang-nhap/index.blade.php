@extends('client.layouts.app')

@section('content')
    <section class="flat-title-page inner">
        <div class="overlay"></div>
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading mg-bt-12">
                        <h1 class="heading text-center">Login</h1>
                    </div>
                    <div class="breadcrumbs style2">
                        <ul>
                            <li><a href="index-2.html">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li>Login</li>
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
                        Login To NFTs
                    </h2>

                    <div class="flat-form box-login-social">
                        <div class="box-title-login">
                            <h5>Login with social</h5>
                        </div>
                        <ul>
                            <li>
                                <form action="/dang-nhap-facebook" method="post">
                                    @csrf
                                    <button class="sc-button style-2 fl-button pri-3">
                                        <i class="fas fa-user"></i>
                                        <span>Đăng nhập với facebook</span>
                                    </button>
                                </form>
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

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="form-inner">
                            <form action="{{ route('dangnhap.store') }}" method="POST" id="contactform">
                                @csrf
                                <input id="name" name="email" type="email" tabindex="1" value=""
                                    aria-required="true" required type="text" placeholder="Email">
                                <input id="email" name="pass" type="password" tabindex="2" value=""
                                    aria-required="true" type="email" placeholder="Mật khẩu" required>
                                <div class="row-form style-1">
                                    <label>Remember me
                                        <input type="checkbox">
                                        <span class="btn-checkbox"></span>
                                    </label>
                                    <a href="#" class="forgot-pass">Forgot Password ?</a>
                                </div>

                                <button type="submit" class="submit mb-5">Login</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
