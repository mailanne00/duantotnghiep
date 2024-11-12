@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Mạng xã hội')

@section('content')

<div class="col-lg-9 col-12">

    <div class="aside">

        <form class="user-setting-info">

            <div class="col-xs-12">

                <h3>Mạng xã hội</h3>

            </div>

            <div class="col-xs-12"><label>Link Facebook</label></div>

            <div class="col-md-6">

                <div class="fieldGroup form-link ">

                    <p class="control-label">facebook.com/</p><input type="text" name="facebookUrl" placeholder=""
                        maxlength="5000" autocomplete="false" value="">
                </div>

            </div>

            <div class="col-xs-12"><label>Link Youtube</label></div>

            <div class="col-md-6">

                <div class="fieldGroup form-link ">

                    <p class="control-label">youtube.com/</p><input type="text" name="youtubeUrl" placeholder=""
                        maxlength="5000" autocomplete="false" value="">
                </div>

            </div>

            <div class="col-xs-12"><label>Link Discord</label></div>

            <div class="col-md-6">

                <div class="fieldGroup "><input type="text" name="discordUrl" placeholder="" maxlength="5000"
                        autocomplete="false" value=""></div>

            </div>

            <div class="col-md-12">

                <hr><button type="button" class="btn-update" id="user-setting-info-btn">Cập nhật</button>
            </div>

        </form>

    </div>

</div>
@endsection