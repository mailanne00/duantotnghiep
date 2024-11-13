@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Bậc')

@section('content')

    <div class="col-lg-9 col-12">

        <div class="aside">

            <div class="user-membership-level row">

                <div class="col-xs-6">

                    <h3>Bậc</h3>

                </div>

                <div class="col-xs-6 btn-level"><button type="button" class="btn btn-default"><i class="fas fa-plus"></i>Tạo
                        Bậc</button></div>

                <div class="col-xs-12">

                    <p class="note-setting-display">Sau khi tạo bậc vui lòng mở cho đăng ký thành viên. Mở đăng ký thành
                        viên <a href="/user_setting/user_display">tại đây</a></p>

                </div>

            </div>

        </div>

    </div>
@endsection
