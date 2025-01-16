@extends('admin.layout.app')
@section('script-header')
<link rel="stylesheet" href="{{asset('assets-admin/plugins/data-tables/css/datatables.min.css')}}">
@endsection
@section('title', 'Quản lí tài khoản')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">
                <h5>Danh sách tài khoản</h5>
            </div>
            <div class="row mb-3">
                <div class="row mb-3">

                </div>

            </div>

            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <div class="col-md-12">
                                <form action="{{ route('admin.tai-khoans.index') }}" method="GET" class="row g-2 align-items-center">
                                    <div class="col-md-2">
                                        <label for="gioi_tinh" class="form-label">Giới tính:</label>
                                        <select name="gioi_tinh" id="gioi_tinh" class="form-control">
                                            <option value="">Tất cả</option>
                                            <option value="nam" {{ request('gioi_tinh') == 'nam' ? 'selected' : '' }}>Nam</option>
                                            <option value="nu" {{ request('gioi_tinh') == 'nu' ? 'selected' : '' }}>Nữ</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="gia_tien_min" class="form-label">Giá từ:</label>
                                        <input type="number" name="gia_tien_min" id="gia_tien_min" class="form-control"
                                            value="{{ request('gia_tien_min') }}" placeholder="Tối thiểu">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="gia_tien_max" class="form-label">Đến:</label>
                                        <input type="number" name="gia_tien_max" id="gia_tien_max" class="form-control"
                                            value="{{ request('gia_tien_max') }}" placeholder="Tối đa">
                                    </div>
                                    <div class="col-md-3 d-flex align-items-end">
                                        <button type="submit" class="btn btn-primary me-2">Lọc</button>
                                        <a href="{{ route('admin.tai-khoans.index') }}" class="btn btn-secondary">Xóa lọc</a>
                                    </div>
                                    <style>
                                        .col-md-12{
                                            display: flex;
                                            
                                            justify-content: space-between;
                                        }
                                    </style>
                                </form>
                            </div>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Giới tính</th>
                                <th>Ảnh đại diện</th>
                                <th>Giá thuê 1 giờ</th>
                                <th>Số dư</th>
                                <th>Tình trạng</th>
                                <th>Trạng thái xác thực</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($taiKhoans as $taiKhoan)
                            <tr>
                                <th>
                                    {{$loop->iteration}}
                                </th>
                                <td>
                                    {{$taiKhoan->ten}}
                                </td>
                                <td>
                                    <img style="width: 40px;" src="{{$taiKhoan->gioi_tinh =='nam' ? 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Male_symbol_%28heavy_blue%29.svg/1200px-Male_symbol_%28heavy_blue%29.svg.png' : 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Venus_symbol_%28heavy_copper%29.svg/220px-Venus_symbol_%28heavy_copper%29.svg.png'}}" alt="">
                                </td>
                                <td>
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($taiKhoan->anh_dai_dien)}}" style="width: 100px; height:100px;object-fit:cover; border-radius: 100px;" alt="">
                                </td>
                                <td style="color: #0d8360">
                                    {{number_format($taiKhoan->gia_tien, 0, ',') }} VNĐ
                                </td>
                                <td style="color: #0d8360">
                                    {{number_format($taiKhoan->so_du, 0, ',') }} VNĐ
                                </td>
                                <td>
                                    {!! $taiKhoan->bi_cam==0 ? '<span class="badge text-bg-success">Mở</span>' : '<span class="badge text-bg-danger">Cấm</span>'!!}
                                </td>
                                <td>
                                    {!! $taiKhoan->trang_thai_xac_thuc==1 ? '<span class="badge text-bg-success">Đã xác thực</span>' : '<span class="badge text-bg-danger">Chưa xác thực</span>'!!}
                                </td>
                                <td>
                                    <a href="{{route('admin.tai-khoans.show', $taiKhoan->id)}}" class="btn btn-info">Xem chi tiết</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Giới tính</th>
                                <th>Ảnh đại diện</th>
                                <th>Giá thuê 1 giờ</th>
                                <th>Số dư</th>
                                <th>Tình trạng</th>
                                <th>Trạng thái xác thực</th>
                                <th>Chức năng</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script-footer')
<script src="{{asset('assets-admin/plugins/data-tables/js/datatables.min.js')}}"></script>
<script src="{{asset('assets-admin/js/pages/data-basic-custom.js')}}"></script>
@endsection