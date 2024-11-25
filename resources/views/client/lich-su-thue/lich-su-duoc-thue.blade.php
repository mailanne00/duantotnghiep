@extends('client.layouts.app')

@section('content')
<section class="flat-title-page inner">
    <div class="overlay"></div>
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading mg-bt-12">
                    <h1 class="heading text-center">Lịch Sử Được Thuê</h1>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="index-2.html">Trang chủ</a></li>
                        <li>Lịch Sử Được Thuê</li>
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
                        <div class="column" style="width:200px">
                            <h3>Người Thuê</h3>
                        </div>
                        <div class="column" style="width:100px">
                            <h3>Giờ thuê</h3>
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
                        <div class="column" style="width:200px">
                            <h3>Action</h3>
                        </div>
                    </div>
                    @foreach ($users as $user)
                        <div class="fl-blog fl-item2">
                            <div class="item flex">
                                <div class="infor-item flex column1" style="width:300px">
                                    <div class="media">
                                        <img src="{{ Storage::url($user->nguoiThue->anh_dai_dien) }}" alt="Images">
                                    </div>
                                    <div class="content-collection pad-t-4">
                                        <h5 class="title mb-15"><a href="item-details.html">{{ $user->nguoiThue->ten }}</a></h5>
                                        <div class="author flex">
                                            <!-- <div class="author-avatar">
                                                <img src="assets/images/avatar/author_rank.jpg" alt="Images">
                                                <div class="badge"><i class="ripple"></i></div>
                                            </div> -->
                                            <div class="content">
                                                <!-- <p>{{ $user->nguoiDuocThue->biet_danh }}</p> -->
                                                <h6><a href="#">{{ $user->nguoiThue->biet_danh }}</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column" style="width:200px">
                                    <span>{{ $user->nguoiThue->ten }}</span>
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
                                <form action="{{ route('client.suaTrangThaiDonThue', $user->nguoiDuocThue->id) }}">
                                <div class="column td6" style="width:200px">
                                    <span>
                                    <select name="trang_thai" id="">
                                        <option value="0">Đang chờ xử lí</option>
                                        <option value="3">Đang thực hiện</option>
                                        <option value="2">Bị huỷ</option>
                                        <option value="1">Thành công</option>
                                    </select>
                                    </span>
                                </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-12 wrap-inner load-more text-center mg-t16">
                    <a href="#" id="loadmore" class="sc-button loadmore fl-button pri-3"><span>Xem Thêm</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
