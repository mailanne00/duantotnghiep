@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Bảo mật')

@section('content')
<div class="col-lg-9 col-12">

    <div class="aside">

        <h3>Khoá bảo vệ</h3>

        <div class="securitylock row ">

            <div class="col-md-12"><label class="col-md-12">Phương thức bảo vệ</label><br>

                <div class="col-md-6"><select class="js-securitylock">

                        <option value="">Vui lòng chọn</option>

                        <option value="otp">Dùng mã OTP </option>

                        <option value="pass">Dùng mã khoá </option>

                    </select></div>

            </div>

            <form class="security-form col-md-12 d-none">

                <div class="col-md-6 js-pass">

                    <div class="fieldGroup ">

                        <p class="control-label">Mã khoá:</p><input type="password" name="pass" placeholder=""
                            maxlength="5000" autocomplete="false" value="">

                    </div>

                    <div class="fieldGroup ">

                        <p class="control-label">Nhập lại mã khoá:</p><input type="password" name="rePass"
                            placeholder="" maxlength="5000" autocomplete="false" value="">

                    </div>

                    <hr><button type="submit" class="btn-update">Cập nhật</button>

                </div>

                <div class="col-md-6 js-otp">

                    <div class="fieldGroup ">

                        <p class="control-label">Email:</p><input type="text" name="email" placeholder="" disabled=""
                            maxlength="5000" autocomplete="false" value="chuthihoa@gmail.com">
                    </div>

                    <hr><button type="button" class="btn-update">Lấy mã xác nhận</button>
                </div>

            </form>

        </div>

    </div>

</div>
@endsection

@section('footer')
<script>
    $('select.js-securitylock').on('change', function () {

        // alert(this.value);

        if (this.value == 'otp') {

            $('.security-form').removeClass('d-none');

            $('.security-form .js-pass').addClass('d-none');

            $('.security-form .js-otp').removeClass('d-none');

        } else if (this.value == 'pass') {

            $('.security-form').removeClass('d-none');

            $('.security-form .js-otp').addClass('d-none');

            $('.security-form .js-pass').removeClass('d-none');



        } else {

            $('.security-form').addClass('d-none');

        }

    });
</script>
@endsection
