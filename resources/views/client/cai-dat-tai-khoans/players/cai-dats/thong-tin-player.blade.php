@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Thông tin Player')

@section('content')
<div class="col-lg-9 col-12">

    <div class="aside">

        <h3>Thông tin Player</h3>

        <div class="d-flex img-avatar"><img
                src="https://files.playerduo.com/production/static-files/no_profile_small.jpg" class="" alt="avatar"
                sizes="sm">

            <div class="cropimg-avatar">

                <button type="button"><label for="change-avt" class="cursor-pointer"> <span>Thay Đổi<p>JPG, GIF or PNG,
                                &lt;5 MB. </p></span></label></button>

                <input type="file" id="change-avt" class="d-none" accept="image/*">

            </div>

        </div>

        <form class="playerinfo-form row">

            <div class="col-md-12">

                <div class="fieldGroup name-player">

                    <p class="control-label">Tên / Biệt Danh</p><input type="text" name="nickName" placeholder=""
                        maxlength="5000" autocomplete="false" value="quynhct">
                </div>

                <div class="mt-3">

                    <div id="noanim-tab-example">

                        <ul class="nav nav-tabs" id="nav-tab" role="tablist">

                            <li role="presentation" class="active nav-item"><a class="nav-link active" id="nav-home-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-home" role="tab" aria-controls="nav-home"
                                    aria-selected="true" href="#">Tiếng Việt</a></li>

                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">

                                <div class="fieldGroup "><input type="text" name="language" placeholder=""
                                        maxlength="5000" autocomplete="false" hidden=""
                                        value="5b99f97c978dff3d115260c7"></div><label for="gameCategory">Tên
                                    game</label>

                                <div class="fieldGroup name-player"><input type="text" name="gameCategory"
                                        placeholder="" maxlength="255" autocomplete="false" value=""></div><label
                                    for="title">Danh hiệu hoặc thứ hạng:</label>

                                <div class="fieldGroup name-player"><input type="text" name="title" placeholder=""
                                        maxlength="5000" autocomplete="false" value=""></div><label for="title">Chi phí
                                    mỗi giờ thuê</label>

                                <div class="fieldGroup name-player"><input type="text" name="price" placeholder=""
                                        maxlength="5000" autocomplete="false" value=""></div><label for="title">Ghi âm
                                    giọng nói<span class="des-label">Ghi lại đoạn âm thanh 3-15 giây giới thiệu bản thân
                                        để có thể thu hút người thuê</span></label>

                                <div class="voice-record">

                                    <div class="btn-record">

                                        <a class="btn">

                                            <div class="blob false"></div>Bắt đầu ghi âm
                                        </a><audio src="/voice/audioclip-1625738063000-7848.mp3" controls=""></audio>
                                    </div>

                                </div><label for="detail">Giới thiệu chi tiết về bạn:</label>

                                <div class="textarea-field"><textarea name="detail" maxlength="3000"></textarea><span
                                        class="err-message">Thông tin này cần phải nhập</span></div>

                                <div>

                                    <div><label for="achievements">Thành tích <button type="button"><i
                                                    class="fas fa-plus-circle"></i></button></label></div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="d-flex"><button type="button" class="btn-update" id="player-info-btn">Cập nhật</button>
                </div>

            </div>

        </form>

    </div>

</div>
@endsection
