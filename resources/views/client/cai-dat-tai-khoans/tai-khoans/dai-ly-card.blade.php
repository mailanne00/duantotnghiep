@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Đại lý card')

@section('content')
<div class="col-lg-9 col-12">

    <div class="aside">

        <div class=" tabs">

            <ul id="pills-tab1" role="tablist" class="nav nav-tabs">

                <li role="presentation"><a class="active" id="pills-home-tab1" data-bs-toggle="pill"
                        data-bs-target="#pills-home1" role="tab" aria-controls="pills-home1" aria-selected="true"
                        href="#">Đăng ký</a></li>

                <li role="presentation" class=""><a id="pills-home-tab2" data-bs-toggle="pill"
                        data-bs-target="#pills-home2" role="tab" aria-controls="pills-home2" aria-selected="true"
                        href="#">Hướng dẫn</a></li>

            </ul>

            <div class="tab-content" id="pills-tabContent1">

                <div id="pills-home1" role="tabpanel" aria-labelledby="pills-home-tab1"
                    class="fade show tab-pane active in">

                    <form class="agency-form row">

                        <div class="col-md-12">

                            <div class="fieldGroup agency-input ">

                                <p class="control-label">Tên đại lý:</p><input type="text" name="name" placeholder=""
                                    maxlength="5000" autocomplete="false" value="">
                            </div>

                            <p class="control-label">Email: &nbsp;<a href="/customer_setting/email">Thay đổi</a></p>

                            <div class="fieldGroup agency-input "><input type="text" name="email" placeholder=""
                                    disabled="" maxlength="5000" autocomplete="false" value="chuthihoa98bgg@gmail.com">
                            </div>

                            <div class="fieldGroup agency-input ">

                                <p class="control-label">Số điện thoại:</p><input type="text" name="phoneNumber"
                                    placeholder="" maxlength="10" autocomplete="false" value="">
                            </div>

                            <div class="fieldGroup agency-input ">

                                <p class="control-label">Facebook/Fanpage:</p><input type="text" name="facebookUrl"
                                    placeholder="" maxlength="5000" autocomplete="false" value="">
                            </div>

                            <div class="fieldGroup agency-input ">

                                <p class="control-label">Ghi chú</p><input type="text" name="note" placeholder=""
                                    maxlength="5000" autocomplete="false" value="">
                            </div>

                            <p class="control-label">Giao thẻ tận nơi:</p><select name="cardDelivery"
                                class="agency-input ">
                                <option value="none">Tôi chỉ giao dịch tại chỗ</option>
                                <option value="0">Tôi có thể giao thẻ tận nơi</option>
                                <option value="500000">500.000đ</option>
                                <option value="1000000">1.000.000đ</option>
                                <option value="3000000">3.000.000đ</option>
                                <option value="5000000">5.000.000đ</option>
                                <option value="10000000">10.000.000đ</option>
                            </select>

                            <p class="control-label">Ẩn hiển thị đại lý:</p><select name="isShowAgency"
                                class="agency-input ">
                                <option value="true">Hiển thị trong danh sách đại lý</option>
                                <option value="false">Ẩn khỏi danh sách đại lý</option>
                            </select>

                            <p class="control-label">Ẩn hiển thị đại lý:</p>

                            <div class="map">

                                <div style="height: 500px; width: 100%;">

                                    <div style="height: 100%; position: relative; overflow: hidden;">

                                        <div
                                            style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">

                                            <div class="gm-style"
                                                style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;">

                                                <div><button draggable="false" aria-label="Phím tắt" title="Phím tắt"
                                                        type="button"
                                                        style="background: none transparent; display: block; border: none; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; z-index: 1000002; outline-offset: 3px; right: 0px; bottom: 0px; transform: translateX(100%);"></button>
                                                </div>

                                                <div tabindex="0" aria-label="Map" aria-roledescription="map"
                                                    role="group"
                                                    style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;">

                                                    <div
                                                        style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);">

                                                        <div
                                                            style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">

                                                            <div
                                                                style="position: absolute; left: 0px; top: 0px; z-index: 0;">

                                                                <div
                                                                    style="position: absolute; z-index: 987; transform: matrix(1, 0, 0, 1, -53, -158);">

                                                                    <div
                                                                        style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;">

                                                                        <div style="width: 256px; height: 256px;"></div>

                                                                    </div>

                                                                    <div
                                                                        style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;">

                                                                        <div style="width: 256px; height: 256px;"></div>

                                                                    </div>

                                                                    <div
                                                                        style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px;">

                                                                        <div style="width: 256px; height: 256px;"></div>

                                                                    </div>

                                                                    <div
                                                                        style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;">

                                                                        <div style="width: 256px; height: 256px;"></div>

                                                                    </div>

                                                                    <div
                                                                        style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;">

                                                                        <div style="width: 256px; height: 256px;"></div>

                                                                    </div>

                                                                    <div
                                                                        style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;">

                                                                        <div style="width: 256px; height: 256px;"></div>

                                                                    </div>

                                                                    <div
                                                                        style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px;">

                                                                        <div style="width: 256px; height: 256px;"></div>

                                                                    </div>

                                                                    <div
                                                                        style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px;">

                                                                        <div style="width: 256px; height: 256px;"></div>

                                                                    </div>

                                                                    <div
                                                                        style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px;">

                                                                        <div style="width: 256px; height: 256px;"></div>

                                                                    </div>

                                                                    <div
                                                                        style="position: absolute; left: -512px; top: 256px; width: 256px; height: 256px;">

                                                                        <div style="width: 256px; height: 256px;"></div>

                                                                    </div>

                                                                    <div
                                                                        style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px;">

                                                                        <div style="width: 256px; height: 256px;"></div>

                                                                    </div>

                                                                    <div
                                                                        style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px;">

                                                                        <div style="width: 256px; height: 256px;"></div>

                                                                    </div>

                                                                    <div
                                                                        style="position: absolute; left: 512px; top: -256px; width: 256px; height: 256px;">

                                                                        <div style="width: 256px; height: 256px;"></div>

                                                                    </div>

                                                                    <div
                                                                        style="position: absolute; left: 512px; top: 0px; width: 256px; height: 256px;">

                                                                        <div style="width: 256px; height: 256px;"></div>

                                                                    </div>

                                                                    <div
                                                                        style="position: absolute; left: 512px; top: 256px; width: 256px; height: 256px;">

                                                                        <div style="width: 256px; height: 256px;"></div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div
                                                            style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;">
                                                        </div>

                                                        <div
                                                            style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;">
                                                        </div>

                                                        <div
                                                            style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;">
                                                        </div>

                                                        <div
                                                            style="position: absolute; left: 0px; top: 0px; z-index: 0;">

                                                            <div
                                                                style="position: absolute; z-index: 987; transform: matrix(1, 0, 0, 1, -53, -158);">

                                                                <div
                                                                    style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                    <img draggable="false" alt="" role="presentation"
                                                                        src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i13!2i6558!3i3725!4i256!2m3!1e0!2sm!3i595325412!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyDHKLH5Jrg4piQAOvxf0mpBkLf78188NlI&amp;token=15206"
                                                                        style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                </div>

                                                                <div
                                                                    style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                    <img draggable="false" alt="" role="presentation"
                                                                        src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i13!2i6557!3i3725!4i256!2m3!1e0!2sm!3i595325412!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyDHKLH5Jrg4piQAOvxf0mpBkLf78188NlI&amp;token=93464"
                                                                        style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                </div>

                                                                <div
                                                                    style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                    <img draggable="false" alt="" role="presentation"
                                                                        src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i13!2i6557!3i3724!4i256!2m3!1e0!2sm!3i595325412!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyDHKLH5Jrg4piQAOvxf0mpBkLf78188NlI&amp;token=127907"
                                                                        style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                </div>

                                                                <div
                                                                    style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                    <img draggable="false" alt="" role="presentation"
                                                                        src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i13!2i6558!3i3724!4i256!2m3!1e0!2sm!3i595325412!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyDHKLH5Jrg4piQAOvxf0mpBkLf78188NlI&amp;token=49649"
                                                                        style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                </div>

                                                                <div
                                                                    style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                    <img draggable="false" alt="" role="presentation"
                                                                        src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i13!2i6559!3i3724!4i256!2m3!1e0!2sm!3i595325412!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyDHKLH5Jrg4piQAOvxf0mpBkLf78188NlI&amp;token=102462"
                                                                        style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                </div>

                                                                <div
                                                                    style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                    <img draggable="false" alt="" role="presentation"
                                                                        src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i13!2i6559!3i3725!4i256!2m3!1e0!2sm!3i595325412!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyDHKLH5Jrg4piQAOvxf0mpBkLf78188NlI&amp;token=68019"
                                                                        style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                </div>

                                                                <div
                                                                    style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                    <img draggable="false" alt="" role="presentation"
                                                                        src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i13!2i6559!3i3726!4i256!2m3!1e0!2sm!3i595325412!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyDHKLH5Jrg4piQAOvxf0mpBkLf78188NlI&amp;token=33576"
                                                                        style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                </div>

                                                                <div
                                                                    style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                    <img draggable="false" alt="" role="presentation"
                                                                        src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i13!2i6558!3i3726!4i256!2m3!1e0!2sm!3i595325412!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyDHKLH5Jrg4piQAOvxf0mpBkLf78188NlI&amp;token=111834"
                                                                        style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                </div>

                                                                <div
                                                                    style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                    <img draggable="false" alt="" role="presentation"
                                                                        src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i13!2i6557!3i3726!4i256!2m3!1e0!2sm!3i595325412!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyDHKLH5Jrg4piQAOvxf0mpBkLf78188NlI&amp;token=59021"
                                                                        style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                </div>

                                                                <div
                                                                    style="position: absolute; left: -512px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                    <img draggable="false" alt="" role="presentation"
                                                                        src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i13!2i6556!3i3726!4i256!2m3!1e0!2sm!3i595325400!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyDHKLH5Jrg4piQAOvxf0mpBkLf78188NlI&amp;token=17146"
                                                                        style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                </div>

                                                                <div
                                                                    style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                    <img draggable="false" alt="" role="presentation"
                                                                        src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i13!2i6556!3i3725!4i256!2m3!1e0!2sm!3i595325400!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyDHKLH5Jrg4piQAOvxf0mpBkLf78188NlI&amp;token=51589"
                                                                        style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                </div>

                                                                <div
                                                                    style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                    <img draggable="false" alt="" role="presentation"
                                                                        src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i13!2i6556!3i3724!4i256!2m3!1e0!2sm!3i595325472!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyDHKLH5Jrg4piQAOvxf0mpBkLf78188NlI&amp;token=4090"
                                                                        style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                </div>

                                                                <div
                                                                    style="position: absolute; left: 512px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                    <img draggable="false" alt="" role="presentation"
                                                                        src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i13!2i6560!3i3724!4i256!2m3!1e0!2sm!3i595325412!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyDHKLH5Jrg4piQAOvxf0mpBkLf78188NlI&amp;token=108619"
                                                                        style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                </div>

                                                                <div
                                                                    style="position: absolute; left: 512px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                    <img draggable="false" alt="" role="presentation"
                                                                        src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i13!2i6560!3i3725!4i256!2m3!1e0!2sm!3i595325412!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyDHKLH5Jrg4piQAOvxf0mpBkLf78188NlI&amp;token=74176"
                                                                        style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                </div>

                                                                <div
                                                                    style="position: absolute; left: 512px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                    <img draggable="false" alt="" role="presentation"
                                                                        src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i13!2i6560!3i3726!4i256!2m3!1e0!2sm!3i595325412!2m3!1e2!6m1!3e5!3m17!2svi!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;key=AIzaSyDHKLH5Jrg4piQAOvxf0mpBkLf78188NlI&amp;token=39733"
                                                                        style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div
                                                        style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;">

                                                        <div
                                                            style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);">

                                                            <div
                                                                style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;">
                                                            </div>

                                                            <div
                                                                style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;">
                                                            </div>

                                                            <div
                                                                style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;">
                                                                <span id="65720C42-7A94-425A-A1F1-E071384A1089"
                                                                    style="display: none;">Để đi theo chỉ dẫn, hãy nhấn
                                                                    các phím mũi tên.</span>
                                                            </div>

                                                            <div
                                                                style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;">
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="gm-style-moc"
                                                        style="z-index: 4; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;">

                                                        <p class="gm-style-mot"></p>

                                                    </div>

                                                </div><iframe aria-hidden="true" frameborder="0" tabindex="-1"
                                                    style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;"></iframe>

                                                <div
                                                    style="pointer-events: none; width: 100%; height: 100%; box-sizing: border-box; position: absolute; z-index: 1000002; opacity: 0; border: 2px solid rgb(26, 115, 232);">
                                                </div>

                                                <div><input type="text" placeholder="Nhập địa chỉ"
                                                        class="pac-target-input" autocomplete="off"
                                                        style="box-sizing: border-box; border: 1px solid transparent; width: 240px; height: 32px; margin-top: 14px; padding: 0px 12px; border-radius: 3px; box-shadow: rgba(0, 0, 0, 0.3) 0px 2px 6px; font-size: 14px; outline: none; z-index: 0; position: absolute; left: 0px; top: 0px;">
                                                </div>

                                                <div></div>

                                                <div></div>

                                                <div></div>

                                                <div><button draggable="false"
                                                        aria-label="Chuyển đổi chế độ xem toàn màn hình"
                                                        title="Chuyển đổi chế độ xem toàn màn hình" type="button"
                                                        class="gm-control-active gm-fullscreen-control"
                                                        style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; top: 0px; right: 0px;"><img
                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E"
                                                            alt="" style="height: 18px; width: 18px;"><img
                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E"
                                                            alt="" style="height: 18px; width: 18px;"><img
                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E"
                                                            alt="" style="height: 18px; width: 18px;"></button></div>

                                                <div></div>

                                                <div></div>

                                                <div></div>

                                                <div></div>

                                                <div>

                                                    <div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom"
                                                        draggable="false" data-control-width="40"
                                                        data-control-height="113"
                                                        style="margin: 10px; user-select: none; position: absolute; bottom: 127px; right: 40px;">

                                                        <div class="gmnoprint" data-control-width="40"
                                                            data-control-height="40"
                                                            style="display: none; position: absolute;">

                                                            <div
                                                                style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; width: 40px; height: 40px;">
                                                                <button draggable="false"
                                                                    aria-label="Xoay bản đồ theo chiều kim đồng hồ"
                                                                    title="Xoay bản đồ theo chiều kim đồng hồ"
                                                                    type="button" class="gm-control-active"
                                                                    style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px;"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                                                        style="width: 20px; height: 20px;"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                                                        style="width: 20px; height: 20px;"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                                                        style="width: 20px; height: 20px;"></button>

                                                                <div
                                                                    style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); display: none;">
                                                                </div><button draggable="false"
                                                                    aria-label="Xoay bản đồ ngược chiều kim đồng hồ"
                                                                    title="Xoay bản đồ ngược chiều kim đồng hồ"
                                                                    type="button" class="gm-control-active"
                                                                    style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px; transform: scaleX(-1);"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                                                        style="width: 20px; height: 20px;"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                                                        style="width: 20px; height: 20px;"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                                                        style="width: 20px; height: 20px;"></button>

                                                                <div
                                                                    style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); display: none;">
                                                                </div><button draggable="false"
                                                                    aria-label="Nghiêng bản đồ" title="Nghiêng bản đồ"
                                                                    type="button" class="gm-tilt gm-control-active"
                                                                    style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; top: 0px; left: 0px; overflow: hidden; width: 40px; height: 40px;"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E"
                                                                        style="width: 18px;"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E"
                                                                        style="width: 18px;"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E"
                                                                        style="width: 18px;"></button>
                                                            </div>

                                                        </div>

                                                        <div style="position: absolute; left: 20px; top: 0px;"></div>

                                                        <div class="gmnoprint" data-control-width="40"
                                                            data-control-height="81"
                                                            style="position: absolute; left: 0px; top: 32px;">

                                                            <div draggable="false"
                                                                style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 40px; height: 81px;">
                                                                <button draggable="false" aria-label="Phóng to"
                                                                    title="Phóng to" type="button"
                                                                    class="gm-control-active"
                                                                    style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E"
                                                                        alt="" style="height: 18px; width: 18px;"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E"
                                                                        alt="" style="height: 18px; width: 18px;"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E"
                                                                        alt="" style="height: 18px; width: 18px;"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23d1d1d1%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E"
                                                                        alt=""
                                                                        style="height: 18px; width: 18px;"></button>

                                                                <div
                                                                    style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); top: 0px;">
                                                                </div><button draggable="false" aria-label="Thu nhỏ"
                                                                    title="Thu nhỏ" type="button"
                                                                    class="gm-control-active"
                                                                    style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E"
                                                                        alt="" style="height: 18px; width: 18px;"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E"
                                                                        alt="" style="height: 18px; width: 18px;"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E"
                                                                        alt="" style="height: 18px; width: 18px;"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23d1d1d1%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E"
                                                                        alt=""
                                                                        style="height: 18px; width: 18px;"></button>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div>

                                                    <div
                                                        style="margin: 0px 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;">

                                                        <a target="_blank" rel="noopener"
                                                            title="Mở khu vực này trong Google Maps (mở cửa sổ mới)"
                                                            aria-label="Mở khu vực này trong Google Maps (mở cửa sổ mới)"
                                                            href="https://maps.google.com/maps?ll=16.06206,108.202525&amp;z=13&amp;t=m&amp;hl=vi&amp;gl=US&amp;mapclient=apiv3"
                                                            style="display: inline;">

                                                            <div style="width: 66px; height: 26px;"><img alt="Google"
                                                                    src="https://maps.gstatic.com/mapfiles/api-3/images/google4_hdpi.png"
                                                                    draggable="false"
                                                                    style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;">
                                                            </div>

                                                        </a>

                                                    </div>

                                                </div>

                                                <div></div>

                                                <div>

                                                    <div class="gmnoprint"
                                                        style="z-index: 1000001; position: absolute; right: 375px; bottom: 0px;">

                                                        <div draggable="false" class="gm-style-cc"
                                                            style="user-select: none; height: 14px; line-height: 14px;">

                                                            <div
                                                                style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">

                                                                <div style="width: 1px;"></div>

                                                                <div
                                                                    style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                                                </div>

                                                            </div>

                                                            <div
                                                                style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                                <button draggable="false" aria-label="Phím tắt"
                                                                    title="Phím tắt" type="button"
                                                                    style="background: none; display: inline-block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; color: rgb(0, 0, 0); font-family: inherit; line-height: inherit;">Phím
                                                                    tắt</button>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="gmnoprint"
                                                        style="z-index: 1000001; position: absolute; right: 257px; bottom: 0px; width: 118px;">

                                                        <div draggable="false" class="gm-style-cc"
                                                            style="user-select: none; height: 14px; line-height: 14px;">

                                                            <div
                                                                style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">

                                                                <div style="width: 1px;"></div>

                                                                <div
                                                                    style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                                                </div>

                                                            </div>

                                                            <div
                                                                style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                                <button draggable="false" aria-label="Dữ liệu Bản đồ"
                                                                    title="Dữ liệu Bản đồ" type="button"
                                                                    style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; color: rgb(0, 0, 0); font-family: inherit; line-height: inherit;">Dữ
                                                                    liệu Bản đồ</button><span>Dữ liệu bản đồ
                                                                    ©2022</span>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="gmnoprint gm-style-cc" draggable="false"
                                                        style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 134px; bottom: 0px;">

                                                        <div
                                                            style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">

                                                            <div style="width: 1px;"></div>

                                                            <div
                                                                style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                                            </div>

                                                        </div>

                                                        <div
                                                            style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                            <a href="https://www.google.com/intl/vi_US/help/terms_maps.html"
                                                                target="_blank" rel="noopener"
                                                                style="text-decoration: none; cursor: pointer; color: rgb(0, 0, 0);">Điều
                                                                khoản sử dụng</a>
                                                        </div>

                                                    </div>

                                                    <div draggable="false" class="gm-style-cc"
                                                        style="user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;">

                                                        <div
                                                            style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">

                                                            <div style="width: 1px;"></div>

                                                            <div
                                                                style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                                            </div>

                                                        </div>

                                                        <div
                                                            style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                            <a target="_blank" rel="noopener"
                                                                title="Báo cáo lỗi trong bản đồ đường hoặc hình ảnh đến Google"
                                                                dir="ltr"
                                                                href="https://www.google.com/maps/@16.0620599,108.2025246,13z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3"
                                                                style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); text-decoration: none; position: relative;">Báo
                                                                cáo một lỗi bản đồ</a>
                                                        </div>

                                                    </div>

                                                    <div class="gmnoscreen"
                                                        style="position: absolute; right: 0px; bottom: 0px;">

                                                        <div
                                                            style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(0, 0, 0); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">
                                                            Dữ liệu bản đồ ©2022</div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div
                                            style="background-color: white; font-weight: 500; font-family: Roboto, sans-serif; padding: 15px 25px; box-sizing: border-box; top: 5px; border: 1px solid rgba(0, 0, 0, 0.12); border-radius: 5px; left: 50%; max-width: 375px; position: absolute; transform: translateX(-50%); width: calc(100% - 10px); z-index: 1;">

                                            <div><img alt=""
                                                    src="https://maps.gstatic.com/mapfiles/api-3/images/google_gray.svg"
                                                    draggable="false"
                                                    style="padding: 0px; margin: 0px; border: 0px; height: 17px; vertical-align: middle; width: 52px; user-select: none;">
                                            </div>

                                            <div style="line-height: 20px; margin: 15px 0px;"><span
                                                    style="color: rgba(0, 0, 0, 0.87); font-size: 14px;">Trang này không
                                                    thể tải Google Maps đúng cách.</span></div>

                                            <table style="width: 100%;">

                                                <tr>

                                                    <td style="line-height: 16px; vertical-align: middle;"><a
                                                            href="https://developers.google.com/maps/documentation/javascript/error-messages?utm_source=maps_js&amp;utm_medium=degraded&amp;utm_campaign=billing#api-key-and-billing-errors"
                                                            target="_blank" rel="noopener"
                                                            style="color: rgba(0, 0, 0, 0.54); font-size: 12px;">Bạn có
                                                            sở hữu trang web này không?</a></td>

                                                    <td style="text-align: right;"><button
                                                            class="dismissButton">OK</button></td>

                                                </tr>

                                            </table>

                                        </div>

                                    </div>

                                    <div>

                                        <div></div>

                                    </div>

                                </div>

                            </div>

                            <p class="map-address-note-errors">Địa chỉ đã chọn: Không xác định</p>

                            <hr><button type="submit" class="btn-update" disabled="">Cập nhật</button>
                        </div>

                    </form>

                </div>

                <div id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab2" class="fade tab-pane">

                    <div class="player_guide">

                        <p>Một số vấn đề khi đăng ký đại lý:</p>

                        <ul>

                            <li>Đối với 1 số địa chỉ không tìm thấy trên bản đồ, có thể nhập địa chỉ đễ dể tìm thấy gần
                                nhất.</li>

                            <li>Bắt buộc cập nhập sdt và email để khách hàng có thể tiện liên lạc.</li>

                            <li>Nhớ điền những gì muốn nói với khách hàng ở phần GHI CHÚ.</li>

                        </ul>

                        <p>Tại sao nên trở thành Đại Lý PlayerCard?</p>

                        <ul>

                            <li>PlayerCard tạo ra nhằm giúp đỡ khách hàng nạp tiền dễ hơn và thanh toán các dịch vụ có
                                liên kết với PlayerDuo 1 cách tiện lợi và nhanh chóng.</li>

                            <li>Khi trở thành đại lý PlayerCard, bạn sẽ nhận được 10% chiết khấu từ trang PlayerDuo. (Ví
                                dụ: Bạn mua 1 thẻ 100k PlayerCard, bạn được hưởng 10% chiết khấu tức là chỉ mất 90k
                                trong tài khoản PlayerDuo)</li>

                        </ul>

                        <p>Đối với những bạn muốn tìm kiếm các đại lý bán Player Code tại gần khu vực mình sống thì có
                            click vào link này: &nbsp;<a href="https://playerduo.com/partner">Xem</a>&nbsp;</p>

                        <p>Trong trường hợp các đại lý muốn xem mình đã rút những thẻ mệnh giá nào, từ lúc mấy giờ và
                            được sử dụng lúc mấy giờ thì có thể vào "Cài đặt tài khoản =&gt; Lịch sử giao dịch =&gt;
                            Lịch sử tạo thẻ" hoặc click vào link:

                            &nbsp;

                            <a href="https://playerduo.com/customer_history/create_code">Xem</a>
                        </p>

                        <p>Điều kiện để hiển thị trên danh sách đại lý?</p>

                        <ul>

                            <li>Bạn cần phải có ít nhất 100.000đ trong tài khoản để được hiển thị trong danh sách đại
                                lý.</li>

                            <li>Bạn cần đăng nhập vào tài khoản trong 7 ngày để được hiển thị trong danh sách đại lý.
                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection