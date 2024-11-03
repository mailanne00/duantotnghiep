@extends('admin.layouts.app')

<title>@yield('title', 'Đây là danh sách')</title>
@section('content')
    <div class="row">
        <!-- Zero config table start -->
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header">
                    <h5>Lịch sử nhận Duo</h5>
                </div>
                @if (session('success'))
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

                                    <th>Tên khách hàng</th>
                                    <th>Giá player</th>
                                    <th>Số giờ thuê</th>
                                    <th>Trạng thái</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lichSuThue as $lichSuThue)
                                    <tr>
                                        <td>{{ $lichSuThue->id }}</td>

                                        <td>{{ $lichSuThue->taiKhoan->ten ?? 'Không có tên' }}</td>
                                        <td>{{ $lichSuThue->gia_player }}</td>
                                        <td>{{ $lichSuThue->gio_thue }}</td>
                                        <td>{{ $lichSuThue->trang_thai_thue }}</td>

                                        {{-- <td>
                                            <a href="{{ route('admin.taikhoans.show', $taikhoan->id) }}"
                                                class="btn btn-info">Xóa</a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>

                                    <th>Tên khách hàng</th>
                                    <th>Giá player</th>
                                    <th>Số giờ thuê</th>
                                    <th>Trạng thái</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
