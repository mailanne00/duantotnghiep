@extends('client.layouts.app')

@section('content')
<section class="flat-title-page inner">
    <div class="overlay"></div>
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading mg-bt-12">
                    <h1 class="heading text-center">Lịch Sử Thuê</h1>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{ route('client.index') }}">Trang chủ</a></li>
                        <li>Lịch Sử Thuê</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tf-section tf-rank">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="table-ranking">
                    <div class="flex th-title">
                        <div class="column1" style="width:300px">
                            <h3>Số thứ tự</h3>
                        </div>
                        <div class="column" style="width:300px">
                            <h3>Người Được Thuê</h3>
                        </div>
                        <div class="column" style="width:100px">
                            <h3>Số giờ thuê</h3>
                        </div>
                        <div class="column" style="width:200px">
                            <h3>Giá thuê</h3>
                        </div>
                        <div class="column" style="width:200px">
                            <h3>Tổng chi phí</h3>
                        </div>
                        <div class="column" style="width:200px">
                            <h3>Trạng thái</h3>
                        </div>
                    </div>
                    @foreach ($users as $user)
                        <div class="fl-blog fl-item2">
                            <div class="item flex">
                                <div class="infor-item flex column1">
                                    <div class="media">
                                        <img src="{{ Storage::url($user->nguoiDuocThue->anh_dai_dien) }}" alt="Images" style="height:80px">
                                    </div>
                                    <div class="content-collection pad-t-4">
                                        <h5 class="title mb-15"><a href="item-details.html">{{ $user->nguoiDuocThue->ten }}</a></h5>
                                        <div class="author flex">
                                            <!-- <div class="author-avatar">
                                                <img src="assets/images/avatar/author_rank.jpg" alt="Images">
                                                <div class="badge"><i class="ripple"></i></div>
                                            </div> -->
                                            <div class="content">
                                                <!-- <p>{{ $user->nguoiDuocThue->biet_danh }}</p> -->
                                                <h6><a href="#">{{ $user->nguoiDuocThue->biet_danh }}</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column" style="width:300px">
                                    <span>{{ $user->nguoiDuocThue->ten }}</span>
                                </div>
                                <div class="column td2" style="width:100px">
                                    <span>{{ $user->gio_thue }}</span>
                                </div>
                                <div class="column td3" style="width:200px">
                                    <span>{{number_format($user->gia_thue, 0 ,',','.')}} VNĐ</span>
                                </div>
                                <div class="column td4" style="width:200px">
                                    <span>{{number_format($user->gio_thue*$user->gia_thue, 0 , ',','.')}} VNĐ</span>
                                </div>
                                <div class="column td5" style="width:200px">
                                    <span class="badge text-bg-{{$user->mau}}">{{$user->trangThai2}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="fl-blog fl-item2">
                        <div class="item flex">
                            <div class="infor-item flex column1">
                                <div class="media">
                                    <img src="assets/images/box-item/img1rank.jpg" alt="Images">
                                </div>
                                <div class="content-collection pad-t-4">
                                    <h5 class="title mb-15"><a href="item-details.html">"Hamlet Contemplates Yorick's
                                            Yorick's</a></h5>
                                    <div class="author flex">
                                        <div class="author-avatar">
                                            <img src="assets/images/avatar/author_rank.jpg" alt="Images">
                                            <div class="badge"><i class="ripple"></i></div>
                                        </div>
                                        <div class="content">
                                            <p>Owned By</p>
                                            <h6><a href="author01.html">SalvadorDali</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <span>12,4353</span>
                            </div>
                            <div class="column td2">
                                <span>+3456%</span>
                            </div>
                            <div class="column td3">
                                <span>-564%</span>
                            </div>
                            <div class="column td4">
                                <span>12,4353 ETH</span>
                            </div>
                            <div class="column td5">
                                <span>3.3k</span>
                            </div>
                            <div class="column td6">
                                <span>23k</span>
                            </div>
                        </div>
                    </div>
                    <div class="fl-blog fl-item2">
                        <div class="item flex">
                            <div class="infor-item flex column1">
                                <div class="media">
                                    <img src="assets/images/box-item/img2rank.jpg" alt="Images">
                                </div>
                                <div class="content-collection pad-t-4">
                                    <h5 class="title mb-15"><a href="item-details.html">"Hamlet Contemplates Yorick's
                                            Yorick's</a></h5>
                                    <div class="author flex">
                                        <div class="author-avatar">
                                            <img src="assets/images/avatar/author_rank.jpg" alt="Images">
                                            <div class="badge"><i class="ripple"></i></div>
                                        </div>
                                        <div class="content">
                                            <p>Owned By</p>
                                            <h6><a href="author01.html">SalvadorDali</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <span>12,4353</span>
                            </div>
                            <div class="column td2">
                                <span>+3456%</span>
                            </div>
                            <div class="column td3">
                                <span>-564%</span>
                            </div>
                            <div class="column td4">
                                <span>12,4353 ETH</span>
                            </div>
                            <div class="column td5">
                                <span>3.3k</span>
                            </div>
                            <div class="column td6">
                                <span>23k</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 wrap-inner load-more text-center mg-t16">
                    <a href="#" id="loadmore" class="sc-button loadmore fl-button pri-3"><span>Xem Thêm</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection