@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Albums Player')

@section('content')
<div class="col-lg-9 col-12">

    <div class="aside">

        <h3>Albums Player</h3>

        <div class="player-albums">

            <div class="row">

                <div class="col-md-2"><input name="album" type="file" accept="image/png, image/jpeg, image/jpg"
                        multiple="">

                    <p><span class="btn-upload"><i class="fas fa-images"></i>Thêm ảnh</span></p>

                </div>

            </div>

            <div class="row">

                <div class="item-image-upload col-sm-2">

                    <div class="hover-change-image-upload"><span><i class="fas fa-trash-alt"></i></span></div>

                    <img src="https://playerduo.com/api/upload-service/thumbs/medium/f678df7f-1c10-45ca-9f46-46c82b5c227e__21f86a30-aeb3-11ec-911d-399f024e5d9b__player_album.jpg"
                        class="img-fluid" alt="PD">
                </div>

            </div>

        </div>

    </div>

</div>
@endsection