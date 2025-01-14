@extends('client.layouts.app')o
@section('title', 'Lịch sử thuê')
@section('css')
<style>
    .table-ranking .item .column span {
        font-size: 17px;
    }

    .table-ranking .th-title {
        justify-content: unset;
    }
</style>
@endsection
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
                    <div class="flex th-title" style="padding: 20px 27px 20px 20px">
                        <div class="column1" style="width:200px;">
                            <h3>Người Được Thuê</h3>
                        </div>
                        <div class="column" style="width:200px">
                            <h3>Thời gian tạo</h3>
                        </div>
                        <div class="column" style="width:160px">
                            <h3>Số giờ thuê</h3>
                        </div>
                        <div class="column" style="width:175px">
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
                            <div class="infor-item flex column1" style="width: 200px !important;">
                                <div class="media">
                                    <img src="{{ Storage::url($user->nguoiDuocThue->anh_dai_dien) }}" alt="Images"
                                        style="width:80px; object-fit:cover">
                                </div>
                                <div class="content-collection pad-t-4">
                                    <h5 class="title mb-15" style="transform: translateY(25px);"><a
                                            href="item-details.html">{{ $user->nguoiDuocThue->ten }}</a></h5>
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
                            <div class="column" style="width:200px">
                                <span>{{ $user->created_at }}</span>
                            </div>
                            <div class="column td2" style="width:160px; padding-left: unset">
                                <span>{{ $user->gio_thue }} Giờ</span>
                            </div>
                            <div class="column td3" style="width:175px; padding-left: unset">
                                <span>{{number_format($user->gia_thue, 0, ',', '.')}} VNĐ</span>
                            </div>
                            <div class="column td4" style="width:200px; padding-left: unset; ">
                                <span
                                    style="color: lightblue">{{number_format($user->gio_thue * $user->gia_thue, 0, ',', '.')}}
                                    VNĐ</span>
                            </div>
                            <div class="column td5" style="width:200px; text-align: unset;">
                                <span style="font-size: 15px;" class="text-{{$user->mau}}">{{$user->trangThai2}}</span>
                            </div>
                            <div class="column td6" style="width:200px; text-align: unset">
                                @if ($user->trang_thai == '0')
                                <form action="{{route('client.huyDonThue', $user->id)}}" method="post"
                                    onsubmit="return confirm('Bạn có chắc chắn muốn huỷ đơn thuê này không?')">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" style="font-size: 15px;">Huỷ đơn
                                        thuê</button>
                                </form>
                                @elseif ($user->trang_thai == '3')
                                <form action="{{route('client.ketThucDonThue', $user->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$user->nguoiDuocThue->id}}" name="user_id">
                                    <button type="submit" class="btn btn-success" style="font-size: 15px;">Kết thúc đơn
                                        thuê</button>
                                </form>
                                @else

                                @endif

                                <button type="button" class="btn btn-primary" style="font-size: 15px;"
                                    data-toggle="modal" data-target="#modalChiTiet_{{ $user->id }}">
                                    Chi tiết
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Chi tiết -->
                    <div class="modal fade popup" id="modalChiTiet_{{ $user->id }}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="modal-body pd-40">
                                    <h3 class="text-center mb-5">Chi tiết đơn thuê</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-between mb-3 align-items-center">
                                                <div class="modal-info">
                                                    <p>Ảnh:</p>
                                                </div>
                                                <div class="modal-info text-right">
                                                    <img src="{{ Storage::url($user->nguoiDuocThue->anh_dai_dien) }}"
                                                        alt="Images" style="width:80px; height:80px; object-fit:cover">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class="modal-info">
                                                    <p>Người được thuê:</p>
                                                </div>
                                                <div class="modal-info text-right">
                                                    <span
                                                        class="price color-popup">{{ $user->nguoiDuocThue->ten }}</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class="modal-info">
                                                    <p>Biệt danh:</p>
                                                </div>
                                                <div class="modal-info text-right">
                                                    <span
                                                        class="price color-popup">{{ $user->nguoiDuocThue->biet_danh }}</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class="modal-info">
                                                    <p>Thời gian tạo:</p>
                                                </div>
                                                <div class="modal-info text-right">
                                                    <span class="price color-popup">{{ $user->created_at }}</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class="modal-info">
                                                    <p>Thời gian kết thúc:</p>
                                                </div>
                                                <div class="modal-info text-right">
                                                    <span
                                                        class="price color-popup">{{ $user->thoi_gian_ket_thuc }}</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class="modal-info">
                                                    <p>Trạng thái:</p>
                                                </div>
                                                <div class="modal-info text-right">
                                                    <span
                                                        class="text-{{ $user->mau }} price color-popup">{{ $user->trangThai2 }}</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class="modal-info">
                                                    <p>Số giờ thuê:</p>
                                                </div>
                                                <div class="modal-info text-right">
                                                    <span class="price color-popup">{{ $user->gio_thue }} giờ</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class="modal-info">
                                                    <p>Giá thuê:</p>
                                                </div>
                                                <div class="modal-info text-right">
                                                    <span
                                                        class="price color-popup">{{ number_format($user->gia_thue, 0, ',', '.') }}
                                                        VNĐ</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class="modal-info">
                                                    <p>Tổng chi phí:</p>
                                                </div>
                                                <div class="modal-info text-right">
                                                    <span
                                                        class="price color-popup">{{ number_format($user->gio_thue * $user->gia_thue, 0, ',', '.') }}
                                                        VNĐ</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
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

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@endsection