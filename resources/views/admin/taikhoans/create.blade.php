@extends('admin.layouts.app')

@section('title', 'Thêm tài khoản')

@section('content')
<div class="container">
    <h1>Thêm tài khoản</h1>

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
                    <label for="ten">Tên</label>
                    <input type="text" name="ten" class="form-control" placeholder="Nhập tên của bạn" value="{{ old('ten') }}" required>
                    @error('ten')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ngay_sinh">Ngày sinh</label>
                    <input type="date" name="ngay_sinh" class="form-control" value="{{ old('ngay_sinh') }}" required>
                    @error('ngay_sinh')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Nhập email" value="{{ old('email') }}" required>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sdt">Số điện thoại</label>
                    <input type="text" name="sdt" class="form-control" placeholder="Nhập số điện thoại" value="{{ old('sdt') }}" required>
                    @error('sdt')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cccd">CCCD (Ảnh)</label>
                    <input type="file" name="cccd" class="form-control" required>
                    @error('cccd')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mat_khau">Mật khẩu</label>
                    <input type="password" name="mat_khau" class="form-control" placeholder="Nhập mật khẩu" required>
                    @error('mat_khau')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="biet_danh">Biệt danh</label>
                    <input type="text" name="biet_danh" class="form-control" placeholder="Nhập biệt danh" value="{{ old('biet_danh') }}" required>
                    @error('biet_danh')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gioi_tinh">Giới tính</label>
                    <select name="gioi_tinh" class="form-control" required>
                        <option value="">Chọn giới tính</option>
                        <option value="Nam" {{ old('gioi_tinh') == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ old('gioi_tinh') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                    </select>
                    @error('gioi_tinh')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                

                <div class="form-group">
                    <label for="anh_dai_dien">Ảnh đại diện</label>
                    <input type="file" name="anh_dai_dien" class="form-control" required>
                    @error('anh_dai_dien')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bi_cam">Vai trò</label>
                    <select name="bi_cam" class="form-control" required>
                        <option value="">Chọn vai trò</option>
                        <option value="1" {{ old('bi_cam') == '1' ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ old('bi_cam') == '2' ? 'selected' : '' }}>Người dùng</option>
                    </select>
                    @error('bi_cam')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                

            </div>
        </div>

        <button type="submit" class="btn btn-success">Thêm tài khoản</button>
    </form>
</div>
@endsection