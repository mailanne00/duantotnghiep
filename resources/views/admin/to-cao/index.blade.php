@extends('admin.layout.app')
@section('script-header')
    <link rel="stylesheet" href="{{asset('assets-admin/plugins/data-tables/css/datatables.min.css')}}">
@endsection
@section('title', 'Quản lí tố cáo')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Quản lý đơn tố cáo</h5>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Người tố cáo</th>
                                <th>Người bị tố cáo</th>
                                <th>Mã đơn thuê</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($toCaos as $toCao)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$toCao->nguoiToCao->ten}}</td>
                                    <td>{{$toCao->nguoiBiToCao->ten}}</td>
                                    <td>MS-{{$toCao->donThue->id}}</td>
                                    <td>{{$toCao->created_at}}</td>
                                    <td><span class="badge text-bg-{{$toCao->mau}}">{{$toCao->trangThai2}}</span></td>
                                    <td>
                                        <a href="{{route('admin.to-caos.show',$toCao->id)}}" class="btn btn-info">Xem chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Người tố cáo</th>
                                <th>Người bị tố cáo</th>
                                <th>Mã đơn thuê</th>
                                <th>Thời gian</th>
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
    <script !src="">
        let b = document.getElementsByClassName('overlay-image')[0];
        function largeImage(id) {
            let a = document.getElementById('image'+id);
            a.style.width = '500px';
            a.style.position = 'fixed';
            a.style.top = '50%';
            a.style.left = '50%';
            a.style.zIndex = '2300';
            a.style.transform = 'translate(-50%, -50%)'
            b.style.display = 'block';
            b.addEventListener('click', ()=> {
                b.style.display = 'none';
                a.style.top = 'unset';
                a.style.left = 'unset';
                a.style.position = 'relative';
                a.style.transform = 'unset';
                a.style.width = '100px';
            })
        }
    </script>
@endsection
