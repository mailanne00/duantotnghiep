@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Cài đặt mục tiêu')

@section('content')

<div class="col-lg-9 col-12">

    <div class="aside">

        <h3>Cài đặt mục tiêu</h3>

        <hr>

        <div class="show-grid mb-3 row">

            <div class="col-md-6 col-xs-6">

                <h5>Bật mục tiêu</h5>

            </div>

            <div class="col-md-6 col-xs-6">

                <div
                    style="position: relative; display: inline-block; text-align: left; opacity: 1; border-radius: 14px; transition: opacity 0.25s ease 0s; touch-action: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none;">

                    <div class="react-switch-bg"
                        style="height: 28px; width: 56px; margin: 0px; position: relative; background: rgb(136, 136, 136); border-radius: 14px; cursor: pointer; transition: background 0.25s ease 0s;">

                        <div
                            style="height: 28px; width: 30px; position: relative; opacity: 0; pointer-events: none; transition: opacity 0.25s ease 0s;">
                            <svg height="100%" width="100%" viewBox="-2 -5 17 21" style="position: absolute; top: 0px;">
                                <path d="M11.264 0L5.26 6.004 2.103 2.847 0 4.95l5.26 5.26 8.108-8.107L11.264 0"
                                    fill="#fff" fill-rule="evenodd"></path>
                            </svg></div>

                        <div
                            style="height: 28px; width: 30px; position: absolute; opacity: 1; right: 0px; top: 0px; pointer-events: none; transition: opacity 0.25s ease 0s;">
                            <svg viewBox="-2 -5 14 20" height="100%" width="100%" style="position: absolute; top: 0px;">
                                <path
                                    d="M9.9 2.12L7.78 0 4.95 2.828 2.12 0 0 2.12l2.83 2.83L0 7.776 2.123 9.9 4.95 7.07 7.78 9.9 9.9 7.776 7.072 4.95 9.9 2.12"
                                    fill="#fff" fill-rule="evenodd"></path>
                            </svg></div>

                    </div>

                    <div class="react-switch-handle" role="checkbox" tabindex="0" aria-disabled="false"
                        style="height: 26px; width: 26px; background: rgb(255, 255, 255); cursor: pointer; display: inline-block; border-radius: 50%; position: absolute; transform: translateX(1px); top: 1px; outline: 0px; border: 0px; transition: background-color 0.25s ease 0s, transform 0.25s ease 0s, box-shadow 0.15s ease 0s;">
                    </div>

                </div>

            </div>

        </div>

        <div class="user-target-form row">

            <div class="col-md-6 col-xs-12">

                <div class="fieldGroup ">

                    <p class="control-label">Tiêu đề</p><input type="text" name="title" placeholder="" maxlength="255"
                        autocomplete="false" value="">
                </div>

                <div class="fieldGroup ">

                    <p class="control-label">Link bài viết</p><input type="text" name="link" placeholder=""
                        maxlength="5000" autocomplete="false" value="">
                </div><label>Hiện tại (<span>RESET</span>)</label>

                <div class="fieldGroup "><input type="text" name="currentValue" placeholder="" disabled=""
                        maxlength="5000" autocomplete="false" value="0"></div>

                <div class="fieldGroup ">

                    <p class="control-label">Mục tiêu</p><input type="text" name="totalMoney" placeholder=""
                        maxlength="5000" autocomplete="false" value="">
                </div>

                <hr><button type="button" class="btn-update">Tạo mục tiêu</button>
            </div>

        </div>

    </div>

</div>
@endsection
