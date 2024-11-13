@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Cài đặt player url')

@section('content')
    <div class="col-lg-9 col-12">

        <div class="aside">

            <form class="setting-url">

                <div class="col-xs-12">

                    <h3>Player Link</h3>

                </div>

                <div class="col-xs-12"><label>Url rút gọn, không dấu (chỉ 1 lần): <a class="link"
                            href="https://playerduo.com/6237de5f3ee3544671aaa02a"
                            target="__blank">https://playerduo.com/6237de5f3ee3544671aaa02a</a></label></div>

                <div class="col-md-6">

                    <div class="fieldGroup "><input type="text" name="url" placeholder="" maxlength="5000"
                            autocomplete="false" value="6237de5f3ee3544671aaa02a"></div>

                </div>

                <div class="col-md-12">

                    <hr><button type="button" class="btn-update" id="setting-url-btn">Cập nhật</button>
                </div>

            </form>

        </div>

    </div>
@endsection
