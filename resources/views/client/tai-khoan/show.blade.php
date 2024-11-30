@extends('client.layouts.app')

@section('content')
<section class="flat-title-page inner">
    <div class="overlay"></div>
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading mg-bt-12">
                    <h1 class="heading text-center">{{ $player->ten }}</h1>
                </div>
                <div class="breadcrumbs style2">
                    <ul>
                        <li><a href="index-2.html">Home</a></li>
                        <li>{{ $player->ten }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- tf item details -->
<div class="tf-section tf-item-details">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="content-left">
                    <div class="media">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($player->anh_dai_dien) }}" alt=""
                            width="1000" height="400">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="content-right">
                    <div class="sc-item-details">
                        <h2 class="style2">{{ $player->ten }}</h2>
                        <div class="meta-item">
                            <div class="left">
                                <span class="viewed eye">225</span>
                                <span class="liked heart wishlist-button mg-l-8"><span
                                        class="number-like">100</span></span>
                            </div>
                            <div class="right">
                                <a href="#" class="share"></a>
                                <a class="option"></a>
                            </div>
                        </div>
                        <div class="client-infor sc-card-product">
                            @foreach ($selectedCategories as $category)
                            <div class="meta-info">
                                <div class="author">
                                    <div class="avatar">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($category->anh) }}"
                                            alt="{{ $category->ten }}">
                                    </div>
                                    <div class="info">
                                        <h6>
                                            <a href="#">{{ $category->ten }}</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <p>Habitant sollicitudin faucibus cursus lectus pulvinar dolor non ultrices eget.
                            Facilisi lobortisal morbi fringilla urna amet sed ipsum vitae ipsum malesuada.
                            Habitant sollicitudin faucibus cursus lectus pulvinar dolor non ultrices eget.
                            Facilisi lobortisal morbi fringilla urna amet sed ipsum</p>
                        <div class="meta-item-details style2">
                            <div class="item meta-price w-100">
                                <span class="heading">Price</span>
                                <div class="price">
                                    <div class="price-box">
                                        <h5>{{number_format($player->gia_tien, 0 , ',')}} VNĐ</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" data-toggle="modal" data-target="#popup_bid"
                            class="sc-button loadmore style  fl-button pri-3"> <i
                                class="fa fa-user fa-2x"></i><span>Thuê</span></a>
                        <a href="#" data-toggle="modal" data-target="#popup_bid"
                            class="sc-button loadmore style fl-button pri-3">
                            <i class="fa fa-comments fa-2x"></i>
                            <span>Trò Chuyện</span>
                        </a>

                        <div class="flat-tabs themesflat-tabs">
                            <ul class="menu-tab tab-title">
                                <li class="item-title active">
                                    <span class="inner">Bid History</span>
                                </li>
                                <li class="item-title">
                                    <span class="inner">Info</span>
                                </li>
                                <li class="item-title">
                                    <span class="inner">Provenance</span>
                                </li>
                            </ul>
                            <div class="content-tab">
                                <div class="content-inner tab-content">
                                    <ul class="bid-history-list">
                                        <li>
                                            <div class="content">
                                                <div class="client">
                                                    <div class="sc-author-box style-2">
                                                        <div class="author-avatar">
                                                            <a href="#">
                                                                <img src="assets/images/avatar/avt-3.jpg" alt=""
                                                                    class="avatar">
                                                            </a>
                                                            <div class="badge"></div>
                                                        </div>
                                                        <div class="author-infor">
                                                            <div class="name">
                                                                <h6><a href="author02.html">Mason Woodward </a></h6>
                                                                <span> place a bid</span>
                                                            </div>
                                                            <span class="time">8 hours ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <h5> 4.89 ETH</h5>
                                                    <span>= $12.246</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <div class="client">
                                                    <div class="sc-author-box style-2">
                                                        <div class="author-avatar">
                                                            <a href="#">
                                                                <img src="assets/images/avatar/avt-11.jpg"
                                                                    alt="" class="avatar">
                                                            </a>
                                                            <div class="badge"></div>
                                                        </div>
                                                        <div class="author-infor">
                                                            <div class="name">
                                                                <h6> <a href="author02.html">Mason Woodward </a></h6>
                                                                <span>bid accepted</span>
                                                            </div>
                                                            <span class="time">at 06/10/2021, 3:20 AM</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <h5> 4.89 ETH</h5>
                                                    <span>= $12.246</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <div class="client">
                                                    <div class="sc-author-box style-2">
                                                        <div class="author-avatar">
                                                            <a href="#">
                                                                <img src="assets/images/avatar/avt-1.jpg"
                                                                    alt="" class="avatar">
                                                            </a>
                                                            <div class="badge"></div>
                                                        </div>
                                                        <div class="author-infor">
                                                            <div class="name">
                                                                <h6> <a href="author02.html">Mason Woodward </a></h6>
                                                                <span> place a bid</span>
                                                            </div>
                                                            <span class="time">8 hours ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <h5> 4.89 ETH</h5>
                                                    <span>= $12.246</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <div class="client">
                                                    <div class="sc-author-box style-2">
                                                        <div class="author-avatar">
                                                            <a href="#">
                                                                <img src="assets/images/avatar/avt-5.jpg"
                                                                    alt="" class="avatar">
                                                            </a>
                                                            <div class="badge"></div>
                                                        </div>
                                                        <div class="author-infor">
                                                            <div class="name">
                                                                <h6> <a href="author02.html">Mason Woodward </a></h6>
                                                                <span> place a bid</span>
                                                            </div>
                                                            <span class="time">8 hours ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <h5> 4.89 ETH</h5>
                                                    <span>= $12.246</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <div class="client">
                                                    <div class="sc-author-box style-2">
                                                        <div class="author-avatar">
                                                            <a href="#">
                                                                <img src="assets/images/avatar/avt-7.jpg"
                                                                    alt="" class="avatar">
                                                            </a>
                                                            <div class="badge"></div>
                                                        </div>
                                                        <div class="author-infor">
                                                            <div class="name">
                                                                <h6> <a href="author02.html">Mason Woodward </a></h6>
                                                                <span> place a bid</span>
                                                            </div>
                                                            <span class="time">8 hours ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <h5> 4.89 ETH</h5>
                                                    <span>= $12.246</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <div class="client">
                                                    <div class="sc-author-box style-2">
                                                        <div class="author-avatar">
                                                            <a href="#">
                                                                <img src="assets/images/avatar/avt-8.jpg"
                                                                    alt="" class="avatar">
                                                            </a>
                                                            <div class="badge"></div>
                                                        </div>
                                                        <div class="author-infor">
                                                            <div class="name">
                                                                <h6> <a href="author02.html">Mason Woodward </a></h6>
                                                                <span> place a bid</span>
                                                            </div>
                                                            <span class="time">8 hours ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <h5> 4.89 ETH</h5>
                                                    <span>= $12.246</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="content-inner tab-content">
                                    <ul class="bid-history-list">
                                        <li>
                                            <div class="content">
                                                <div class="client">
                                                    <div class="sc-author-box style-2">
                                                        <div class="author-avatar">
                                                            <a href="#">
                                                                <img src="assets/images/avatar/avt-3.jpg"
                                                                    alt="" class="avatar">
                                                            </a>
                                                            <div class="badge"></div>
                                                        </div>
                                                        <div class="author-infor">
                                                            <div class="name">
                                                                <h6> <a href="author02.html">Mason Woodward </a></h6>
                                                                <span> place a bid</span>
                                                            </div>
                                                            <span class="time">8 hours ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="content-inner tab-content">
                                    <div class="provenance">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book.
                                            It has survived not only five centuries, but also the leap into electronic
                                            typesetting,
                                            remaining essentially unchanged. It was popularised in the 1960s with the
                                            release of Letraset sheets containing Lorem Ipsum passages,
                                            and more recently with desktop publishing software like Aldus PageMaker
                                            including versions of Lorem Ipsum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /tf item details -->

