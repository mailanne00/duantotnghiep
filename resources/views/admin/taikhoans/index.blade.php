@extends('admin.layouts.app')

<title>@yield('title' , 'Đây là danh sách')</title>
@section('content')

<div class="row">
    <!-- Zero config table start -->
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h5>Danh sách tài khoản</h5>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>

                                <th>Tên</th>
                                <th>Ảnh đại diện</th>
                                <th>Giới tính</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($taikhoans as $taikhoan)
                            <tr>
                                <td>{{ $taikhoan->id }}</td>

                                <td>{{ $taikhoan->ten }}</td>
                                <td><img src="{{ Storage::url($taikhoan->anh_dai_dien) }}" style="width: 100px;" alt=""></td>
                                <td>{{ $taikhoan->gioi_tinh }}</td>
                                <td>{{ $taikhoan->email }}</td>
                                <td>{{ $taikhoan->sdt }}</td>
                                <td>
                                    @if($taikhoan->isBanned())
                                    <form action="{{ route('admin.taikhoans.unban', $taikhoan->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Mở lại</button>
                                    </form>
                                    @else
                                    <form action="{{ route('admin.taikhoans.ban', $taikhoan->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Cấm</button>
                                    </form>
                                    @endif

                                    <a href="{{ route('admin.taikhoans.show', $taikhoan->id) }}" class="btn btn-info">Xem chi tiết</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Ảnh đại diện</th>
                                <th>Giới tính</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection