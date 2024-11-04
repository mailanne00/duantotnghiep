@extends('admin.layouts.app')

@section('title', 'Thêm tài khoản')

@section('content')
<div class="row custom-color">

</div>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Thêm tài khoản</h1>
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
                            <input type="password" name="mat_khau" class="form-control" placeholder="Nhập mật khẩu" value="{{ old('mat_khau') }}" required>
                            @error('mat_khau')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="que_quan">Quê quán</label>
                            <input type="text" name="que_quan" class="form-control" placeholder="Nhập quê quán" value="{{ old('que_quan') }}" required>
                            @error('que_quan')
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
                            <label for="phan_quyen_id">Vai trò</label>
                            <select name="phan_quyen_id" class="form-control" required>
                                <option value="">Chọn vai trò</option>
                                @foreach ($phanQuyens as $phanQuyen)
                                <option value="{{ $phanQuyen->id }}" {{ old('bi_cam') == $phanQuyen->id ? 'selected' : '' }}>{{ $phanQuyen->ten }}</option>
                                @endforeach
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
    </div>
</div>




@endsection