<div class="danh-gia-list">
    @foreach ($danhGias as $danhGia)
    <div class="danh-gia-item d-flex align-items-start mb-4">
        <!-- Ảnh đại diện -->
        <img src="{{ \Illuminate\Support\Facades\Storage::url($danhGia->nguoiThue->anh_dai_dien)  }}"
            alt="Ảnh đại diện"
            class="rounded-circle me-3"
            style="width: 50px; height: 50px; object-fit: cover;margin-right:20px;">

        <!-- Nội dung đánh giá -->
        <div class="danh-gia-content">
            <!-- Sao đánh giá -->
            <div class="mb-2">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <=$danhGia->danh_gia)
                    <i class="fas fa-star text-warning"></i>
                    @else
                    <i class="far fa-star text-muted"></i>
                    @endif
                    @endfor
            </div>

            <!-- Điểm số đánh giá -->
            <!-- <strong class="fs-5">{{ $danhGia->danh_gia }} sao</strong> -->

            <!-- Nội dung bình luận -->
            <p class="mb-2 text-secondary" style="line-height: 1.8;">
                {{ $danhGia->noi_dung }}
            </p>

            <!-- Thông tin thêm -->
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Đánh giá bởi: <strong>{{ $danhGia->nguoiThue->ten }}</strong></small>

            </div>
        </div>
    </div>
    @endforeach

    @if($danhGias->isEmpty())
    <p class="text-center text-muted">Chưa có đánh giá nào.</p>
    @endif

    <style>
        .danh-gia-list{
            margin-top: 50px;
            
        }
        
    </style>
</div>

<script>

</script>






@endsection