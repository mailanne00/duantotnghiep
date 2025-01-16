@extends('admin.layout.app')
@section('script-header')
<link rel="stylesheet" href="{{asset('assets-admin/plugins/data-tables/css/datatables.min.css')}}">
@endsection
@section('title', 'Quản lí nạp tiền')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Danh sách nạp tiền</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên người nạp</th>
                                <th>Số tiền nạp</th>
                                <th>Ngày nạp</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lichSuNaps as $lichSuNap)
                            <tr>
                                <th>
                                    {{$loop->iteration}}
                                </th>
                                <td>
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($lichSuNap->nguoiNap->anh_dai_dien)}}" style="width: 80px; border-radius: 10px;" alt="">
                                </td>
                                <td>
                                    {{$lichSuNap->nguoiNap->ten}}
                                </td>
                                <td class="text-success">
                                    {{number_format($lichSuNap->so_tien,0,'.')}} VNĐ
                                </td>
                                <td>
                                    {{$lichSuNap->created_at}}
                                </td>
                                @if ($lichSuNap->trang_thai == 'Đã thanh toán')
                                <td class="text-success">Thành công</td>
                                @elseif($lichSuNap->trang_thai == 'Đang chờ xử lý')
                                <td class="text-warning">Đang chờ xử lý</td>
                                @else
                                <td class="text-danger">Thất bại</td>
                                @endif

                                <td>Xem chi tiết</td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên người nạp</th>
                                <th>Số tiền nạp</th>
                                <th>Ngày nạp</th>
                                <th>Trạng thái</th>
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