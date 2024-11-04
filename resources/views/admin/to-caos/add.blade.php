@extends('admin.layouts.app')

@section('title', 'Tố cáo player')

@section('content')
    <div class="container">


        <h2>Bảng tố cáo</h2>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif



        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <form action="{{ route('admin.tocao.store') }}" method="POST" enctype="multipart/form-data" id="complaintForm">
            @csrf
            <div class="form-group">
                <label for="id_player">Chọn người chơi mà bạn muốn tố cáo:</label>
                <select name="id_player" id="id_player" class="form-control" required>
                    <option value="">-- Chọn --</option>
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->ten }} (Player)</option>
                    @endforeach
                </select>
                @error('id_player')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tieu_de_to_cao">Player có hành vì:</label>
                <select name="tieu_de_to_cao" id="tieu_de_to_cao" class="form-control" required>
                    <option value="">-- Chọn --</option>

                    <option value="Có thái độ không tốt?">Có thái độ không tốt?</option>
                    <option value="Có hành vi không chuẩn mực?">Có hành vi không chuẩn mực?</option>
                    <option value="Mất lịch sự?">Mất lịch sự?</option>
                    <option value="Không hoàn thành nhiệm vụ?">Không hoàn thành nhiệm vụ?</option>
                    <option value="Có hành vi phá game?">Có hành vi phá game?</option>
                    <option value="Khác">Khác</option>

                </select>
                @error('id_player')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="noi_dung_to_cao">Nội dung tố cáo:</label>
                <textarea name="noi_dung_to_cao" id="noi_dung_to_cao" class="form-control" rows="5"
                    placeholder="Nội dung tố cáo..." required></textarea>
                @error('noi_dung_to_cao')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <label for="image">Ảnh minh chứng (Tùy chọn):</label>
            <input type="file" id="image" name="image" accept="image/*" class="form-control">

            <button type="submit" class="btn btn-primary mt-3">Gửi</button>
        </form>
    </div>
@endsection
