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
                                    <img src="{{ Storage::url($user->nguoiThue->anh_dai_dien) }}" alt="Images" style="width:80px; object-fit:cover">
                                </div>
                                <div class="content-collection pad-t-4">
                                    <h5 class="title mb-15" style="transform: translateY(25px);"><a href="item-details.html">{{ $user->nguoiThue->ten }}</a></h5>
                                </div>
                            </div>
                            <div class="column" style="min-width:180px">
                                <span style="font-size:15px">{{ $user->created_at }}</span>
                            </div>
                            <div class="column td2" style="max-width:150px; padding-left: unset">
                                <span style="font-size:17px">{{ $user->gio_thue }} giờ</span>
                            </div>
                            <div class="column td3" style="max-width:180px; padding-left: unset">
                                <span style="font-size:17px">{{number_format($user->gia_thue, 0 ,',','.')}} VNĐ</span>
                            </div>
                            <div class="column td4" style="max-width:180px; padding-left: unset; ">
                                <span style="font-size:17px; color: lightblue">{{number_format($user->gio_thue*$user->gia_thue, 0 , ',','.')}} VNĐ</span>
                            </div>
                            <div class="column td5" style="width:200px; text-align: unset;">
                                <span style="font-size: 16px;" class="text-{{$user->mau}}">{{$user->trangThai2}}</span>
                            </div>
                            <div class="column td6" style="width:200px; text-align: unset">
                                @if ($user->trang_thai == '0')
                                <div style="display:flex">
                                    <form action="{{route('client.huyDonThue', $user->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" style="font-size: 15px;">Từ chối</button>
                                    </form>
                                    <form action="{{route('client.nhanDonThue', $user->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success" style="font-size: 15px; margin-left:15%">Chấp nhận</button>
                                    </form>
                                </div>
                                @else
                                
                                @endif
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