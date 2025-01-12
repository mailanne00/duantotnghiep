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
                    <div class="flex th-title" style="padding: 20px 27px 20px 20px">
                        <div class="column1" style="max-width:260px">
                            <h3>Người thuê</h3>
                        </div>
                        <div class="column" style="min-width:200px">
                            <h3>Thời gian tạo</h3>
                        </div>
                        <div class="column" style="min-width:160px">
                            <h3>Số giờ thuê</h3>
                        </div>
                        <div class="column" style="min-width:180px">
                            <h3>Giá thuê</h3>
                        </div>
                        <div class="column" style="min-width:180px">
                            <h3>Tổng chi phí</h3>
                        </div>
                        <div class="column" style="min-width:180px">
                            <h3>Trạng thái</h3>
                        </div>
                        <div class="column" style="min-width:200px">
                            <h3>Action</h3>
                        </div>
                    </div>
                    @foreach ($users as $user)
                        <div class="fl-blog fl-item2">
                            <div class="item flex">
                                <div class="infor-item flex column1" style="width: 280px !important;">
                                    <div class="media">
                                        <img src="{{ Storage::url($user->nguoiThue->anh_dai_dien) }}" alt="Images"
                                            style="width:80px; object-fit:cover">
                                    </div>
                                    <div class="content-collection pad-t-4">
                                        <h5 class="title mb-15" style="transform: translateY(25px);"><a
                                                href="item-details.html">{{ $user->nguoiThue->ten }}</a></h5>
                                    </div>
                                </div>
                                <div class="column" style="min-width:180px">
                                    <span style="font-size:15px">{{ $user->created_at }}</span>
                                </div>
                                <div class="column td2" style="max-width:150px; padding-left: unset">
                                    <span style="font-size:17px">{{ $user->gio_thue }} giờ</span>
                                </div>
                                <div class="column td3" style="max-width:180px; padding-left: unset">
                                    <span style="font-size:17px">{{number_format($user->gia_thue, 0, ',', '.')}} VNĐ</span>
                                </div>
                                <div class="column td4" style="max-width:180px; padding-left: unset; ">
                                    <span
                                        style="font-size:17px; color: lightblue">{{number_format($user->gio_thue * $user->gia_thue, 0, ',', '.')}}
                                        VNĐ</span>
                                </div>
                                <div class="column td5" style="width:200px; text-align: unset;">
                                    <span style="font-size: 16px;" class="text-{{$user->mau}}">{{$user->trangThai2}}</span>
                                </div>
                                <div class="column td6" style="width:200px; text-align: unset">
                                    @if ($user->trang_thai == '0')
                                        <div style="display:flex">
                                            <form action="{{route('client.tuChoiDonThue', $user->id)}}" method="post"
                                                onsubmit="return confirm('Bạn có chắc chắn muốn từ chối đơn thuê này không?')">
                                                @csrf
                                                <input type="hidden" value="{{$user->nguoiThue->id}}" name="tai_khoan_id">
                                                <button type="submit" class="btn btn-danger" style="font-size: 15px;">Từ
                                                    chối</button>
                                            </form>
                                            <form action="{{route('client.nhanDonThue', $user->id)}}" method="post"
                                                onsubmit="return confirm('Bạn có chắc chắn muốn nhận đơn thuê này không?')">
                                                @csrf
                                                <button type="submit" class="btn btn-success"
                                                    style="font-size: 15px; margin-left:15%">Chấp nhận</button>
                                            </form>
                                        </div>
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
                                                <div class="d-flex justify-content-between mb-3">
                                                    <div class="modal-info">
                                                        <p>Người thuê:</p>
                                                    </div>
                                                    <div class="modal-info text-right">
                                                        <span
                                                            class="price color-popup">{{ $user->nguoiThue->ten }}</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <div class="modal-info">
                                                        <p>Biệt danh:</p>
                                                    </div>
                                                    <div class="modal-info text-right">
                                                        <span
                                                            class="price color-popup">{{ $user->nguoiThue->biet_danh }}</span>
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
                                                <div class="d-flex justify-content-between mb-3">
                                                    <div class="modal-info">
                                                        <p>Tổng tiền nhận:</p>
                                                    </div>
                                                    <div class="modal-info text-right">
                                                        <span
                                                            class="price color-popup">{{ number_format($user->tong_tien_nhan, 0, ',', '.') }}
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