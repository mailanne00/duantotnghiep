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
                <div class="col-xl-3 col-md-12">
                    <div class="content-left" style="width:300px; margin-left: 15%">
                        <div class="media">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($player->anh_dai_dien) }}" alt=""
                                width="600px">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="content-right">
                        <div class="sc-item-details">
                            <h2 class="style2">{{ $player->ten }}</h2>
                            <div class="meta-item">
                                <div class="left">

                                </div>
                                <div class="right">
                                    <span class="liked heart mg-l-8"><span
                                            class="">Theo dõi</span></span>
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

                            <div class="flat-tabs themesflat-tabs">
                                <ul class="menu-tab tab-title">
                                    <li class="item-title">
                                        <span class="inner">Thông tin</span>
                                    </li>
                                </ul>
                                <div class="content-tab">
                                    <div class="content-inner tab-content">
                                        <div class="provenance">
                                            <p>noi dung.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-12">
                    <div class="content-right">
                        <div class="sc-item-details">
                            <div class="meta-item-details style2">
                                <div class="item meta-price w-100">
                                    <span class="heading">Giá Thuê</span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /tf item details -->

    <div class="danh-gia-list">
    @foreach ($danhGias as $danhGia)
        <div class="danh-gia-item p-3 mb-4 border rounded bg-white shadow-sm">
            <!-- Thông tin ngôi sao -->
            <div class="d-flex align-items-center mb-2">
                <div class="danh-gia-stars me-2">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $danhGia->danh_gia)
                            <i class="fas fa-star text-warning"></i>
                        @else
                            <i class="far fa-star text-muted"></i>
                        @endif
                    @endfor
                </div>
                <!-- <strong class="text-muted fs-6">{{ $danhGia->danh_gia }} sao</strong> -->
            </div>

            <!-- Nội dung bình luận -->
            <p class="mb-2 text-secondary" style="line-height: 1.6;">
                {{ $danhGia->noi_dung }}
            </p>

            <!-- Tên người dùng và ngày -->
            <div class="d-flex justify-content-between text-muted fs-6">
                <span>Đánh giá bởi: <strong>{{ $danhGia->nguoiThue->ten }}</strong></span>
                <!--  -->
            </div>
        </div>
    @endforeach

    @if ($danhGias->isEmpty())
        <p class="text-center text-muted">Chưa có đánh giá nào.</p>
    @endif
</div>




</div>

@endsection
