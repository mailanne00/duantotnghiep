@extends('client.layouts.app')

@section('content')
<section class="flat-title-page inner">
    <div class="overlay"></div>
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading mg-bt-12">
                    <h1 class="heading text-center">Tài Khoản</h1>
                </div>
                <div class="breadcrumbs style2">
                    <ul>
                        <li><a href="{{route('client.index')}}">Trang chủ</a></li>
                        <li><a href="{{route('client.taikhoan')}}">Tài Khoản</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="tf-section sc-explore-1">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrap-box explore-1 flex mg-bt-40">
                    <div class="seclect-box style-1">
                        <div id="item_category" class="dropdown">
                            <a href="#" class="btn-selector nolink">All categories</a>
                            <ul>
                                <li><span>Art</span></li>
                                <li class="active"><span>Music</span></li>
                                <li><span>Domain Names</span></li>
                                <li><span>Virtual World</span></li>
                                <li><span>Trading Cards</span></li>
                                <li><span>Sports</span></li>
                                <li><span>Utility</span></li>
                            </ul>
                        </div>
                        <div id="buy" class="dropdown">
                            <a href="#" class="btn-selector nolink">Giới tính</a>
                            <ul>
                                <li><span>Giới tính</span></li>
                                <li><span>Nam</span></li>
                                <li><span>Nữ</span></li>
                                <li><span>Khác</span></li>
                            </ul>
                        </div>
                        <div id="all-items" class="dropdown">
                            <a href="#" class="btn-selector nolink">All Items</a>
                            <ul>
                                <li><span>Single Items</span></li>
                                <li><span>Bundles</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="seclect-box style-2 box-right">
                        <div id="artworks" class="dropdown">
                            <a href="#" class="btn-selector nolink">All Artworks</a>
                            <ul>
                                <li><span>Abstraction</span></li>
                                <li><span>Skecthify</span></li>
                                <li><span>Patternlicious</span></li>
                                <li><span>Virtuland</span></li>
                                <li><span>Papercut</span></li>
                            </ul>
                        </div>
                        <div id="sort-by" class="dropdown">
                            <a href="#" class="btn-selector nolink">Sort by</a>
                            <ul>
                                <li><span>Top rate</span></li>
                                <li><span>Mid rate</span></li>
                                <li><span>Low rate</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($taiKhoans as $taiKhoan)
            <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="sc-card-product">
                    <div class="card-media" style="width: 224px; height: 224px;">
                        <a href="{{ route('client.taikhoan.show', $taiKhoan->id) }}">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($taiKhoan->anh_dai_dien) }}" 
                            alt="Ảnh"
                            style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                        </a>
                        <button class="wishlist-button heart"><span class="number-like"> 100</span></button>
                    </div>
                    <div class="card-title">
                        <h5 class="style2"><a href="item-details.html">{{ $taiKhoan->ten }}</a></h5>
                    </div>
                    <div class="meta-info">
                        <div class="price">
                            <h5>{{number_format($taiKhoan->gia_tien, 0, ',', '.')}} VNĐ</h5>
                        </div>
                        <div class="author">
                            <div class="info">
                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            @endforeach
            <div class="col-md-12 wrap-inner load-more text-center">
                <a href="#" id="loadmore" class="sc-button loadmore fl-button pri-3"><span>XEM THÊM</span></a>
            </div>
        </div>
    </div>
</div>
@endsection