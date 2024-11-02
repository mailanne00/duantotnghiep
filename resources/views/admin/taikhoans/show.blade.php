@extends('admin.layouts.app')

<title>@yield('title' , 'Đây là trang chi tiết')</title>

@section('content')
<div class="container mt-4">
    <a href="{{ route('admin.taikhoans.index') }}" class="btn btn-secondary mb-3">Quay lại danh sách</a>

    <div class="card">
        <div class="card-header">
            <h5>Chi tiết tài khoản: {{ $taikhoan->ten }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ID:</label>
                        <input type="text" class="form-control" value="{{ $taikhoan->id }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Mã định danh:</label> <!-- Thêm dòng này -->
                        <input type="text" class="form-control" value="{{ $taikhoan->id_dinh_danh }}" readonly> <!-- Thêm input cho mã định danh -->
                    </div>
                    <div class="form-group">
                        <label>Tên:</label>
                        <input type="text" class="form-control" value="{{ $taikhoan->ten }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh:</label>
                        <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($taikhoan->ngay_sinh)->format('d/m/Y') }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Biệt danh:</label>
                        <input type="text" class="form-control" value="{{ $taikhoan->biet_danh }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Giới tính:</label>
                        <input type="text" class="form-control" value="{{ $taikhoan->gioi_tinh }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" value="{{ $taikhoan->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại:</label>
                        <input type="text" class="form-control" value="{{ $taikhoan->sdt }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu:</label>
                        <div class="input-group">
                            <input type="password" id="mat_khau" class="form-control" value="{{ $taikhoan->mat_khau }}" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-eye" id="togglePassword" style="cursor: pointer;" onclick="togglePassword()"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Số dư:</label>
                        <input type="text" class="form-control" value="{{ number_format($taikhoan->so_du, 0, ',', '.') }} VND" readonly>
                    </div>
                    <div class="form-group">
                        <label>Vai trò:</label>
                        <input type="text" class="form-control" value="{{ $taikhoan->phanquyens ? 'Admin' : 'Người dùng' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Ngày tạo:</label>
                        <input type="text" class="form-control" value="{{ $taikhoan->created_at->format('Y-m-d') }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái:</label>
                        <p>
                            @if($taikhoan->banned_at)
                            <span class="text-danger">Tài khoản bị cấm</span>
                            @else
                            <span class="text-success">Tài khoản đang hoạt động</span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ảnh đại diện:</label>
                        <div class="mb-3">
                            <img src="{{ Storage::url($taikhoan->anh_dai_dien) }}" alt="Ảnh đại diện" class="img-fluid rounded" style="max-width: 200px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>CCCD (Ảnh):</label>
                        <div>
                            <img src="{{ Storage::url($taikhoan->cccd) }}" alt="Ảnh căn cước" class="img-fluid rounded" style="max-width: 200px;">
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ route('admin.taikhoans.index') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        var passwordField = document.getElementById("mat_khau");
        var toggleIcon = document.getElementById("togglePassword");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        }
    }
</script>

@endsection