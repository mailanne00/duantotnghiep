@extends('client.layouts.app')

@section('title', 'Danh sách đăng tin')

@section('header')
<style>
    .col-xl-3 {
        width: 20%;
    }

    .player-information-card .player-avt .box-item-label {
        background-image: linear-gradient(#0000, #0000001a, #0000004d, #00000080, #000000b3, #000c);
        border-radius: 0 0 12px;
        bottom: 0;
        color: #fff;
        display: flex;
        justify-content: space-between;
        left: 0;
        min-height: 70px;
        padding: 0 20px 10px 20px;
        position: absolute;
        width: 100%;
    }

    .box-item-label p {
        align-self: flex-end;
        color: #f5f5f5;
        font-size: 13px;
        margin: 0;
    }

    .box-item-label p.desc {
        bottom: 0;
        font-size: 12px;
        left: 0;
        opacity: 0;
        padding: 0 15px 10px 15px;
        position: absolute;
        transition: opacity .1s linear;
    }

    .box-item-label p i {
        margin-right: 4px;
    }

    .player-information-card .player-avt:hover .box-item-label .desc {
        opacity: 1
    }

    .player-information-card .player-avt:hover .box-item-label {
        height: 100%
    }

    .player-information-card .player-avt:hover .box-item-label p:not(:last-child) {
        display: none
    }

    .modal-dialog .modal-content {
        display: flex;
    }

    .modal-dialog .modal-content .modal-left {
        flex: 2 1;
        position: relative;
        text-align: center;
    }

    .modal-dialog .modal-content .modal-right {
        background: #eee;
        display: flex;
        flex: 1.1 1;
        flex-flow: column;
        overflow: hidden;
        padding: 15px 10px;
        border-radius: 0 10px 10px 0;
    }

    .modal-dialog .modal-content .modal-left .btn-prev {
        left: 4%;
        padding: 7px 1px 7px 0;
        background: #e3e3e3;
        border: none;
        border-radius: 50%;
        font-size: 25px;
        height: 45px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 45px;
    }

    .modal-dialog .modal-content .modal-left .btn-next {
        padding: 7px 0 7px 3px;
        margin-left: 4%;
        background: #e3e3e3;
        border: none;
        border-radius: 50%;
        font-size: 25px;
        height: 45px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 45px;
    }

    .modal-dialog .modal-content .modal-left video {
        background-color: #000;
        height: 90%;
        margin-top: 2%;
        max-width: 320px;
        min-height: 580px;
        margin-left: 7%;
    }

    .modal-right .card-top .media-interact {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        padding: 15px;
        text-align: center;
    }

    .modal-right .btn-like {
        background: #e3e3e3;
        border: none;
        border-radius: 50%;
        bottom: 6%;
        font-size: 19px;
        height: 40px;
        margin-bottom: 100px;
        padding: 9px;
        position: absolute;
        right: 12%;
        width: 40px;
    }

    .modal-right .btn-donate {
        background: #e3e3e3;
        border: none;
        border-radius: 50%;
        bottom: 6%;
        font-size: 19px;
        height: 40px;
        margin-bottom: 100px;
        padding: 9px;
        position: absolute;
        right: 12%;
        width: 40px;
    }

    .media-middle p{
        margin-top: 3px;
        margin-left: 10px;
    }

    .media-middle button{
        margin-left: 85px;
    }
    .interact i{
        margin-right: 5px;
    }
</style>

<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })
</script>
@endsection

@section('content')

<div class="list-player">

    <div class="vip-player">

        <div class="card-player">

            <div class="row">

                @foreach ($dangtins as $dangtin)
                <div class="col-xl-3 col-md-6 col-sm-12" data-bs-toggle="modal" data-bs-target="#exampleModal">

                    <div class="player-information-card">

                        <div class="player-avt">

                            <video width="100%" style="pointer-events: none;">
                                <source src="{{ Storage::url($dangtin->video) }}" type="video/mp4">
                            </video>

                            <div class="box-item-label">
                                <p><i class="fas fa-heart"></i>{{$dangtin->luot_thichs_count}}</p>
                                <p class="desc">{{$dangtin->noi_dung}} <strong></strong></p>
                            </div>

                        </div>

                        <div class="player-information">

                            <h3 class="player-name">

                                <img src="{{Storage::url($dangtin->taiKhoan->anh_dai_dien)}}" alt="" style="width:40px; border-radius:50%;">
                                <a href="./info.html" target="_blank">{{$dangtin->taiKhoan->ten}}</a>

                            </h3>

                        </div>

                    </div>

                </div>
                <div class="modal fade" id="exampleModal" style="height:900px" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content row" style="transform: translateX(-210px); width: 1020px; flex-direction: row">
                            <div class="modal-left col-6">
                                <button type="button" class="btn-prev btn btn-default">
                                    <i class="far fa-angle-left"></i>
                                </button>
                                <video playsinline="" autoplay="" mediatype="video" loop="" controls="" controlslist="nodownload" height="330px">
                                    <source src="{{ Storage::url($dangtin->video) }}" type="video/mp4">
                                </video>
                                <button type="button" class="btn-next btn btn-default">
                                    <i class="far fa-angle-right"></i>
                                </button>
                                <!-- <button type="button" class="btn-like   btn btn-default">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button type="button" class="btn-donate btn btn-default">
                                    <i class="fas fa-gift"></i>
                                </button>
                                <share class="dropup"><button role="button" aria-haspopup="true" aria-expanded="false" type="button" class="dropdown-toggle btn btn-default"><i class="fas fa-share"></i></button>
                                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                                        <li role="presentation" class=""><a role="menuitem" tabindex="-1" href="#"><i class="far fa-link"></i> Copy Link</a></li>
                                        <li role="presentation" class=""><a role="menuitem" tabindex="-1" href="#"><button class="btn-share-fb" target="_blank">Chia sẻ <i class="fab fa-facebook-f"></i></button></a></li>
                                    </ul>
                                </share> -->
                            </div>
                            <div class="modal-right col-6">
                                <div class="card-top">
                                    <div class="media-player media">
                                        <div class="media-middle media-left"><a href="/daum58" target="_blank" rel="noopener noreferrer">
                                                <div class="avt-rank avt-sm">
                                                    <img src="https://files.playerduo.net/production/images/c3f4846f-3d42-47cd-acd5-0ff67fe7465e__76dd5440-7c27-11ef-9376-b533eb6f1b4c__page_avatar.jpg" class="avt-1-15 avt-img" alt="PD" style="width:50px; border-radius:50%">
                                                </div>
                                            </a></div>
                                        <div class="media-middle media-body"><a href="/stories?user=612b2dc2983659446297c59a">
                                                <p class="name-player-review color-vip-1">Ebe thích ăn gà🍗</p>
                                                <p>3 ngày trước</p>
                                            </a></div>
                                        <div class="media-middle media-right"><a href="/dauum58" target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-danger">Thuê</button></a></div>
                                    </div>
                                    <div class="media-interact">
                                        <div class="interact"><i class="fas fa-eye"></i>411</div>
                                        <div class="interact"><i class="fas fa-comment-alt"></i>0</div>
                                        <div class="interact"><i class="fas fa-heart"></i>2</div>
                                    </div>
                                    <div class="description">
                                        <p class="note"><a target="_blank" href="https://playerduo.net/dauum58" class="link">{{$dangtin->noi_dung}}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Button trigger modal -->
                <!-- Modal -->
               

            </div>

        </div>

    </div>

</div>
@endsection