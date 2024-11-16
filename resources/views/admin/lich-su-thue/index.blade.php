@extends('admin.layout.app')
@section('script-header')
    <link rel="stylesheet" href="{{asset('assets/plugins/data-tables/css/datatables.min.css')}}">
@endsection
@section('title', 'Quản lí tài khoản')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Zero Configuration</h5>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Người thuê</th>
                                <th>Người được thuê</th>
                                <th>Giá thuê 1h</th>
                                <th>giờ thuê</th>
                                <th>Lợi nhuận</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                               @foreach($lichSuThues as $lichSuThue)
                                   <tr>
                                       <td>{{$loop->iteration}}</td>
                                       <td>{{$lichSuThue->nguoiThue->ten}}</td>
                                       <td>{{$lichSuThue->nguoiDuocThue->ten}}</td>
                                       <td>{{$lichSuThue->gia_thue}}</td>
                                       <td>{{$lichSuThue->gio_thue}}</td>
                                       <td><span class="badge text-bg-{{$lichSuThue->mau}}">{{$lichSuThue->trangThai2}}</span></td>
                                   </tr>
                               @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Người thuê</th>
                                <th>Người được thuê</th>
                                <th>Giá thuê 1h</th>
                                <th>giờ thuê</th>
                                <th>Lợi nhuận</th>
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
    <script src="{{asset('assets/plugins/data-tables/js/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/data-basic-custom.js')}}"></script>
@endsection
