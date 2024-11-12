@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Link pay')

@section('content')
<div class="col-lg-9 col-12">

    <div class="aside">

        <div class=" tabs">

            <ul id="pills-tab1" role="tablist" class="nav nav-tabs">

                <li role="presentation"><a class="active" id="pills-home-tab1" data-bs-toggle="pill"
                        data-bs-target="#pills-home1" role="tab" aria-controls="pills-home1" aria-selected="true"
                        href="#">Thông tin</a></li>

                <li role="presentation" class=""><a id="pills-home-tab2" data-bs-toggle="pill"
                        data-bs-target="#pills-home2" role="tab" aria-controls="pills-home2" aria-selected="true"
                        href="#">Albums</a></li>

            </ul>

            <div class="tab-content">

                <div id="pills-home1" role="tabpanel" aria-labelledby="pills-home-tab1"
                    class="fade show tab-pane active in">

                    <div class="d-flex img-avatar"><img
                            src="https://files.playerduo.com/production/static-files/no_profile_small.jpg" class=""
                            alt="avatar" sizes="sm">

                        <div class="cropimg-avatar"><button type="button"><label for="change-avt"
                                    class="cursor-pointer"> <span>Thay Đổi<p>JPG, GIF or PNG, &lt;5 MB. </p>
                                        </span></label></button>

                            <input type="file" id="change-avt" class="d-none" accept="image/*">
                        </div>

                    </div>

                    <form class="payinfo-form row">

                        <div class="col-md-6">

                            <div class="fieldGroup ">

                                <p class="control-label">Tên hiển thị:</p><input type="text" name="name" placeholder=""
                                    maxlength="5000" autocomplete="false" value="">
                            </div>

                            <div class="fieldGroup ">

                                <p class="control-label">Nhập url rút gọn, không dấu (chỉ được tạo 1 lần)</p><input
                                    type="text" name="url" placeholder="VD: abc123" maxlength="5000"
                                    autocomplete="false" value="">
                            </div>

                            <div class="fieldGroup ">

                                <p class="control-label">Tiêu đề</p><input type="text" name="title" placeholder=""
                                    maxlength="5000" autocomplete="false" value="">
                            </div>

                            <div class="fieldGroup ">

                                <p class="control-label">Số điện thoại:</p><input type="text" name="phoneNumber"
                                    placeholder="" maxlength="5000" autocomplete="false" value="">
                            </div>

                            <div class="fieldGroup ">

                                <p class="control-label">Link Facebook</p><input type="text" name="facebookUrl"
                                    placeholder="" maxlength="5000" autocomplete="false" value="">
                            </div>

                            <div class="fieldGroup ">

                                <p class="control-label">Từ khóa (tai nghe, loa, ...)</p><input type="text"
                                    name="tagsString" placeholder="" maxlength="5000" autocomplete="false" value="">
                            </div>

                            <p class="control-label">Chi tiết</p><textarea name="description"
                                maxlength="1000"></textarea>

                            <div>

                                <hr><button type="button" class="btn-update">Tạo Pay</button>
                            </div>

                        </div>

                    </form>

                </div>

                <div id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab2" class="fade tab-pane">

                    <h3>Bạn Cần Tạo Ví Điện Tử Trước</h3>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection