@extends('admin.layout.app')
@section('script-header')
    <link rel="stylesheet" href="{{asset('assets-admin/plugins/data-tables/css/datatables.min.css')}}">
@endsection
@section('title', 'Quản lí đăng tin')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Danh sách đăng tin</h5>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Ảnh đại diện</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($danhMucs as $danhMuc)
                                <tr>
                                    <th>
                                        {{$loop->iteration}}
                                    </th>
                                    <td>
                                        {{$danhMuc->ten}}
                                    </td>
                                    <td>
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($danhMuc->anh)}}" style="width: 80px; border-radius: 10px;" alt="">
                                    </td>
                                    <td style="display: flex">
                                        <form action="{{route('admin.danh-mucs.destroy', $danhMuc->id)}}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không?')">Xoá</button>
                                        </form>
                                        <a href="{{route('admin.danh-mucs.edit', $danhMuc->id)}}" class="btn btn-warning">Chỉnh sửa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Ảnh đại diện</th>
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
