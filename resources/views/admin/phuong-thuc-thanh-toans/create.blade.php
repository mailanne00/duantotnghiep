@extends('admin.layouts.app')

@section('content')

<div class="row custom-color">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Thêm phương thức thanh toán</h5>
            </div>
            <div class="card-body">
                <div class="col12">
                    <form action="{{route('admin.phuongthucthanhtoans.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" for="exampleInputEmail1">Tên phương thức</label>
                                <input type="text" name="ten_phuong_thuc" class="form-control" placeholder="Ten phuong thuc" value="{{old('ten_phuong_thuc')}}">
                                @error('ten_phuong_thuc')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Số tài khoản</label>
                                <input type="text" name="so_tai_khoan" class="form-control" placeholder="So tai khoan" value="{{old('so_tai_khoan')}}">
                                @error('so_tai_khoan')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label class="form-label" for="exampleInputEmail1">Logo</label>
                                <input type="file" name="logo" class="form-control">
                                @error('logo')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Mô tả</label>
                                <input type="text" name="mo_ta" class="form-control" placeholder="Mo ta" value="{{old('mo_ta')}}">
                                @error('mo_ta')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
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