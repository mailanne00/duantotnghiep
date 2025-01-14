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
                            <li><a href="{{route('client.index')}}">Trang chủ</a></li>
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
                                <input id="ten" name="ten" tabindex="1" value="{{ old('ten') }}" aria-required="true"
                                     type="text" placeholder="Họ và tên" required>
                                    @error('ten')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                                <input id="email" name="email" tabindex="2" value="{{ old('email') }}" aria-required="true"
                                    type="email" placeholder="Email" required>
                                    @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                                <input id="pass" name="password" tabindex="3" aria-required="true"
                                    type="password" placeholder="Mật khẩu" required>
                                    @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                                <div class="row-form style-1">
                                    <label>Nhớ mật khẩu
                                        <input type="checkbox">
                                        <span class="btn-checkbox"></span>
                                    </label>
                                    <a href="#" class="forgot-pass">Quên mật khẩu ?</a>
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
