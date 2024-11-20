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
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Giới tính</th>
                                <th>Ảnh đại diện</th>
                                <th>Số dư</th>
                                <th>Tình trạng</th>
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
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($taiKhoan->anh_dai_dien)}}" style="width: 100px; border-radius: 100px;" alt="">
                                </td>
                                <td style="color: #0d8360">
                                    {{number_format($taiKhoan->so_du, 0, ',') }} VNĐ
                                </td>
                                <td>
                                    {!! $taiKhoan->bi_cam==0 ? '<span class="badge text-bg-success">Mở</span>' : '<span class="badge text-bg-danger">Cấm</span>'!!}
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
                                <th>Số dư</th>
                                <th>Tình trạng</th>
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
