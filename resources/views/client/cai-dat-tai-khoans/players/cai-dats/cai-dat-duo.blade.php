@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Cài đặt Duo')

@section('content')
<div class="col-lg-9 col-12">

    <div class="aside">

        <h3>Cài đặt Duo</h3>

        <div class="settingduo">

            <label class="mb-3"><span>Bạn muốn nhận yêu cầu thuê Duo</span>

                <input id="chck5" type="checkbox" class="opacity-0">

                <label for="chck5" style="width: 56px;" class="check-trail">

                    <span class="check-handler"></span>

                </label>

            </label>

            <form class="form--settingduo row">

                <div class="col-md-6"><button type="button" class="btn-update ">Cập nhật</button></div>

            </form>

        </div>

    </div>

</div>
@endsection