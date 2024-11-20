@extends('admin.layout.app')
@section('script-header')
    <link rel="stylesheet" href="{{asset('assets-admin/plugins/data-tables/css/datatables.min.css')}}">
@endsection
@section('title', 'Quản lí bình luận')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Danh sách bình luận</h5>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên tài khoản</th>
                                <th>Nội dung</th>
                                <th>Bài viết</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($binhLuans as $binhLuan)
                                <tr>
                                    <th>
                                        {{$loop->iteration}}
                                    </th>
                                    <td>
                                        {{$binhLuan->taiKhoan->ten}}
                                    </td>
                                    <td>{{$binhLuan->noi_dung}}</td>
                                    <td>{{ Str::limit($binhLuan->blog->noi_dung, 20, '...') }}</td>
                                    <td>
                                        <button class="btn btn-danger">Gỡ bình luận</button>
                                        <a href="" class="btn btn-primary">Xem chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên tài khoản</th>
                                <th>Nội dung</th>
                                <th>Bài viết</th>
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
