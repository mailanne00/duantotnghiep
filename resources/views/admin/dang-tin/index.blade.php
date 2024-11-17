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
                                <th>Tên tài khoản</th>
                                <th>Video</th>
                                <th>Số lượt thả tym</th>
                                <th>Nội dung</th>
                                <th>Ngày tạo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dangTins as $dangTin)
                                <tr>
                                    <th>
                                        {{$loop->iteration}}
                                    </th>
                                    <td>
                                        {{$dangTin->taiKhoan->ten}}
                                    </td>
                                    <td>
                                        <video width="215" height="130" controls>
                                            <source src="{{ \Illuminate\Support\Facades\Storage::url($dangTin->video) }}" type="video/mp4">
                                        </video>
                                    </td>
                                    <td>99</td>
                                    <td>{{$dangTin->noi_dung}}</td>
                                    <td>{{$dangTin->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên tài khoản</th>
                                <th>Video</th>
                                <th>Nội dung</th>
                                <th>Ngày tạo</th>
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
