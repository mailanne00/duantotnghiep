@extends('client.layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
<section class="flat-title-page style3">
    <img class="bgr-gradient gradient1" src="{{ asset('assets/images/backgroup-secsion/bg-gradient1.png')  }}" alt="">
    <img class="bgr-gradient gradient2" src="{{ asset('assets/images/backgroup-secsion/bg-gradient2.png')  }}" alt="">
    <img class="bgr-gradient gradient3" src="{{ asset('assets/images/backgroup-secsion/bg-gradient3.png')  }}" alt="">
    <div class="overlay"></div>
    <div class="swiper-container mainslider home auctions">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slider-item">
                    <div class="themesflat-container ">
                        <div class="wrap-heading flat-slider flex">
                            <div class="content">
                                <h2 class="heading m-t-15">Discover, find,
                                </h2>
                                <h1 class="heading mb-style"><span class="tf-text s1">Sell extraordinary</span>
                                </h1>
                                <h1 class="heading">Monster NFTs</h1>
                                <p class="sub-heading mg-t-19 mg-bt-40">Marketplace for monster character cllections non
                                    fungible token NFTs
                                </p>
                                <div class="flat-bt-slider flex style2">
                                    <a href=""
                                        class="sc-button header-slider style style-1 rocket fl-button pri-1"><span>Explore
                                        </span></a>
                                    <a href=""
                                        class="sc-button header-slider style style-1 note fl-button pri-1"><span>Create
                                        </span></a>
                                </div>
                            </div>
                            <div class="wrap-image">
                                <div class="overlay-style2"></div>
                                <img src="{{asset('/images/backgroup-secsion/img_sliderhome7.png')}}" alt="Image">
                            </div>
                        </div>

                    </div>
                </div><!-- item-->
            </div>
            <div class="swiper-slide">
                <div class="slider-item">
                    <div class="themesflat-container ">
                        <div class="wrap-heading flat-slider flex">
                            <div class="content">
                                <h2 class="heading m-t-15">Discover, find,
                                </h2>
                                <h1 class="heading mb-style"><span class="tf-text s1">Sell extraordinary</span>
                                </h1>
                                <h1 class="heading">Monster NFTs</h1>
                                <p class="sub-heading mg-t-19 mg-bt-40">Marketplace for monster character cllections non
                                    fungible token NFTs
                                </p>
                                <div class="flat-bt-slider flex style2">
                                    <a href=""
                                        class="sc-button header-slider style style-1 rocket fl-button pri-1"><span>Explore
                                        </span></a>
                                    <a href=""
                                        class="sc-button header-slider style style-1 note fl-button pri-1"><span>Create
                                        </span></a>
                                </div>
                            </div>
                            <div class="wrap-image">
                                <div class="overlay-style2"></div>
                                <img src="assets/images/backgroup-secsion/img_sliderhome7.png" alt="Image">
                            </div>
                        </div>

                    </div>
                </div><!-- item-->
            </div>
            <div class="swiper-slide">
                <div class="slider-item">
                    <div class="themesflat-container ">
                        <div class="wrap-heading flat-slider flex">
                            <div class="content">
                                <h2 class="heading m-t-15">Discover, find,
                                </h2>
                                <h1 class="heading mb-style"><span class="tf-text s1">Sell extraordinary</span>
                                </h1>
                                <h1 class="heading">Monster NFTs</h1>
                                <p class="sub-heading mg-t-19 mg-bt-40">Marketplace for monster character cllections non
                                    fungible token NFTs
                                </p>
                                <div class="flat-bt-slider flex style2">
                                    <a href=""
                                        class="sc-button header-slider style style-1 rocket fl-button pri-1"><span>Explore
                                        </span></a>
                                    <a href=""
                                        class="sc-button header-slider style style-1 note fl-button pri-1"><span>Create
                                        </span></a>
                                </div>
                            </div>
                            <div class="wrap-image">
                                <div class="overlay-style2"></div>
                                <img src="{{asset('/images/backgroup-secsion/img_sliderhome7.png')}}" alt="Image">
                            </div>
                        </div>

                    </div>
                </div><!-- item-->
            </div>
        </div>
    </div>
</section>

<!-- Người chơi đã thuê -->
@if(auth()->check())
    <section class="tf-section live-auctions home7">
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-live-auctions">
                        <h2 class="tf-title pb-22">
                            Người chơi đã thuê</h2>
                        <a href="" class="exp style2">XEM TẤT CẢ</a>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="swiper-container show-shadow carousel10 pad-t-17 auctions">
                        <div class="swiper-wrapper">
                            @foreach ($userDaThues as $userDaThue)
                                <div class="swiper-slide">
                                    <div class="slider-item">
                                        <div class="sc-card-product menu_card style-h7">
                                            <div class="card-media" style="width: 224px; height: 224px;">
                                                <a href="{{ route('client.taikhoan.show', $userDaThue->nguoiDuocThue->id) }}"><img
                                                        src="{{ \Illuminate\Support\Facades\Storage::url($userDaThue->nguoiDuocThue->anh_dai_dien) }}"
                                                        alt="Image"
                                                        style="width: 100%; height: 100%; object-fit: cover; object-position: center;"></a>
                                                <div class="button-place-bid">
                                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                        data-id="{{ $userDaThue->nguoiDuocThue->id }}"
                                                        class="sc-button style-place-bid style bag fl-button pri-3"><span>Thuê</span></a>
                                                </div>
                                            </div>
                                            <div class="card-title">
                                                <h5><a
                                                        href="{{ route('client.taikhoan.show', $userDaThue->nguoiDuocThue->id) }}">{{ $userDaThue->nguoiDuocThue->ten }}</a>
                                                </h5>
                                            </div>
                                            <div class="meta-info">
                                                <div class="author">
                                                    <div class="info style2">
                                                        <span
                                                            class="pricing">{{number_format($userDaThue->nguoiDuocThue->gia_tien, 0, ',', '.')}}
                                                            VNĐ</span>
                                                    </div>
                                                </div>

                                                {{-- <div class="tags">{{$user->countDanhGia}}<i--}} {{--
                                                        class="fas fa-star f-10 m-l-10 text-c-yellow"></i>({{$user->countRent}})--}}
                                                        {{-- </div>--}}
                                            </div>
                                        </div>
                                    </div><!-- item-->
                                </div>
                            @endforeach

                        </div>
                        <div class="swiper-pagination mg-t-13"></div>
                        <div class="swiper-button-next btn-slide-next active"></div>
                        <div class="swiper-button-prev btn-slide-prev"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@else
    <div style="height: 50px; background: #14141F"></div>
@endif

<!-- Danh mục -->
<section class="tf-section category">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-live-auctions">
                    <h2 class="tf-title pb-39">Danh mục</h2>
                    <a href="{{route('client.danhmuc')}}" class="exp style2">XEM TẤT CẢ</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="swiper-container carousel11">
                    <div class="swiper-wrapper">
                        @foreach ($danhMucs as $danhMuc)
                            <div class="swiper-slide" style="max-width: 160px">
                                <div class="slider-item" style="width: 160px">
                                    <div class="sc-categoty">
                                        <div class="card-media">
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($danhMuc->anh) }}"
                                                 alt="Image" style="min-height:160px">
                                        </div>
                                        <div class="card-title">
                                            <h4 style="font-size: 14px">{{ $danhMuc->ten }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-button-next btn-slide-next active"></div>
                <div class="swiper-button-prev btn-slide-prev"></div>
            </div>
        </div>
    </div>
</section>

<!-- Top Đại Gia -->
<section class="tf-section top-seller home7 bg-style">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="heading-live-auctions">
                    <h2 class="tf-title pb-23">
                        Top Đại Gia</h2>
                    <a href="explore-3.html" class="exp style2 see-all">XEM TẤT CẢ</a>
                </div>
                <div class="flat-tabs seller-tab style2">
                    <ul class="menu-tab">
                        <li class="item-title active">
                            <span class="inner">24 Hours</span>
                        </li>
                        <li class="item-title">
                            <span class="inner">Week</span>
                        </li>
                        <li class="item-title">
                            <span class="inner">Month</span>
                        </li>
                    </ul>
                    <div class="content-tab mg-t-16">
                        <div class="content-inner">
                            <div class="tf-box">
                                @php
                                    $index = 1;
                                @endphp
                                @foreach($taiKhoanDaiGias->chunk(3) as $chunk)
                                    <div class="box-item">
                                        @foreach($chunk as $taiKhoanDaiGia)
                                            <div class="sc-author-box style-3">
                                                <div class="author-style2 flex">
                                                    <div class="author-avatar">
                                                        <a href="#">
                                                            <img src="{{\Illuminate\Support\Facades\Storage::url($taiKhoanDaiGia->anh_dai_dien)}}" alt="Image"
                                                                 class="avatar">
                                                        </a>
                                                        <div class="badge"><i class="ripple"></i></div>
                                                    </div>
                                                    <div class="author-infor">
                                                        <h5><a href="#">{{$taiKhoanDaiGia->ten}}</a></h5>
                                                        <div class="tag">{{$taiKhoanDaiGia->email}}</div>
                                                        <span class="price">{{number_format($taiKhoanDaiGia->daiGia['24h'], 0, ',', '.'}} VND</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <div class="number">#{{$index++}}</div>
                                                    <div class="btn-follow">
                                                        <a href="#">Follow</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="content-inner">
                            <div class="tf-box">
                                @php
                                    $index = 1;
                                @endphp
                                @foreach($taiKhoanDaiGias->chunk(3) as $chunk)
                                    <div class="box-item">
                                        @foreach($chunk as $taiKhoanDaiGia)
                                            <div class="sc-author-box style-3">
                                                <div class="author-style2 flex">
                                                    <div class="author-avatar">
                                                        <a href="#">
                                                            <img src="{{\Illuminate\Support\Facades\Storage::url($taiKhoanDaiGia->anh_dai_dien)}}" alt="Image"
                                                                 class="avatar">
                                                        </a>
                                                        <div class="badge"><i class="ripple"></i></div>
                                                    </div>
                                                    <div class="author-infor">
                                                        <h5><a href="#">{{$taiKhoanDaiGia->ten}}</a></h5>
                                                        <div class="tag">{{$taiKhoanDaiGia->email}}</div>
                                                        <span class="price">{{number_format($taiKhoanDaiGia->daiGia['week']), 0, ','}} VND</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <div class="number">#{{$index++}}</div>
                                                    <div class="btn-follow">
                                                        <a href="#">Follow</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="content-inner">
                            <div class="tf-box">
                                @php
                                    $index = 1;
                                @endphp
                                @foreach($taiKhoanDaiGias->chunk(3) as $chunk)
                                    <div class="box-item">
                                        @foreach($chunk as $taiKhoanDaiGia)
                                            <div class="sc-author-box style-3">
                                                <div class="author-style2 flex">
                                                    <div class="author-avatar">
                                                        <a href="#">
                                                            <img src="{{\Illuminate\Support\Facades\Storage::url($taiKhoanDaiGia->anh_dai_dien)}}" alt="Image"
                                                                 class="avatar">
                                                        </a>
                                                        <div class="badge"><i class="ripple"></i></div>
                                                    </div>
                                                    <div class="author-infor">
                                                        <h5><a href="#">{{$taiKhoanDaiGia->ten}}</a></h5>
                                                        <div class="tag">{{$taiKhoanDaiGia->email}}</div>
                                                        <span class="price">{{number_format($taiKhoanDaiGia->daiGia['month']), 0, ','}} VND</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <div class="number">#{{$index++}}</div>
                                                    <div class="btn-follow">
                                                        <a href="#">Follow</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Top Pick -->
<section class="tf-section live-auctions top-picks style3 home7 mobie-pb-70">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-live-auctions mg-bt-24">
                    <h2 class="tf-title">
                        Top Pick</h2>
                    <a href="{{route('client.topDanhGia')}}" class="exp style2">XEM TẤT CẢ</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="top-pick-box">
                    @foreach($taiKhoans as $taiKhoan)
                        <div class="sc-card-product menu_card style-h7">
                            <div class="card-media">
                                <a href="{{route('client.taikhoan.show', $taiKhoan->id)}}"><img
                                        src="{{\Illuminate\Support\Facades\Storage::url($taiKhoan->anh_dai_dien)}}"
                                        alt="Image" style="min-height: 220px; object-fit:cover"></a>
                            </div>
                            <div class="card-title">
                                <h5><a href="">{{$taiKhoan->ten}}</a></h5>
                            </div>
                            <div class="meta-info">
                                <div class="author">
                                    <div class="info style2">
                                        <span class="pricing">{{number_format($taiKhoan->gia_tien, 0, ',', '.')}} VNĐ</span>
                                    </div>
                                </div>
                                <div class="tags">{{$taiKhoan->countDanhGia}}
                                    <i class="fas fa-star f-10 m-l-10 text-c-yellow"></i>
                                    ({{$taiKhoan->countRent}})
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hot Player -->
<section class="tf-section live-auctions top-picks style3 home7 mobie-pb-70">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-live-auctions mg-bt-24">
                    <h2 class="tf-title">
                        Hot Player</h2>
                    <a href="{{route('client.topHot')}}" class="exp style2">XEM TẤT CẢ</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="top-pick-box">
                    @foreach($taiKhoans2 as $taiKhoan)
                        <div class="sc-card-product menu_card style-h7">
                            <div class="card-media">
                                <a href="{{route('client.taikhoan.show', $taiKhoan->id)}}"><img
                                        src="{{\Illuminate\Support\Facades\Storage::url($taiKhoan->anh_dai_dien)}}"
                                        alt="Image" style="min-height: 220px; object-fit:cover"></a>
                            </div>
                            <div class="card-title">
                                <h5><a href="">{{$taiKhoan->ten}}</a></h5>
                            </div>
                            <div class="meta-info">
                                <div class="author">
                                    <div class="info style2">
                                        <span class="pricing">{{number_format($taiKhoan->gia_tien, 0, ',')}} VNĐ</span>
                                    </div>
                                </div>
                                <div class="tags">{{$taiKhoan->countDanhGia}}
                                    <i class="fas fa-star f-10 m-l-10 text-c-yellow"></i>
                                    ({{$taiKhoan->countRent}})
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Creat NFT -->
<section class="tf-box-icon live-auctions tf-section style7 bg-style">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="heading-live-auctions style2 mg-t-3 mg-bt-22">
                    <h3 class="heading-fill mg-bt-16">Creat NFT</h3>
                    <h2 class="tf-title text-left pb-15">Create And Sell Your NFTs</h2>
                    <p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sollicitudin morbi
                        donec venenatis sed eget pellentesque viverra ut.
                        Elementum nam praesent mauris auctor amet, pulvinar adipiscing ultricies ut.
                        Id dignissim tristique ultrices arcu tempor. Aenean quam odio fringilla amet, imperdiet.
                    </p>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12">
                <div class="sc-box-icon-inner style3">
                    <div class="sc-box-icon">
                        <div class="image">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                xmlns="../../../www.w3.org/2000/svg.html">
                                <rect width="60" height="60" rx="16" fill="#9835FB" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M21.396 25.8881C21.396 23.1621 23.061 21.3951 25.638 21.3951H34.354C36.94 21.3951 38.605 23.1621 38.605 25.8881V31.1901C38.159 30.8121 36.812 29.8711 36.624 29.7591C35.224 28.9191 33.544 29.2991 32.454 30.7191C32.359 30.8441 30.782 33.1441 30.224 33.4881C30.095 33.5681 29.959 33.6111 29.814 33.6311C29.464 33.6611 29.127 33.4811 28.554 33.0981C28.224 32.8881 27.864 32.6491 27.454 32.4791C25.749 31.7661 24.45 32.9441 23.758 33.7341C23.749 33.7421 21.812 36.1041 21.781 36.1411C21.538 35.5501 21.396 34.8671 21.396 34.1021V25.8881ZM40 25.888C40 22.362 37.731 20 34.354 20H25.638C22.271 20 20 22.362 20 25.888V34.102C20 35.674 20.447 37.013 21.238 38.009C21.247 38.018 21.247 38.028 21.256 38.028C22.043 39.013 23.166 39.666 24.519 39.899C24.531 39.901 24.543 39.903 24.556 39.905C24.903 39.962 25.262 40 25.638 40H34.354C34.535 40 34.7 39.966 34.874 39.953C35.078 39.936 35.289 39.932 35.483 39.898C35.74 39.854 35.976 39.777 36.215 39.703C36.319 39.67 36.43 39.65 36.53 39.612C36.773 39.52 36.996 39.401 37.217 39.279C37.297 39.235 37.383 39.199 37.461 39.15C37.678 39.014 37.875 38.855 38.068 38.689C38.132 38.634 38.201 38.584 38.262 38.526C38.45 38.347 38.616 38.15 38.775 37.944C38.824 37.879 38.876 37.819 38.923 37.752C39.076 37.534 39.208 37.299 39.33 37.054C39.364 36.983 39.4 36.914 39.433 36.842C39.546 36.585 39.64 36.316 39.72 36.034C39.741 35.958 39.762 35.883 39.78 35.805C39.851 35.514 39.902 35.214 39.935 34.9C39.939 34.862 39.95 34.827 39.954 34.789C39.961 34.704 39.96 34.619 39.965 34.534C39.973 34.388 40 34.253 40 34.102V25.888Z"
                                    fill="white" />
                                <path
                                    d="M26.5053 28.9995C27.8668 28.9995 29.0005 27.8694 29.0005 26.5145C29.0005 25.8351 28.7156 25.2126 28.2611 24.7609C27.8086 24.2929 27.1768 23.9995 26.4792 23.9995C25.109 23.9995 24.0005 25.1035 24.0005 26.4681C24.0005 26.6486 24.0218 26.8233 24.0596 26.9931C24.2883 28.1252 25.3086 28.9995 26.5053 28.9995Z"
                                    fill="white" fill-opacity="0.4" />
                            </svg>
                        </div>
                        <div class="wrap-box">
                            <h3 class="heading"><a href="connect-wallet.html">Add Your NFTs</a></h3>
                            <p class="content">Sed ut perspiciatis un de omnis iste natus error sit voluptatem
                                accusantium doloremque laudantium, totam rem.</p>
                        </div>
                    </div>
                    <div class="sc-box-icon style2">
                        <div class="image">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                xmlns="../../../www.w3.org/2000/svg.html">
                                <rect width="60" height="60" rx="16" fill="#47A432" />
                                <path
                                    d="M25.104 18H21.048C19.368 18 18 19.38 18 21.0732V25.164C18 26.868 19.368 28.2359 21.048 28.2359H25.104C26.796 28.2359 28.1519 26.868 28.1519 25.164V21.0732C28.1519 19.38 26.796 18 25.104 18Z"
                                    fill="white" />
                                <path
                                    d="M25.104 31.7637H21.048C19.368 31.7637 18 33.1329 18 34.8369V38.9276C18 40.6196 19.368 41.9996 21.048 41.9996H25.104C26.796 41.9996 28.1519 40.6196 28.1519 38.9276V34.8369C28.1519 33.1329 26.796 31.7637 25.104 31.7637Z"
                                    fill="white" />
                                <path
                                    d="M38.9521 18H34.8961C33.2041 18 31.8481 19.38 31.8481 21.0732V25.164C31.8481 26.868 33.2041 28.2359 34.8961 28.2359H38.9521C40.6321 28.2359 42.0001 26.868 42.0001 25.164V21.0732C42.0001 19.38 40.6321 18 38.9521 18Z"
                                    fill="white" fill-opacity="0.4" />
                                <path
                                    d="M38.9521 31.7637H34.8961C33.2041 31.7637 31.8481 33.1329 31.8481 34.8369V38.9276C31.8481 40.6196 33.2041 41.9996 34.8961 41.9996H38.9521C40.6321 41.9996 42.0001 40.6196 42.0001 38.9276V34.8369C42.0001 33.1329 40.6321 31.7637 38.9521 31.7637Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="wrap-box">
                            <h3 class="heading"><a href="connect-wallet.html">Create Your Collection</a></h3>
                            <p class="content">Setting up your NFT collection and creating NFTs on NFTs is easy! This
                                guide explains how to set up your first collection</p>
                        </div>
                    </div>
                    <div class="sc-box-icon">
                        <div class="image">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                xmlns="../../../www.w3.org/2000/svg.html">
                                <rect width="60" height="60" rx="16" fill="#5142FC" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M36.9227 28.0178H41.104C41.5988 28.0178 42 28.3981 42 28.8671V31.8195C41.9942 32.2862 41.5964 32.6633 41.104 32.6688H37.0187C35.8257 32.684 34.7826 31.9098 34.512 30.8084C34.3765 30.1247 34.5667 29.4192 35.0317 28.8809C35.4966 28.3427 36.1888 28.0268 36.9227 28.0178ZM37.1039 31.1219H37.4986C38.0052 31.1219 38.4159 30.7326 38.4159 30.2524C38.4159 29.7722 38.0052 29.3829 37.4986 29.3829H37.1039C36.8616 29.3802 36.6282 29.4695 36.4559 29.631C36.2835 29.7924 36.1866 30.0126 36.1866 30.2423C36.1865 30.7242 36.5956 31.1164 37.1039 31.1219Z"
                                    fill="#F9F9FA" fill-opacity="0.4" />
                                <path
                                    d="M36.9227 26.2788H42C42 22.3154 39.5573 20 35.4187 20H24.5813C20.4427 20 18 22.3154 18 26.2282V34.7718C18 38.6846 20.4427 41 24.5813 41H35.4187C39.5573 41 42 38.6846 42 34.7718V34.4078H36.9227C34.5662 34.4078 32.656 32.5971 32.656 30.3635C32.656 28.1299 34.5662 26.3192 36.9227 26.3192V26.2788Z"
                                    fill="white" />
                                <path
                                    d="M30.4587 26.2788H23.6854C23.177 26.2733 22.768 25.8811 22.7681 25.3992C22.7739 24.9229 23.1829 24.5398 23.6854 24.5398H30.4587C30.9654 24.5398 31.3761 24.9291 31.3761 25.4093C31.3761 25.8895 30.9654 26.2788 30.4587 26.2788Z"
                                    fill="#948BFB" />
                            </svg>
                        </div>
                        <div class="wrap-box">
                            <h3 class="heading"><a href="connect-wallet.html">Set Up Your Wallet</a></h3>
                            <p class="content">Wallet that is functional for NFT purchasing. You may have a Coinbase
                                account at this point, but very few are actually set up to buy an NFT.</p>
                        </div>
                    </div>
                    <div class="sc-box-icon style2">
                        <div class="image">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                xmlns="../../../www.w3.org/2000/svg.html">
                                <rect width="60" height="60" rx="16" fill="#DF4949" />
                                <rect x="23" y="24" width="13" height="4" fill="white" fill-opacity="0.4" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M26.125 18H33.8375C37.225 18 39.9625 19.284 40 22.5478V40.7631C40 40.9671 39.95 41.1711 39.85 41.3511C39.6875 41.6391 39.4125 41.8551 39.075 41.9511C38.75 42.0471 38.3875 41.9991 38.0875 41.8311L29.9875 37.9432L21.875 41.8311C21.6888 41.9259 21.475 41.9871 21.2625 41.9871C20.5625 41.9871 20 41.4351 20 40.7631V22.5478C20 19.284 22.75 18 26.125 18ZM25.2753 27.1437H34.6878C35.2253 27.1437 35.6628 26.7225 35.6628 26.1958C35.6628 25.6678 35.2253 25.2478 34.6878 25.2478H25.2753C24.7378 25.2478 24.3003 25.6678 24.3003 26.1958C24.3003 26.7225 24.7378 27.1437 25.2753 27.1437Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="wrap-box">
                            <h3 class="heading"><a href="connect-wallet.html">List Them For Sale</a></h3>
                            <p class="content">Choose between auctions, fixed-price listings, and declining-price
                                listings. You choose how you want to sell your NFTs!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Collection -->
<section class="tf-section live-auctions style4 home4 live-auctions-style7">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-box-12">
                <div class="heading-live-auctions">
                    <h2 class="tf-title pb-40 text-left">
                        Popular Collection</h2>
                    <a href="explore-3.html" class="exp style2 mg-t-23">EXPLORE MORE</a>
                </div>
            </div>
            <div class="fl-collection fl-item3 col-box-4">
                <div class="sc-card-collection style-2 sc-card-style7">
                    <div class="card-media-h7">
                        <img src="assets/images/box-item/collection-item-17.jpg" alt="">
                    </div>
                    <div class="card-media-h7 style2">
                        <img src="assets/images/box-item/collection-item-18.jpg" alt="">
                        <img src="assets/images/box-item/collection-item-19.jpg" alt="">
                        <img src="assets/images/box-item/collection-item-20.jpg" alt="">
                    </div>
                    <div class="card-bottom">
                        <div class="author">
                            <div class="content">
                                <h5><a href="author01.html">Colorful Abstract</a></h5>
                                <div class="infor">
                                    <span>Created by</span>
                                    <span class="name"><a href="author02.html">Mason Woodward</a></span>
                                </div>
                            </div>
                        </div>
                        <button class="wishlist-button public heart mg-t-6"><span class="number-like">
                                100</span></button>
                    </div>
                    <div class="sc-author-box style-2">
                        <div class="author-avatar">
                            <img src="assets/images/avatar/avt-7.jpg" alt="" class="avatar">
                            <div class="badge"><i class="ripple"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fl-collection fl-item3 col-box-4">
                <div class="sc-card-collection style-2 sc-card-style7">
                    <div class="card-media-h7">
                        <img src="assets/images/box-item/collection-item-21.jpg" alt="">
                    </div>
                    <div class="card-media-h7 style2">
                        <img src="assets/images/box-item/collection-item-22.jpg" alt="">
                        <img src="assets/images/box-item/collection-item-23.jpg" alt="">
                        <img src="assets/images/box-item/collection-item-24.jpg" alt="">
                    </div>
                    <div class="card-bottom">
                        <div class="author">
                            <div class="content">
                                <h5><a href="author01.html">Colorful Abstract</a></h5>
                                <div class="infor">
                                    <span>Created by</span>
                                    <span class="name"><a href="author02.html">Mason Woodward</a></span>
                                </div>
                            </div>
                        </div>
                        <button class="wishlist-button public heart mg-t-6"><span class="number-like">
                                100</span></button>
                    </div>
                    <div class="sc-author-box style-2">
                        <div class="author-avatar">
                            <img src="assets/images/avatar/avt-10.jpg" alt="" class="avatar">
                            <div class="badge"><i class="ripple"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fl-collection fl-item3 col-box-4">
                <div class="sc-card-collection style-2 sc-card-style7">
                    <div class="card-media-h7">
                        <img src="assets/images/box-item/collection-item-25.jpg" alt="">
                    </div>
                    <div class="card-media-h7 style2">
                        <img src="assets/images/box-item/collection-item-18.jpg" alt="">
                        <img src="assets/images/box-item/collection-item-19.jpg" alt="">
                        <img src="assets/images/box-item/collection-item-20.jpg" alt="">
                    </div>
                    <div class="card-bottom">
                        <div class="author">
                            <div class="content">
                                <h5><a href="author01.html">Colorful Abstract</a></h5>
                                <div class="infor">
                                    <span>Created by</span>
                                    <span class="name"><a href="author02.html">Mason Woodward</a></span>
                                </div>
                            </div>
                        </div>
                        <button class="wishlist-button public heart mg-t-6"><span class="number-like">
                                100</span></button>
                    </div>
                    <div class="sc-author-box style-2">
                        <div class="author-avatar">
                            <img src="assets/images/avatar/avt-3.jpg" alt="" class="avatar">
                            <div class="badge"><i class="ripple"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fl-collection fl-item3 col-box-4">
                <div class="sc-card-collection style-2 sc-card-style7">
                    <div class="card-media-h7">
                        <img src="assets/images/box-item/collection-item-17.jpg" alt="">
                    </div>
                    <div class="card-media-h7 style2">
                        <img src="assets/images/box-item/collection-item-18.jpg" alt="">
                        <img src="assets/images/box-item/collection-item-19.jpg" alt="">
                        <img src="assets/images/box-item/collection-item-20.jpg" alt="">
                    </div>
                    <div class="card-bottom">
                        <div class="author">
                            <div class="content">
                                <h5><a href="author01.html">Colorful Abstract</a></h5>
                                <div class="infor">
                                    <span>Created by</span>
                                    <span class="name"><a href="author02.html">Mason Woodward</a></span>
                                </div>
                            </div>
                        </div>
                        <button class="wishlist-button public heart mg-t-6"><span class="number-like">
                                100</span></button>
                    </div>
                    <div class="sc-author-box style-2">
                        <div class="author-avatar">
                            <img src="assets/images/avatar/avt-7.jpg" alt="" class="avatar">
                            <div class="badge"><i class="ripple"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fl-collection fl-item3 col-box-4">
                <div class="sc-card-collection style-2 sc-card-style7">
                    <div class="card-media-h7">
                        <img src="assets/images/box-item/collection-item-21.jpg" alt="">
                    </div>
                    <div class="card-media-h7 style2">
                        <img src="assets/images/box-item/collection-item-22.jpg" alt="">
                        <img src="assets/images/box-item/collection-item-23.jpg" alt="">
                        <img src="assets/images/box-item/collection-item-24.jpg" alt="">
                    </div>
                    <div class="card-bottom">
                        <div class="author">
                            <div class="content">
                                <h5><a href="author01.html">Colorful Abstract</a></h5>
                                <div class="infor">
                                    <span>Created by</span>
                                    <span class="name"><a href="author02.html">Mason Woodward</a></span>
                                </div>
                            </div>
                        </div>
                        <button class="wishlist-button public heart mg-t-6"><span class="number-like">
                                100</span></button>
                    </div>
                    <div class="sc-author-box style-2">
                        <div class="author-avatar">
                            <img src="assets/images/avatar/avt-10.jpg" alt="" class="avatar">
                            <div class="badge"><i class="ripple"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fl-collection fl-item3 col-box-4">
                <div class="sc-card-collection style-2 sc-card-style7">
                    <div class="card-media-h7">
                        <img src="assets/images/box-item/collection-item-25.jpg" alt="">
                    </div>
                    <div class="card-media-h7 style2">
                        <img src="assets/images/box-item/collection-item-18.jpg" alt="">
                        <img src="assets/images/box-item/collection-item-19.jpg" alt="">
                        <img src="assets/images/box-item/collection-item-20.jpg" alt="">
                    </div>
                    <div class="card-bottom">
                        <div class="author">
                            <div class="content">
                                <h5><a href="author01.html">Colorful Abstract</a></h5>
                                <div class="infor">
                                    <span>Created by</span>
                                    <span class="name"><a href="author02.html">Mason Woodward</a></span>
                                </div>
                            </div>
                        </div>
                        <button class="wishlist-button public heart mg-t-6"><span class="number-like">
                                100</span></button>
                    </div>
                    <div class="sc-author-box style-2">
                        <div class="author-avatar">
                            <img src="assets/images/avatar/avt-3.jpg" alt="" class="avatar">
                            <div class="badge"><i class="ripple"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 wrap-inner load-more text-center mg-t9">
                <a href="#" id="loadmore" class="sc-button loadmore fl-button pri-3"><span>Load
                        More</span></a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('modal_user')
<div class="modal fade popup" id="popup_bid" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <form action="{{ route('client.themDonThue') }}" onsubmit="return themDonThue()" method="post">
                @csrf
                <div class="modal-body space-y-20 pd-40">
                    <h3>Thuê người chơi</h3>
                    <input type="hidden" name="user_id" id="userId">
                    <p class="text-center">Người chơi: <span class="price color-popup" id="user_name"></span>
                    </p>

                    <p>Số giờ thuê
                    </p>
                    <select style="color: #0b0b0b; height: 50px; font-size: 16px; border-radius: 10px;"
                        class="form-control no-scroll" name="gio_thue" id="gio_thue" onchange="tinhTongChiPhi()">
                        @for($i = 1; $i <= 24; $i++)
                            <option value="{{ $i }}" style="font-size: 16px;">
                                {{ $i }} giờ
                            </option>
                        @endfor
                    </select>

                    <p>Nội Dung</p>
                    <textarea class="form-control quantity styled-textarea"
                        style="padding-top: 14px; resize: none;font-size: 16px; border-radius: 10px" rows="4"
                        placeholder="Nhập nội dung..." name="noi_dung">{{ old('noi_dung') }}</textarea>
                    <div class="hr"></div>
                    <div class="d-flex justify-content-between">
                        <p> Tổng chi phí:</p>
                        <p class="text-right price color-popup" id="user_gia_tien"></p>
                        <input type="hidden" name="gia_thue" id="gia_thue">
                    </div>
                    <div class="d-flex justify-content-between">
                        <p> Số dư:</p>
                        <p class="text-right price color-popup" id="so_du_auth"></p>
                        <input type="hidden" name="so_du_auth" id="soDuAuth">
                    </div>
                    <!-- <div class="d-flex justify-content-between">
                                <p> Số dữ của bạn:</p>
                                <p class="text-right price color-popup"></p>
                            </div> -->
                    <button type="submit" class="btn btn-primary" style="color: #FFFFFF">Thuê</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script_footer')
<script>
    let giaMoiGio = 0;
    $(document).ready(function () {
        // Khi modal popup được mở
        $('#popup_bid').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Lấy nút "Thuê" đã được click
            var userId = button.data('id'); // Lấy ID người dùng từ thuộc tính data-id

            // Gửi AJAX để lấy dữ liệu người dùng
            $.ajax({
                url: '/modal-user/' + userId,  // Đường dẫn tới API lấy thông tin người dùng
                method: 'GET',
                success: function (data) {
                    // Cập nhật thông tin trong modal với dữ liệu trả về
                    $('#user_id').text(data.id);
                    $('#user_name').text(data.ten);
                    $('#user_biet_danh').text(data.biet_danh);
                    $('#user_ngay_sinh').text(data.ngay_sinh);
                    $('#user_gioi_tinh').text(data.gioi_tinh);
                    $('#user_dia_chi').text(data.dia_chi);
                    $('#user_email').text(data.email);
                    $('#user_sdt').text(data.sdt);
                    $('#user_gia_tien').text(new Intl.NumberFormat('de-DE').format(data.gia_tien) + ' VNĐ');
                    $('#so_du_auth').text(new Intl.NumberFormat('de-DE').format(data.so_du) + ' VNĐ');
                    document.getElementById('soDuAuth').value = data.so_du
                    $('#user_image').attr('src', data.anh_dai_dien);  // Cập nhật ảnh đại diện
                    document.getElementById('userId').value = data.id
                    document.getElementById('gia_thue').value = data.gia_tien

                    giaMoiGio = data.gia_tien;
                },
                error: function () {
                    alert('Không thể tải thông tin người dùng.');
                }
            });
        });
    });

    function tinhTongChiPhi() {
        // Lấy giá trị số giờ thuê
        const gioThue = parseInt(document.getElementById('gio_thue').value) || 0;

        // Tính tổng chi phí
        const tongChiPhi = gioThue * giaMoiGio;

        // Cập nhật hiển thị tổng chi phí
        document.getElementById('user_gia_tien').textContent = tongChiPhi.toLocaleString('vi-VN') + ' VNĐ';
    }

    function themDonThue(){
        const gioThue = parseInt(document.getElementById('gio_thue').value) || 0;
        const tongChiPhi = gioThue * giaMoiGio;

        const user_id = document.getElementById('userId').value;
        const so_du_auth = document.getElementById('soDuAuth').value;

        if (user_id == null){
            alert("Người chơi không tồn tại")
            return false;
        }

        if (so_du_auth < tongChiPhi){
            alert("Số dư của bạn không đủ")
            return false;
        }

        return true;

    }

</script>
@endsection
