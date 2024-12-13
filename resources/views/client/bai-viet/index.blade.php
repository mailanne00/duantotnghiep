@extends('client.layouts.app')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .new-post,
        .post {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 20px;
        }

        .new-post {
            height: 220px;
        }

        .new-post .post-header,
        .post .post-header {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .post-input {
            flex: 1;
            border: none;
            outline: none;
            padding: 10px;
            border-radius: 20px;
            background-color: #f0f2f5;
            font-size: 16px;
            resize: none;
            min-height: 50px;
        }

        .post-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .action-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background-color: #f0f2f5;
            color: #65676b;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .action-btn:hover {
            background-color: #e4e6eb;
        }

        .post-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .post-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            background-color: #1877f2;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .posts-list {
            width: 60%;
            height: 650px;
            overflow: auto;
        }

        .posts-list::-webkit-scrollbar {
            display: none;
        }

        .posts-list {
            scrollbar-width: none;
        }

        .post-content {
            margin-top: 10px;
        }

        .post-content p {
            margin: 0 0 10px;
        }

        .post-image {
            width: 100%;
            border-radius: 10px;
            margin-top: 10px;
        }

        .post .post-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .like-btn,
        .comment-btn,
        .share-btn {
            padding: 8px 15px;
            border-radius: 5px;
            border: 1px solid #EFF2F5;
            background-color: #f0f2f5;
            color: #65676b;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /*.like-btn:hover,*/
        /*.comment-btn:hover,*/
        /*.share-btn:hover {*/
        /*    background-color: #e4e6eb;*/
        /*}*/

        .post-content img {
            width: auto;
            align-items: center;
        }


    </style>
@endsection

@section('content')
    <section class="flat-title-page inner">
        <div class="overlay"></div>
        <div class="themesflat-container flex">
            @if(auth()->check())
                <div class="col-5 new-post">
                    <form action="{{route('client.baiViet.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="post-header">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($taiKhoan->anh_dai_dien)}}" alt="Avatar" class="avatar">
                            <textarea placeholder="{{$taiKhoan->ten}}, bạn đang nghĩ gì?" class="post-input" name="noi_dung"></textarea>
                        </div>
                        <div class="post-actions">
                            <input type="file" name="anh" class="form-control" style="background-color: #EFF2F5; margin-left: 13%; height: 50px;padding: 15px">
                        </div>
                        <div class="post-footer">
                            <button type="submit" class="post-btn">Đăng</button>
                        </div>
                    </form>
                </div>
            @endif

            <!-- Danh sách bài viết -->
            <div @if(auth()->check()) class="col-7 posts-list" @else class="col-9 posts-list mx-auto" @endif>
                @foreach($baiViet as $item)
                    <div class="post">
                        <div class="post-header">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($item->taiKhoan->anh_dai_dien)}}" alt="Avatar" class="avatar">
                            <div class="post-info">
                                <h3 style="color: #3C1339">{{$item->taiKhoan->ten}}</h3>
                                <p style="font-size: 14px">{{$item->timeAgo}}</p>
                            </div>
                        </div>
                        <div class="post-content">
                            <p style="font-size: 17px;">{{$item->noi_dung}}</p>
                            <img src="{{\Illuminate\Support\Facades\Storage::url($item->anh)}}" alt="">
                        </div>
                        <div class="post-footer">
                            <button class="like-btn"><i class="fa-solid fa-thumbs-up" style="color: #1877F2"></i> Thích</button>
                            <button class="comment-btn"><i class="fa-solid fa-comment" style="color: #1877F2"></i></i> Bình luận</button>
                            <button class="share-btn"><i class="fa-solid fa-share" style="color: #1877F2"></i> Chia sẻ</button>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection

