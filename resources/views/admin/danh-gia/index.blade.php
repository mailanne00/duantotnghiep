@extends('admin.layout.app')
@section('script-header')
    <link rel="stylesheet" href="{{asset('assets-admin/plugins/data-tables/css/datatables.min.css')}}">
@endsection
@section('title', 'Quản lí đánh giá')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Danh sách đánh giá</h5>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên người thuê</th>
                                <th>Tên người được thuê</th>
                                <th>Đánh giá</th>
                                <th>Nội dung đánh giá</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($danhGias as $danhGia)
                                <tr>
                                    <th>
                                        {{$loop->iteration}}
                                    </th>
                                    <td>
                                        {{$danhGia->nguoiThue->ten}}
                                    </td>
                                    <td>
                                        {{$danhGia->nguoiDuocThue->ten}}
                                    </td>
                                    <td>{{$danhGia->danh_gia}}</td>
                                    <td>{{$danhGia->noi_dung}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên người thuê</th>
                                <th>Tên người được thuê</th>
                                <th>Đánh giá</th>
                                <th>Nội dung đánh giá</th>
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
