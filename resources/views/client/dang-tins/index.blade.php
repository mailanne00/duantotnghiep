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
        padding: 0 15px 10px 20px;
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

    .modal-dialog {
        max-width: 80%;
        /* Thay đổi kích thước modal nếu cần */
    }
</style>
@endsection

@section('content')

<div class="list-player">

    <div class="vip-player">

        <div class="card-player">

            <div class="row">

                @foreach ($dangtins as $dangtin)
                <div class="col-xl-3 col-md-6 col-sm-12">

                    <div class="player-information-card">

                        <div class="player-avt">

                            <video width="100%" style="pointer-events: none;" data-toggle="modal" data-target="#videoModal" data-video="{{ Storage::url($dangtin->video) }}">
                                <source src="{{ Storage::url($dangtin->video) }}" type="video/mp4">
                            </video>

                            <div class="box-item-label">
                                <p><i class="fas fa-heart"></i>{{$dangtin->luot_thichs_count}}</p>
                                <p class="desc">{{$dangtin->noi_dung}} <strong></strong></p>
                            </div>

                        </div>

                        <div class="player-information">

                            <h3 class="player-name">

                                <img src="{{Storage::url($dangtin->taiKhoan->anh_dai_dien)}}" alt="" style="width:40px; height:40px; border-radius:50%;">
                                <a href="./info.html" target="_blank">{{$dangtin->taiKhoan->ten}}</a>

                            </h3>

                        </div>

                    </div>

                </div>
                @endforeach
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="videoModalLabel">Video</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <video id="videoPlayer" width="100%" controls>
                                    <source id="videoSource" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection

@section('footer')
<script>
    // Khi modal được mở, lấy nguồn video từ phần tử đã được click
    $('#videoModal').on('shown.bs.modal', function(event) {
        // Lấy phần tử video đã được click
        var button = $(event.relatedTarget); // Người gọi là phần tử video trong danh sách
        var videoSrc = button.data('video'); // Lấy giá trị data-video từ phần tử video

        // Cập nhật nguồn video trong modal
        var videoElement = $('#videoPlayer')[0]; // Lấy thẻ video trong modal
        var videoSource = $('#videoSource')[0]; // Lấy thẻ source trong video modal
        videoSource.src = videoSrc; // Cập nhật đường dẫn video vào source

        // Tải lại video và phát
        videoElement.load();
        videoElement.play();
    });

    // Khi modal đóng, dừng video và reset về đầu
    $('#videoModal').on('hidden.bs.modal', function() {
        var videoElement = $('#videoPlayer')[0];
        videoElement.pause(); // Dừng video khi modal đóng
        videoElement.currentTime = 0; // Đặt lại thời gian video về 0
    });

</script>
@endsection