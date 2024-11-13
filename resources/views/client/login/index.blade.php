@extends('client.layouts.app')

@section('content')
    <div class="row login-page">

        <div class="col-md-7 hidden-sm hidden-xs image-login"><img src="https://playerduo.com/favicons/banner_login.jpg"
                class="" alt="PD"></div>

        <div class="col-md-5  col-xs-12 form-content">

            <div class="content-main d-none">

                <form>

                    <div class="fieldGroup "><input type="text" name="username" placeholder="Tên đăng nhập" maxlength="5000"
                            autocomplete="false" value=""></div>

                    <div class="fieldGroup "><input type="password" name="password" placeholder="Mật khẩu" maxlength="5000"
                            autocomplete="false" value=""></div>

                    <div class="fieldGroup "><input type="password" name="confirmPassword" placeholder="Nhập lại mật khẩu"
                            maxlength="5000" autocomplete="false" value="">
                    </div>

                    <div class="register-verify-email">

                        <div class="fieldGroup "><input type="email" name="email" placeholder="Xác thực Email"
                                maxlength="5000" autocomplete="false" value=""></div><button disabled=""><span>Lấy
                                mã</span></button>
                    </div>

                    <div class="recaptcha">

                        <div id="g-recaptcha" data-onloadcallbackname="onloadCallback"
                            data-verifycallbackname="verifyCallback">

                            <div style="width: 304px; height: 78px;">

                                <div><iframe title="reCAPTCHA"
                                        src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfJeF8UAAAAAN5D0Ylx8PQAeYjmEHR4G2hY9pdb&amp;co=aHR0cHM6Ly9wbGF5ZXJkdW8uY29tOjQ0Mw..&amp;hl=vi&amp;type=image&amp;v=2uoiJ4hP3NUoP9v_eBNfU6CR&amp;theme=light&amp;size=normal&amp;badge=bottomright&amp;cb=646tg862w0rx"
                                        width="304" height="78" role="presentation" name="a-ih4yj5pdaer9"
                                        frameborder="0" scrolling="no"
                                        sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe>
                                </div>

                                <textarea id="g-recaptcha-response-1" name="g-recaptcha-response" class="g-recaptcha-response"
                                    style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>

                            </div><iframe style="display: none;"></iframe>
                        </div>

                    </div><button type="submit"><span>Tạo tài khoản</span></button>
                </form><button style="background-color: gray;" class="js-login"><span>Đăng nhập</span></button>

                <p class="forgot_password"><a href="/login"><span>Quên mật khẩu?</span></a></p>

            </div>

            <div class="content-main">

                <form>

                    <div class="fieldGroup "><input type="text" name="username" placeholder="Tên đăng nhập hoặc email"
                            maxlength="5000" autocomplete="false" value=""></div>

                    <div class="fieldGroup "><input type="password" name="password" placeholder="Mật khẩu" maxlength="5000"
                            autocomplete="false" value=""></div><button type="submit"><span>Đăng nhập</span></button>
                </form>

                <div class="content-middle"><i class="fab fa-facebook-square"></i>

                    <p class="forgot-password"><a href="/login"><span>Quên mật khẩu?</span></a></p>

                </div><button style="background-color: gray;" class="js-res"><span>Tạo tài khoản</span></button>
            </div>

        </div>



    </div>
@endsection
