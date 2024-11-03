@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Xử lí tố cáo</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- Form cập nhật thông tin tố cáo -->
                    <form action="{{ route('admin.tocao.updateStatus', $complaint->id) }}" method="POST"
                        onsubmit="return confirmUpdate();">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label class="form-label" for="user_name">Tên người dùng:</label>
                            <input type="text" class="form-control" id="user_name" placeholder="Tên người dùng ..."
                                value="{{ $complaint->user->ten }}" readonly disabled>
                            <a href="{{ route('admin.taikhoans.show', $complaint->user->id) }}" class="text-primary"
                                style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'"
                                onmouseout="this.style.textDecoration='none'">Chi tiết người tố cáo tại đây.</a>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="player_name">Tên player:</label>
                            <input type="text" class="form-control" id="player_name" placeholder="Tên player ..."
                                value="{{ $complaint->player->ten }}" readonly disabled>
                            <a href="{{ route('admin.taikhoans.show', $complaint->player->id) }}" class="text-primary"
                                style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'"
                                onmouseout="this.style.textDecoration='none'">Chi tiết player bị tố cáo tại đây.</a>

                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="player_name">ID tin nhắn:</label>
                            <input type="text" class="form-control" id="id_tin_nhan" placeholder="Id Tin Nhắn"
                                value="{{ $complaint->id_tin_nhan }}" readonly disabled>
                            <a href="#" class="text-primary" style="text-decoration: none;"
                                onmouseover="this.style.textDecoration='underline'"
                                onmouseout="this.style.textDecoration='none'">Chi tiết tin nhắn của đôi bên tại đây.</a>

                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="player_name">Tiêu đề tố cáo player:</label>
                            <input type="text" class="form-control" id="tieu_de_to_cao"
                                placeholder="Tiêu đề tố cáo player ..." value="{{ $complaint->tieu_de_to_cao }}" readonly
                                disabled>


                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="complaint_content">Nội dung tố cáo:</label>
                            <textarea class="form-control" id="complaint_content" rows="3" readonly disabled>{{ $complaint->noi_dung_to_cao }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="complaint_image">Ảnh minh chứng:</label>
                            <div class="card">
                                <div class="card-body">
                                    @if ($complaint->image_path)
                                        <img src="{{ asset($complaint->image_path) }}" class="img-fluid rounded"
                                            width="100" height="100" alt="Ảnh minh chứng">
                                        <p class="mt-2 text-muted">Ảnh minh chứng cho tố cáo của bạn.</p>
                                    @else
                                        <p class="text-warning">Không có ảnh minh chứng</p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="status">Trạng thái của tố cáo:</label>
                            <select class="form-control" id="status" name="trang_thai" required>
                                <option value="Chờ xử lí" {{ $complaint->trang_thai === 'Chờ xử lí' ? 'selected' : '' }}>Chờ
                                    xử lí</option>
                                <option value="Đã Duyệt" {{ $complaint->trang_thai === 'Thành công' ? 'selected' : '' }}>Đã
                                    Duyệt</option>
                                <option value="Hủy" {{ $complaint->trang_thai === 'Hủy' ? 'selected' : '' }}>Hủy
                                </option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                    <script>
                        function confirmUpdate() {
                            return confirm("Bạn có muốn cập nhật trạng thái không?");
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
