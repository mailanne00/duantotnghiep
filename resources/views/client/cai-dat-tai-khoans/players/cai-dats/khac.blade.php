@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Cài Đặt Khác')

@section('content')
    <div class="col-lg-9 col-12">

        <div class="aside">

            <h3>Cài Đặt Khác</h3>

            <form class="customerinfo-form row">

                <div class="col-md-6"><label for="facebookUrl">LINK FACEBOOK/FANPAGE</label>

                    <div class="fieldGroup form-link">

                        <p class="control-label">facebook.com/</p><input type="text" name="facebookUrl" placeholder=""
                            maxlength="5000" autocomplete="false" value="">
                    </div><label>LINK YOUTUBE/CHANNEL</label>

                    <div class="fieldGroup form-link">

                        <p class="control-label">youtube.com/</p><input type="text" name="youtubeUrl" placeholder=""
                            maxlength="5000" autocomplete="false" value="">
                    </div><label>LINK VIDEO HIGHLIGHT(YOUTUBE)</label>

                    <div class="fieldGroup "><input type="text" name="videoHighlightUrl" placeholder="" maxlength="5000"
                            autocomplete="false" value=""></div><label>LINK ROOM VOICE (ALO ALO,DISCORD,...)</label>

                    <div class="fieldGroup "><input type="text" name="roomVoiceUrl" placeholder="" maxlength="5000"
                            autocomplete="false" value=""></div><label>SKYPER</label>

                    <div class="fieldGroup "><input type="text" name="skype" placeholder="" maxlength="5000"
                            autocomplete="false" value=""></div><label>Tình trạng phụ kiện:</label>

                    <div class=""><select name="hasMicrophone" class="select-status">
                            <option value="false">Không mic</option>
                            <option value="true">Có mic</option>
                        </select><select name="hasWebcam" class="select-status">
                            <option value="false">Không webcam</option>
                            <option value="true">Có webcam</option>
                        </select></div>

                    <hr><button class="btn-update" type="submit">Cập nhật</button>
                </div>

            </form>

        </div>

    </div>
@endsection
