@extends('admin.layouts.app')

@section('title', 'Yêu cầu thành Player')

@section('header')
<link rel="stylesheet" href="{{ asset('assets/plugins/data-tables/css/datatables.min.css') }}">
@endsection

@section('content')

<div class="row">
    <!-- Zero config table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Danh sách yêu cầu trở thành Player</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên tài khoản</th>
                                <th>CCCD</th>
                                <th>Tuổi</th>
                                <th>Thông tin</th>
                                <th>Giá tiền</th>
                                <th>Số tài khoản</th>
                                <th>Tình trạng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($acceptPlayers as $player)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $player->taiKhoan->ten }}</td>
                                <td>
                                    @if ($player->taiKhoan->cccd)
                                    <img src="{{ Storage::url($player->taiKhoan->cccd) }}" alt="Ảnh" width="100">
                                    @else
                                    <span>Không có</span>
                                    @endif
                                </td>
                                <td>
                                    @php
                                    $tuoi = \Carbon\Carbon::parse($player->taiKhoan->ngay_sinh)->age;
                                    @endphp
                                    {{$tuoi}}
                                </td>
                                <td>{{ $player->thong_tin }}</td>
                                <td>{{ number_format($player->gia_tien, 0, ',', '.') }} VNĐ</td>
                                <td>{{ $player->so_tai_khoan }}</td>
                                <td>
                                    @if ($player->tinh_trang == "Chờ xử lý")
                                    <label class="badge badge-light-warning" style="font-size: 0.8rem; padding: 10px;">Chờ xử lý</label>
                                    @elseif($player->tinh_trang == "Từ chối")
                                    <label class="badge badge-light-danger" style="font-size: 0.8rem; padding: 10px;">Từ chối</label>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <form action="{{ route('admin.players.updateStatus', $player->id) }}" method="POST" class="me-2">
                                                @csrf
                                                <input type="hidden" name="tinh_trang" value="Duyệt">
                                                <button type="submit" class="btn btn-icon btn-rounded btn-outline-success" title="Duyệt">
                                                    <i class="feather icon-check-circle"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col">
                                            <form action="{{ route('admin.players.updateStatus', $player->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="tinh_trang" value="Từ chối">
                                                <button type="submit" class="btn btn-icon btn-rounded btn-outline-danger" title="Từ chối">
                                                    <i class="feather icon-slash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên tài khoản</th>
                                <th>CCCD</th>
                                <th>Tuổi</th>
                                <th>Thông tin</th>
                                <th>Giá tiền</th>
                                <th>Số tài khoản</th>
                                <th>Tình trạng</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@endsection

@section('script')
<script src="{{ asset('assets/plugins/data-tables/js/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/data-basic-custom.js') }}"></script>
@endsection