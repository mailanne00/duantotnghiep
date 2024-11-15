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
                                    </td><td>
                                        <img style="width: 60px; height: 60px" src="{{$taiKhoan->gioi_tinh =='nam' ? 'https://media.istockphoto.com/id/472477484/vi/vec-to/profile-icon-nam-%C4%91eo-k%C3%ADnh-avatar-ch%C3%A2n-dung-ng%C6%B0%E1%BB%9Di-b%C3%ACnh-th%C6%B0%E1%BB%9Dng.jpg?s=612x612&w=0&k=20&c=G1TYBUtyQde6TW6Z7YwgXRYSZrpSOeiB__nGBV0pq48=' : 'https://img.lovepik.com/png/20231120/woman-icon-vector-illustration-female-lineal-icon-ui_649644_wh860.png'}}" alt="">
                                    </td><td>
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($taiKhoan->anh_dai_dien)}}" style="width: 150px;" alt="">
                                    </td><td style="color: #0d8360">
                                        {{number_format($taiKhoan->so_du, 0, ',') }} VNĐ
                                    </td><td>
                                        {!! $taiKhoan->bi_cam==0 ? '<span class="badge text-bg-success">Mở</span>' : '<span class="badge text-bg-danger">Cấm</span>'!!}
                                    </td><td>
                                        <button class="btn btn-info">Xem chi tiết</button>
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
    <script src="{{asset('assets/plugins/data-tables/js/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/data-basic-custom.js')}}"></script>
@endsection
