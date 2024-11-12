@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Hashtags')

@section('content')
<div class="col-lg-9 col-12">

<div class="aside">

    <h3>Dành cho nhà sáng tạo nội dung</h3>

    <div class="row">

        <div class="col-md-6">

            <div class="user-hash-tag">

                <div class="hash-tag">

                    <div class="fieldGroup ">

                        <p class="control-label">Thêm hashtag cho những bài viết của bạn</p><input type="text" name="hashtag" placeholder="" maxlength="5000" autocomplete="false" value=""></div>

                </div>

                <div class="btn__fill">

                    <hr><button type="button" class=" btn-update">Cập nhật</button></div>

            </div>

        </div>

    </div>

</div>

</div>
@endsection