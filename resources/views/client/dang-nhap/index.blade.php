@extends('client.layouts.app')

@section('title', 'Đăng nhập')

@section('content')
<section class="flat-title-page inner">
    <div class="overlay"></div>
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading mg-bt-12">
                    <h1 class="heading text-center">Đăng nhập</h1>
                </div>
                <div class="breadcrumbs style2">
                    <ul>
                        <li><a href="{{route('client.index')}}">Trang chủ</a></li>
                        <li>Đăng nhập</li>
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
                                <span>Đăng ký</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="flat-form box-login-email">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="form-inner">
                        <form action="{{ route('dangnhap.store') }}" method="POST" id="contactform">
                            @csrf
                            <input id="email" name="email" type="email" tabindex="1" value="{{ old('email') }}" aria-required="true"
                                type="text" placeholder="Email" required>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input id="pass" name="pass" type="password" tabindex="2" value="{{ old('pass') }}" aria-required="true"
                                type="email" placeholder="Mật khẩu" required>
                            @error('pass')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="row-form style-1">
                                <label>Nhớ mật khẩu
                                    <input type="checkbox">
                                    <span class="btn-checkbox"></span>
                                </label>
                                <a href="#" class="forgot-pass">Quên mật khẩu ?</a>
                            </div>

                            <button type="submit" class="submit mb-5">Đăng nhập</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection