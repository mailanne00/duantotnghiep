@extends('admin.layouts.app')
@section('title', 'Chi tiết đơn nạp - '.$quanLiNapTien->ma_don_nap)

@section('content')

<div class="row custom-color">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>chi tiết đơn nạp -- <span class="badge text-bg-{{$quanLiNapTien->mau}}">
                        {{$quanLiNapTien->trang_thai_thanh_toan}}
                    </span></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <form action="{{route('admin.quan-li-nap-tiens.update', $quanLiNapTien->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Phương thức thanh toán</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email" value="{{$quanLiNapTien->phuong_thuc->ten_phuong_thuc}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"
                                    for="exampleInputPassword1">Số tiền</label>
                                <input type="text" class="form-control"
                                    id="exampleInputPassword1" placeholder="..." value="{{number_format($quanLiNapTien->so_tien, 0, ',', '.')}} VNĐ" disabled>
                            </div>
                            @if($quanLiNapTien->phuong_thuc->ten_phuong_thuc == 'Nạp qua tài khoản ngân hàng')
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Số tài khoản cần chuyển</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Số seri" value="{{$quanLiNapTien->so_tai_khoan}}" disabled>
                            </div>
                            @endif
                            @if($quanLiNapTien->trang_thai_thanh_toan == 'Đang chờ xử lí')
                                <input type="submit" onclick="return confirm('Bạn có chắc chắn muốn duyệt đơn này ?')" class="btn btn-primary mb-4" name="btnDuyet" value="Duyệt">
                                <input type="submit" onclick="return confirm('Bạn có chắc chắn muốn huỷ đơn này ?')" class="btn btn-danger mb-4" name="btnHuy" value="Huỷ">
                            @endif
                        </form>
                    </div>
                    <div class="col-md-6">
                        @if($quanLiNapTien->phuong_thuc->ten_phuong_thuc == 'Nạp qua tài khoản ngân hàng')
                        <img class="mb-3" src="https://inkythuatso.com/uploads/thumbnails/800/2023/03/hinh-anh-chuyen-tien-thanh-cong-vi-momo-1-07-12-32-36.jpg" alt="" style="width: 200px;">
                        @else
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">Số seri</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Số seri" value="{{$quanLiNapTien->so_seri}}" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">Mã thẻ cào</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Mã thẻ cào" value="{{$quanLiNapTien->ma_the_cao}}" disabled>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
