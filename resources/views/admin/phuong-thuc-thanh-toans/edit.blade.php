@extends('admin.layouts.app')

@section('title', 'Đây là trang sửa')

@section('content')

<div class="row custom-color">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Sửa phương thức thanh toán</h5>
            </div>
            <div class="card-body">
                <div class="col12">
                    <form action="{{route('admin.phuongthucthanhtoans.update', $phuongthucthanhtoan->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" for="exampleInputEmail1">Tên phương thức</label>
                                <input type="text" name="ten_phuong_thuc" class="form-control" value="{{$phuongthucthanhtoan -> ten_phuong_thuc}}">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Số tài khoản</label>
                                <input type="text" name="so_tai_khoan" class="form-control" value="{{$phuongthucthanhtoan -> so_tai_khoan}}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label class="form-label" for="exampleInputEmail1">Logo</label>
                                <input type="file" name="logo" class="form-control">
                                <div>
                                    <img src="{{Storage::url($phuongthucthanhtoan->logo)}}" alt="" class="mt-3" width="100px">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Mô tả</label>
                                <input type="text" name="mo_ta" class="form-control" value="{{$phuongthucthanhtoan -> mo_ta}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- [ form-element ] end -->
</div>

@endsection