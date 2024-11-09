@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Tài khoản và mật khẩu')

@section('content')
<div class="col-lg-9 col-12">

    <div class="aside">

        <h3>Cài đặt bảo mật tài khoản</h3>

        <div class="account-setting-form row">

            <div class="col-md-6">

                <div class="media justify-content-between align-content-center">

                    <div class="media-body media-middle">Xác nhận email khi đăng nhập máy mới</div>

                    <div class="media-right media-middle">

                        <input id="chck" type="checkbox" class="opacity-0">

                        <label for="chck" class="check-trail">

                            <span class="check-handler"></span>

                        </label>





                    </div>

                </div><br>
            </div>

        </div>

        <hr>

        <h3>Cài đặt mật khẩu</h3>

        <form class="changepass-form row">

            <div class="col-md-6">

                <div class="fieldGroup changepass--fieldGroup">

                    <p class="control-label">Tên đăng nhập:</p><input type="text" name="username" placeholder=""
                        disabled="" maxlength="5000" autocomplete="false" value="hoang">
                </div>

                <div class="fieldGroup changepass--fieldGroup">

                    <p class="control-label">Mật khẩu cũ:</p><input type="password" name="currentPassword"
                        placeholder="" maxlength="5000" autocomplete="false" value="">
                </div>

                <div class="fieldGroup changepass--fieldGroup">

                    <p class="control-label">Mật khẩu mới:</p><input type="password" name="newPassword" placeholder=""
                        maxlength="5000" autocomplete="false" value="">
                </div>

                <div class="fieldGroup changepass--fieldGroup">

                    <p class="control-label">Xác nhận lại mật khẩu:</p><input type="password" name="confirmNewPassword"
                        placeholder="" maxlength="5000" autocomplete="false" value="">
                </div>

                <hr><button type="submit" class="btn-update">Cập nhật</button>
            </div>

        </form>

    </div>

</div>
@endsection