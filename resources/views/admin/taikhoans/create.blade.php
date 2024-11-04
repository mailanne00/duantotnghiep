@extends('admin.layouts.app')

@section('title', 'Thêm tài khoản')

@section('content')
<div class="row custom-color"></div>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Thêm tài khoản</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.taikhoans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="ten">Tên</label>
                            <input type="text" name="ten" id="ten" class="form-control" placeholder="Nhập tên của bạn" value="{{ old('ten') }}" required>
                            @error('ten')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="ngay_sinh">Ngày sinh</label>
                            <input type="date" name="ngay_sinh" id="ngay_sinh" class="form-control" value="{{ old('ngay_sinh') }}" required>
                            @error('ngay_sinh')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="sdt">Số điện thoại</label>
                            <input type="text" name="sdt" id="sdt" class="form-control" placeholder="Nhập số điện thoại" value="{{ old('sdt') }}" required>
                            @error('sdt')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="cccd">CCCD (Ảnh)</label>
                            <input type="file" name="cccd" id="cccd" class="form-control" required>
                            @error('cccd')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mat_khau">Mật khẩu:</label>
                            <div class="input-group">
                                <input type="password" id="mat_khau" name="mat_khau" class="form-control" placeholder="Nhập mật khẩu của bạn" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-eye" id="togglePassword" style="cursor: pointer;" onclick="togglePassword()"></i>
                                    </span>
                                </div>
                            </div>
                            @error('mat_khau')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="biet_danh">Biệt danh</label>
                            <input type="text" name="biet_danh" id="biet_danh" class="form-control" placeholder="Nhập biệt danh" value="{{ old('biet_danh') }}" required>
                            @error('biet_danh')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="gioi_tinh">Giới tính</label>
                            <select name="gioi_tinh" id="gioi_tinh" class="form-control" required>
                                <option value="">Chọn giới tính</option>
                                <option value="Nam" {{ old('gioi_tinh') == 'Nam' ? 'selected' : '' }}>Nam</option>
                                <option value="Nữ" {{ old('gioi_tinh') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                            </select>
                            @error('gioi_tinh')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="anh_dai_dien">Ảnh đại diện</label>
                            <input type="file" name="anh_dai_dien" id="anh_dai_dien" class="form-control" required>
                            @error('anh_dai_dien')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="phan_quyen_id">Vai trò</label>
                            <select name="phan_quyen_id" id="phan_quyen_id" class="form-control" required>
                                <option value="">Chọn vai trò</option>
                                @foreach ($phanQuyens as $phanQuyen)
                                <option value="{{ $phanQuyen->id }}">{{ $phanQuyen->ten }}</option>
                                @endforeach
                            </select>
                            @error('phan_quyen_id')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Thêm tài khoản</button>
            </form>
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