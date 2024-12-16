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
<section class="tf-section live-auctions top-picks style3 home7 mobie-pb-70">
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
                            <a href="#" class="btn-selector nolink">{{ request('gioi_tinh') ?? 'Giới tính' }}</a>
                            <ul>
                                <li>
                                    <a href="{{ request()->fullUrlWithoutQuery(['gioi_tinh']) }}"><span>Giới
                                            tính</span></a>
                                </li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gioi_tinh' => 'Nam']) }}"><span>Nam</span></a>
                                </li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gioi_tinh' => 'Nữ']) }}"><span>Nữ</span></a>
                                </li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gioi_tinh' => 'Khác']) }}"><span>Khác</span></a>
                                </li>
                            </ul>
                        </div>
                        <div id="all-items" class="dropdown">
                            <a href="#" class="btn-selector nolink">{{ request('gia') ?? 'Giá' }}</a>
                            <ul>
                                <li><a href="{{ request()->fullUrlWithoutQuery(['gia']) }}"><span>Giá</span></a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['gia' => '0-100.000']) }}"><span>0 -
                                            100.000 VNĐ</span></a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['gia' => '100.000-300.000']) }}"><span>100.000
                                            - 300.000 VNĐ</span></a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['gia' => '300.000-500.000']) }}"><span>300.000
                                            - 500.000 VNĐ</span></a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['gia' => '>500.000']) }}"><span>Trên
                                            500.000 VNĐ</span></a></li>
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
                                <div class="tags">{{$taiKhoan->countDanhGia}} <i
                                        class="fas fa-star f-10 m-l-10 text-c-yellow"></i>({{$taiKhoan->countRent}})</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-12 wrap-inner load-more text-center">
                <a href="#" id="loadmore" class="sc-button loadmore fl-button pri-3"><span>XEM THÊM</span></a>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

@section('script_footer')
<script>

</script>
@endsection