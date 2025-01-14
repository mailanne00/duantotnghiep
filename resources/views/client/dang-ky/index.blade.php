@extends('client.layouts.app')

@section('title', 'Đăng ký')

@section('content')
    <section class="flat-title-page inner">
        <div class="overlay"></div>
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading mg-bt-12">
                        <h1 class="heading text-center">Đăng ký</h1>
                    </div>
                    <div class="breadcrumbs style2">
                        <ul>
                            <li><a href="index-2.html">Trang chủ</a></li>
                            <li>Đăng ký</li>
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
                    <div class="flat-form box-login-social">
                        <ul>
                            <li>
                                <a href="{{ route('client.login') }}" class="sc-button style-2 fl-button pri-3">
                                    <i class="fas fa-user"></i>
                                    <span>Đăng nhập</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('client.dangky') }}" class="sc-button style-2 fl-button pri-3">
                                    <i class="fas fa-user-plus"></i>
                                    <span>Đăng ký</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="flat-form box-login-email">

                        <div class="form-inner">
                            <form action="{{ route('dangky.store') }}" method="POST" id="contactform">
                                @csrf
                                <input id="ten" name="ten" tabindex="1" value="" aria-required="true"
                                    required type="text" placeholder="Họ và tên">
                                <input id="email" name="email" tabindex="2" value="" aria-required="true"
                                    type="email" placeholder="Email" required>
                                <input id="pass" name="password" tabindex="3" value="" aria-required="true"
                                    type="password" placeholder="Mật khẩu" required>
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
