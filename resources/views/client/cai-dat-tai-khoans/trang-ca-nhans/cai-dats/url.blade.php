@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Url')

@section('content')

<div class="col-lg-9 col-12">

<div class="aside">

    <form class="setting-url">

        <div class="col-xs-12">

            <h3>Url Trang Cá Nhân</h3>

        </div>

        <div class="col-xs-12"><label>Url rút gọn, không dấu (chỉ 1 lần): <a class="link" href="https://playerduo.com/hoact98" target="__blank">https://playerduo.com/hoact98</a></label></div>

        <div class="col-md-6">

            <div class="fieldGroup "><input type="text" name="url" placeholder="" disabled="" maxlength="5000" autocomplete="false" value="hoact98"></div>

        </div>

        <div class="col-md-12"></div>

    </form>

</div>

</div>
@endsection