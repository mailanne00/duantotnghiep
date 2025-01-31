@extends('client.layouts.app')

@section('content')
    <section class="flat-title-page inner">
        <div class="overlay"></div>
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading mg-bt-12">
                        <h1 class="heading text-center">{{ $user->ten }}</h1>
                    </div>
                    <div class="breadcrumbs style2">
                        <ul>
                            <li><a href="index-2.html">Home</a></li>
                            <li>{{ $user->ten }}</li>
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
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($user->anh_dai_dien) }}" alt=""
                                width="1000" height="400">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="content-right">
                        <div class="sc-item-details">
                            <h2 class="style2">{{ $user->ten }}</h2>
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
                                <div class="item meta-price">
                                    <span class="heading">Price</span>
                                    <div class="price">
                                        <div class="price-box">
                                            <h5>80.000 đ</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="item count-down">
                                    <span class="heading style-2">Countdown</span>
                                    <span class="js-countdown" data-timer="416400" data-labels=" :  ,  : , : , "></span>
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

    <section class="tf-section live-auctions item-details pad-b-74 mobie-style">
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-live-auctions">
                        <h2 class="tf-title">
                            Live Auctions</h2>
                        <a href="explore-3.html" class="exp">EXPLORE MORE</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="swiper-container show-shadow carousel pad-t-24 auctions">
                        <div class="swiper-wrapper">
                            @foreach ($users as $value)
                                <div class="swiper-slide">
                                    <div class="slider-item">
                                        <div class="sc-card-product">
                                            <div class="card-media">
                                                <a href="{{ route('client.chitietplayer', $value->id) }}"><img
                                                        src="{{ \Illuminate\Support\Facades\Storage::url($value->anh_dai_dien) }}"
                                                        alt="Image"></a>
                                                <button class="wishlist-button heart"><span class="number-like">
                                                        100</span></button>
                                                <div class="featured-countdown">
                                                    <span class="slogan"></span>
                                                    <span class="js-countdown" data-timer="516400"
                                                        data-labels=" :  ,  : , : , "></span>
                                                </div>
                                                <div class="button-place-bid">
                                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                        class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                            Bid</span></a>
                                                </div>
                                            </div>
                                            <div class="card-title">
                                                <h5><a
                                                        href="{{ route('client.chitietplayer', $value->id) }}">{{ $value->ten }}</a>
                                                </h5>
                                                <div class="tags">bsc</div>
                                            </div>
                                            <div class="meta-info">


                                                <h5> 4.89 ETH</h5>

                                            </div>
                                        </div>
                                    </div><!-- item-->
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="swiper-pagination mg-t-12"></div>
                    <div class="swiper-button-next btn-slide-next active"></div>
                    <div class="swiper-button-prev btn-slide-prev"></div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Phần đánh giá -->
    <div class="danh-gia-list">
        <h2>Đánh giá của {{ $player->ten }}</h2>
    
        <ul>
            @foreach($danhGias as $danhGia)
                <li>
                    <strong>{{ $danhGia->danh_gia }} sao</strong>
                    <p>{{ $danhGia->noi_dung }}</p>
                    <small>Đánh giá bởi: {{ $danhGia->nguoiThue->ten }}</small>
                </li>
            @endforeach
        </ul>

        <a href="{{ route('client.danh-gia.create', $player->id) }}" class="btn btn-primary">Đánh giá ngay</a>
    </div>
@endsection
