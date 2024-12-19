@extends('client.layouts.app')

@section('content')
<style>
    .modal-content {
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        min-height: 60vh;
    }

    .modal-header {
        border-bottom: 2px solid #007bff;
    }

    .modal-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .modal-body {
        padding: 20px;
        height: calc(100% - 120px);
        overflow-y: auto;
    }

    .form-label {
        font-weight: bold;
    }

    textarea.form-control {
        resize: none;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .text-muted {
        font-size: 0.9rem;
    }

    .video-container {
        flex: 1;
        width: 80%;
        height: 80%;
        position: relative;
    }

    #modalVideo {
        width: 80%;
        height: 80%;
        object-fit: cover;
        border-radius: 10px;
    }

    .video-info {
        flex: 1;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .video-info h6 {
        font-weight: bold;
        font-size: 1.2rem;
        margin-bottom: 5px;
    }

    .video-info p {
        margin: 5px 0;
    }

    .video-info .btn {
        margin-right: 10px;
    }

    .video-info .form-control {
        margin-top: 10px;
    }

    .video-info .form-control::placeholder {
        color: #aaa;
    }

    .bi-heart, .bi-chat {
        margin-right: 5px;
    }

    @media (max-width: 768px) {
        .modal-dialog {
            max-width: 80%;
            width: 80%;
        }

        .video-container {
            max-width: 100%;
        }
    }

    .story-card:first-child {
        border: 3px solid #003366; 
    }

    .story-card {
        flex: 0 0 calc(25% - 20px); 
        max-width: 200px; 
        height: 300px; 
        border-radius: 10px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .story-card img, 
    .story-card video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .story-card:hover {
        transform: scale(1.05);
    }

    .story-footer {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.5);
        color: white;
        text-align: center;
        padding: 5px;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .story-badge {
        position: absolute;
        bottom: 5px;
        right: 5px;
        color: white;
        font-size: 0.8rem;
        background: rgba(0, 0, 0, 0.5);
        padding: 2px 6px;
        border-radius: 10px;
    }

    .story-container {
        display: flex;
        flex-wrap: wrap;
        gap: 25px;
        justify-content: center;
        padding: 25px;
    }

    #videoPreviewContainer {
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    #videoPreviewContainer:hover {
        background-color: #f8f9fa;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }
    @media (max-width: 1200px) {
    .story-card {
        flex: 0 0 calc(33.33% - 20px); /* 3 thẻ trên mỗi hàng */
    }
}

@media (max-width: 768px) {
    .story-card {
        flex: 0 0 calc(50% - 20px); /* 2 thẻ trên mỗi hàng */
    }
}

@media (max-width: 480px) {
    .story-card {
        flex: 0 0 calc(100% - 20px); /* 1 thẻ trên mỗi hàng */
    }
}
</style>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


<div class="flat-title-page inner">
    <h3 class="mb-4 text-center">Stories</h3>
    <div class="story-container">
        @foreach($baiDang as $item)
        <div class="story-card" 
    onclick="openVideo('{{ asset('storage/' . $item->video) }}', '{{ $item->taiKhoan->ten }}',500, `{{ $item->noi_dung }}`)">

                <video width="150" height="250" muted playsinline>
                    <source src="{{ asset('storage/' . $item->video) }}" type="video/mp4"> 
                    Your browser does not support the video tag.
                </video>
                <div class="story-badge"><i class="bi bi-eye"></i> {{ $item->views }}</div>
                <div class="story-footer">{{ $item->taiKhoan->ten }} 🌟</div>
            </div>
        @endforeach
    </div>

    <!-- này là  Đăng Tin -->
    <div class="modal fade" id="dangTinModal" tabindex="-1" aria-labelledby="dangTinModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-white">
                    <button type="button" class="btn-close" style="color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <form method="POST" action="{{ route('client.taoTin') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="content" class="form-label fs-5">Nội dung Story</label>
                                <textarea class="form-control rounded-3" name="noi_dung" id="content" rows="9" placeholder="" required style="font-size: 1.2rem; padding: 1rem;"></textarea>
                            </div>
                            <div class="col-md-6 d-flex flex-column justify-content-between">
                                <label for="upload-video" class="form-label fs-5">Tải Video Lên</label>
                                <div class="text-center border rounded-3 p-3" id="videoPreviewContainer" style="height: 185px;">
                                    <i class="bi bi-upload fs-1 text-muted"></i>
                                    <p class="small text-muted">Chọn video từ thiết bị</p>
                                    <input type="file" class="form-control d-none" id="upload-video" name="video" accept="video/*" required onchange="previewVideo(event)">
                                </div>
                                <label for="upload-video" class="btn btn-outline-primary mt-2 w-100">
                                    <i class="bi bi-folder-plus"></i> Chọn Video
                                </label>
                            </div>
                        </div>
                        <div id="videoPreview" class="text-center mt-3 d-none">
                            <video id="previewPlayer" width="100%" height="250" controls class="rounded-3 shadow-sm"></video>
                        </div>


                        <div class="modal-footer justify-content-center" style="background-color: #FFC1C1; border-color: #FFC1C1;
                         color: white;margin-top: 100px;">
                            <button type="submit" class="btn btn-success px-8 py-2 rounded-pill" style="font-size: 1.6rem;">
                                <i class="bi bi-send fs-4"></i> Đăng Story
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- đây là chi tiết -->
    <div class="modal fade" id="videoDetailModal" tabindex="-1" aria-labelledby="videoDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="videoDetailModalLabel">Chi Tiết Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Body -->
                <div class="modal-body d-flex">
                    <!-- Video -->
                    <div class="video-container me-3">
                        <video id="modalVideo" controls width="400" height="300">
                            <source id="videoSource" src="" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <!-- Video Info -->
                    <div class="video-info d-flex flex-column w-100">
                        <!-- Username and Date -->
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <h6 id="videoUsername"><i class="bi bi-person"></i> Tên người đăng</h6>
                            </div>
                            <div class="col-md-6 text-end">
                                <h6><i class="bi bi-calendar"></i> Ngày Đăng: Hôm Qua</h6>
                            </div>
                        </div>
                        <!-- Views -->
                        <p><strong id="videoViews"></strong>:<i class="bi bi-eye"></i></p>
                        <!-- Nội dung Story -->
                        <div class="mb-3">
                            <h6 id="videoContent" class="text-muted" style="font-size: 1rem;"><i class="bi bi-card-text"></i> Nội Dung:</h6>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-between mt-auto">
                            <button class="btn btn-light">
                                <i class="bi bi-heart"></i> Thích
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
        function previewVideo(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('videoPreview');
            const previewPlayer = document.getElementById('previewPlayer');

            if (file) {
                const fileURL = URL.createObjectURL(file);
                previewPlayer.src = fileURL;
                previewContainer.classList.remove('d-none');
            }
        }

        function openVideo(videoUrl, username, views, noiDung) {
            console.log("Video URL:", videoUrl);
            console.log("Username:", username);
            console.log("Views:", views);
            console.log("Nội dung:", noiDung);


            var videoSource = document.getElementById('videoSource');
            videoSource.src = videoUrl;

            var modalVideo = document.getElementById('modalVideo');
            modalVideo.load(); 

            document.getElementById('videoUsername').textContent = username;
            document.getElementById('videoViews').textContent = views + " lượt xem";
            document.getElementById('videoContent').textContent = "Nội dung:" + noiDung;


            var videoDetailModal = new bootstrap.Modal(document.getElementById('videoDetailModal'));
            videoDetailModal.show();
        }
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
