@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Cài đặt Donate')

@section('content')
<div class="col-lg-9 col-12">

    <div class="aside">

        <h3>Cài đặt Donate</h3>

        <div class="donate-form">

            <form>

                <div class="row">

                    <div class="fieldGroup col-md-7">

                        <p class="control-label">Link donate của bạn</p><input type="text" name="urlplayer"
                            placeholder="" disabled="" maxlength="5000" autocomplete="false"
                            value="https://playerduo.com/6237de5f3ee3544671aaa02a">
                    </div>

                    <div class="col-md-5">

                        <div class="col-4"><a href="/6237de5f3ee3544671aaa02a"><button type="button" class="btn-open"
                                    id="btn-link">Mở</button></a></div>

                        <div class="row"></div>

                    </div>

                </div>

                <div class="row">

                    <div class="fieldGroup col-md-7">

                        <p class="control-label">Link hiển thị donate ( Add Webpage URL trong phần mềm Stream )</p>
                        <input type="text" name="securityCodeLink" placeholder="" disabled="" maxlength="5000"
                            autocomplete="false"
                            value="https://playerduo.com/donation-screen/6237de5f3ee3544671aaa02a/4027789065">
                    </div>

                    <div class="col-md-5">

                        <div class="row">

                            <div class="col-4 "><button type="button" class="btn-link-topdonate" id="btn-link">Đổi
                                    link</button></div>

                            <div class="col-4"><button type="button" class="btn-link-topdonate" id="btn-link">Donate
                                    ảo</button></div>

                            <div class="col-4"><button type="button" class="btn-link-topdonate"
                                    id="btn-link">Mở</button></div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="fieldGroup col-md-7">

                        <p class="control-label">Link hiển thị bảng xếp hạng donate</p><input type="text"
                            name="chartLink" placeholder="" disabled="" maxlength="5000" autocomplete="false"
                            value="https://playerduo.com/donation/day/1/6237de5f3ee3544671aaa02a">
                    </div>

                    <div class="col-md-5">

                        <div class="row">

                            <div class="col-4"><select name="type" class="btn-select" id="btn-link">
                                    <option value="day">24h trước</option>
                                    <option value="week">7 ngày trước</option>
                                    <option value="month">30 ngày trước</option>
                                </select></div>

                            <div class="col-4"><select name="chartSelect" class="btn-select" id="btn-link">
                                    <option value="1">Mẫu 1</option>
                                    <option value="2">Mẫu 2</option>
                                    <option value="3">Mẫu 3</option>
                                </select></div>

                            <div class="col-4"><button type="button" class="btn-link" id="btn-link">Mở</button></div>

                        </div>

                    </div>

                </div>

            </form>

            <p class="message__donate--warning"><i class="fa fa-exclamation-triangle"></i> <span>Nếu có cập nhật cài
                    đặt, ảnh, âm thanh. Vui lòng mở lại "Link hiển thị" để thấy thay đổi khi Stream !</span></p>

            <div class="audio"><img src="https://files.playerduo.com/production/images/donate_gif/0.gif" class=""
                    alt="load"><br><audio controls=""
                    src="https://files.playerduo.com/production/images/donate_sound/15.mp3"></audio><br>

                <hr><button type="button" class="btn-update " id="audio-btn">Cập nhật</button><button type="button"
                    class="btn-update" id="audio-btn">Test</button>
            </div>

            <div class=" tabs">

                <ul role="tablist" id="pills-tab3" class="nav nav-tabs">

                    <li role="presentation" class=""><a class="active" id="pills-home-tab3" data-bs-toggle="pill"
                            data-bs-target="#pills-home3" role="tab" aria-controls="pills-home3" aria-selected="true"
                            href="#"><i class="far fa-images"></i>ẢNH</a></li>

                    <li role="presentation" class=""><a id="pills-home-tab4" data-bs-toggle="pill"
                            data-bs-target="#pills-home4" role="tab" aria-controls="pills-home4" aria-selected="true"
                            href="#"><i class="fa fa-music"></i>ÂM THANH</a></li>

                    <li role="presentation" class="active"><a id="pills-home-tab5" data-bs-toggle="pill"
                            data-bs-target="#pills-home5" role="tab" aria-controls="pills-home5" aria-selected="true"
                            href="#"><i class="fa fa-cogs"></i>CÀI ĐẶT KHÁC</a></li>

                </ul>

                <div class="tab-content">

                    <div id="pills-home3" role="tabpanel" aria-labelledby="pills-home-tab3" class="fade tab-pane">

                        <div class="img-form">

                            <div class="row">

                                <div class="col-sm-3"><input type="file" name="fileNameGif" accept="image/*">

                                    <div class="upload-img d-flex">

                                        <p class="upload-image">UPLOAD &nbsp;ẢNH</p>

                                    </div>

                                </div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/0.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/0.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/1.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/1.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/2.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/2.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/3.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/3.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/4.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/4.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/5.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/5.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/6.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/6.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/7.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/7.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/8.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/8.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/9.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/9.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/10.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/10.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/11.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/11.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/12.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/12.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/13.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/13.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/14.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/14.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/15.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/15.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/16.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/16.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/17.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/17.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/18.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/18.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/19.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/19.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/20.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/20.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/21.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/21.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/22.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/22.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/23.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/23.gif"></div>

                                <div class="col-sm-3"><img
                                        src="https://files.playerduo.com/production/images/donate_gif/24.gif" class=""
                                        alt="https://files.playerduo.com/production/images/donate_gif/24.gif"></div>

                            </div>

                        </div>

                    </div>

                    <div id="pills-home4" role="tabpanel" aria-labelledby="pills-home-tab4" class="fade tab-pane">

                        <div class="sound-form">

                            <div class="row">

                                <div class="col-sm-3"><input type="file" name="fileSound"
                                        accept="audio/mpeg3, audio/mp3">

                                    <div class="upload-img d-flex">

                                        <p class="upload-image">UPLOAD &nbsp;ÂM THANH</p>

                                    </div>

                                </div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 0</div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 1</div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 2</div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 3</div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 4</div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 5</div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 6</div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 7</div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 8</div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 9</div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 10</div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 11</div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 12</div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 13</div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 14</div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 15</div>

                                <div class="col-sm-3"><i class="fas fa-play-circle"></i>SOUND 16</div>

                            </div>

                        </div>

                    </div>

                    <div id="pills-home5" role="tabpanel" aria-labelledby="pills-home-tab5"
                        class="fade show tab-pane active in">

                        <form class="donatesetting-form">

                            <div class="container-fluid">

                                <div class="row"><label class="col-md-6">Lọc từ khóa tránh spam donate</label><textarea
                                        name="predictSpamWords" class="col-md-6 col-sm-12 col-xs-12 key-lock-donate"
                                        placeholder="Thêm nhiều từ khoá bằng cách xuống dòng" rows="5"></textarea></div>

                                <div class="row"><label class="col-md-6">Bảng xếp hạng trên trang Player
                                        (Tổng)</label><select name="isShowInTopAllPlayer"
                                        class="col-md-6 col-sm-12 col-xs-12 donate-setting-select">
                                        <option value="true">Hiển thị</option>
                                        <option value="false">Ẩn</option>
                                    </select></div>

                                <div class="row"><label class="col-md-6">Bảng xếp hạng trên trang Player
                                        (Tháng)</label><select name="isShowInTopMonthPlayer"
                                        class="col-md-6 col-sm-12 col-xs-12 donate-setting-select" id="">
                                        <option value="true">Hiển thị</option>
                                        <option value="false">Ẩn</option>
                                    </select></div>

                                <div class="row"><label class="col-md-6">Giọng chị Google</label><select
                                        name="googleSound" class="col-md-6 col-sm-12 col-xs-12 donate-setting-select">
                                        <option value="false">Tắt</option>
                                        <option value="true">Bật</option>
                                    </select></div>

                                <div class="row">

                                    <div class="col-md-6"><label>Văn bản hiển thị</label></div>

                                    <div class="col-md-6 playerduo-text">

                                        <div class="">

                                            <div class="col-xs-4 "><label>Player Duo</label></div>

                                            <div class="col-xs-4 ">

                                                <div class="fieldGroup "><input type="text" name="text" placeholder=""
                                                        maxlength="5000" autocomplete="false" value=""></div>

                                            </div>

                                            <div class="col-xs-4"><label class="money"> 10.000đ</label></div>

                                        </div>

                                    </div>

                                </div>

                                <div class="row"><label class="col-md-6">Màu văn bản</label><input name="textColor"
                                        class="col-md-6 col-sm-12 col-xs-12" type="color" value="red"></div>

                                <div class="row"><label class="col-md-6">Hiệu ứng chữ</label><select name="textEffect"
                                        class="col-md-6 col-sm-12 col-xs-12 donate-setting-select">
                                        <option value="bounce">bounce</option>
                                        <option value="flash">flash</option>
                                        <option value="pulse">pulse</option>
                                        <option value="rubberBand">rubberBand</option>
                                        <option value="shake">shake</option>
                                        <option value="swing">swing</option>
                                        <option value="tada">tada</option>
                                        <option value="wobble">wobble</option>
                                    </select></div>

                                <div class="row"><label class="col-md-6">Hiệu ứng xuất hiện</label><select
                                        name="inStyle" class="col-md-6 col-sm-12 col-xs-12 donate-setting-select">
                                        <optgroup label="Bouncing Entrances"></optgroup>
                                        <option value="bounceIn">bounceIn</option>
                                        <option value="bounceInDown">bounceInDown</option>
                                        <option value="bounceInLeft">bounceInLeft</option>
                                        <optgroup label="Fading Entrances"></optgroup>
                                        <option value="fadeIn">fadeIn</option>
                                        <option value="fadeInDown">fadeInDown</option>
                                        <option value="fadeInDownBig">fadeInDownBig</option>
                                        <option value="fadeInLeft">fadeInLeft</option>
                                        <option value="fadeInLeftBig">fadeInLeftBig</option>
                                        <option value="fadeInUp">fadeInUp</option>
                                        <optgroup label="Flippers"></optgroup>
                                        <option value="flipInX">flipInX</option>
                                        <option value="flipInY">flipInY</option>
                                        <optgroup label="Rotating Entrances"></optgroup>
                                        <option value="rotateIn">rotateIn</option>
                                        <option value="rotateInDownLeft">rotateInDownLeft</option>
                                        <option value="rotateInDownRight">rotateInDownRight</option>
                                        <option value="rotateInUpLeft">rotateInUpLeft</option>
                                        <optgroup label="Sliding Entrances"></optgroup>
                                        <option value="slideInUp">slideInUp</option>
                                        <option value="slideInDown">slideInDown</option>
                                        <option value="slideInLeft">slideInLeft</option>
                                        <optgroup label="Zoom Entrances"></optgroup>
                                        <option value="zoomIn">zoomIn</option>
                                        <option value="zoomInDown">zoomInDown</option>
                                        <option value="zoomInLeft">zoomInLeft</option>
                                        <option value="zoomInRight">zoomInRight</option>
                                        <option value="zoomInUp">zoomInUp</option>
                                        <optgroup label="Specials"></optgroup>
                                        <option value="rollIn">rollIn</option>
                                    </select></div>

                                <div class="row"><label class="col-md-6">Hiệu ứng biến mất</label><select
                                        name="outStyle" class="col-md-6 col-sm-12 col-xs-12 donate-setting-select">
                                        <optgroup label="bouncing"></optgroup>
                                        <option value="bounceOut">bounceOut</option>
                                        <option value="bounceOutLeft">bounceOutLeft</option>
                                        <option value="bounceOutUp">bounceOutUp</option>
                                        <optgroup label="fading"></optgroup>
                                        <option value="fadeOut">fadeOut</option>
                                        <option value="fadeOutDown">fadeOutDown</option>
                                        <option value="fadeOutLeft">fadeOutLeft</option>
                                        <option value="fadeOutLeftBig">fadeOutLeftBig</option>
                                        <option value="fadeOutUp">fadeOutUp</option>
                                        <option value="fadeOutUpBig">fadeOutUpBig</option>
                                        <optgroup label="flippers"></optgroup>
                                        <option value="flipOutX">flipOutX</option>
                                        <option value="flipOutY">flipOutY</option>
                                        <optgroup label="rotating"></optgroup>
                                        <option value="rotateOut">rotateOut</option>
                                        <option value="rotateOutDownLeft">rotateOutDownLeft</option>
                                        <option value="rotateOutDownRight">rotateOutDownRight</option>
                                        <option value="rotateOutUpLeft">rotateOutUpLeft</option>
                                        <option value="rotateOutUpRight">rotateOutUpRight</option>
                                        <optgroup label="sliding"></optgroup>
                                        <option value="slideOutUp">slideOutUp</option>
                                        <option value="slideOutDown">slideOutDown</option>
                                        <option value="slideOutLeft">slideOutLeft</option>
                                        <optgroup label="zoom"></optgroup>
                                        <option value="zoomOut">zoomOut</option>
                                        <option value="zoomOutDown">zoomOutDown</option>
                                        <option value="zoomOutLeft">zoomOutLeft</option>
                                        <option value="zoomOutUp">zoomOutUp</option>
                                    </select></div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection