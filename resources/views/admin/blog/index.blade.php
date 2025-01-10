@extends('admin.layout.app')

@section('script-header')
<link rel="stylesheet" href="{{asset('assets-admin/plugins/data-tables/css/datatables.min.css')}}">
@endsection

@section('title', 'Quản lí bảng tin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Danh sách bảng tin</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên đăng</th>
                                <th>Ảnh</th>
                                <th>Nội dung</th>
                                <th>Số lượng bình luận</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <th>
                                    {{$loop->iteration}}
                                </th>
                                <td>
                                    {{$blog->taiKhoan->ten}}
                                </td>
                                <td>
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($blog->anh)}}" style="width: 200px">
                                </td>
                                <td>{{$blog->noi_dung}}</td>
                                <td>
                                    <span>{{ $blog->binh_luans_count }}</span> <!-- Hiển thị số lượng bình luận -->

                                </td>
                                <td>
                                    <button class="btn btn-danger">Gỡ bài đăng</button>
                                    <a href="" class="btn btn-primary">Xem chi tiết</a>
                                    <button class="btn btn-info" data-id="{{ $blog->id }}" data-toggle="modal" data-target="#commentsModal{{$blog->id}}">Xem bình luận</button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên đăng</th>
                                <th>Ảnh</th>
                                <th>Nội dung</th>
                                <th>Số lượng bình luận</th>
                                <th>Chức năng</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="commentsModal{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="commentsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentsModalLabel">Bình luận của bài viết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($blog->binhLuans as $comment)
                    <p><strong>{{ $comment->taiKhoan->ten }}:</strong> {{ $comment->noi_dung }}</p>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>

    </div>
    <script>
        // Đảm bảo rằng bạn đang sử dụng jQuery và Bootstrap JavaScript
$(document).ready(function() {
    // Khi nhấn vào nút "Xem bình luận"
    $(".btn-info").click(function() {
        // Lấy id bài viết từ data-id của nút
        var blogId = $(this).data('id');
        
        // Gọi AJAX để lấy bình luận
        $.ajax({
            url: '/admin/blogs/' + blogId + '/comments',
            method: 'GET',
            success: function(data) {
                // Cập nhật nội dung modal với các bình luận
                $('#commentsModal' + blogId + ' .modal-body').html(data);
                // Mở modal
                $('#commentsModal' + blogId).modal('show');
            }
        });
    });
});

    </script>
</div>



@endsection

@section('script-footer')
<script src="{{asset('assets-admin/plugins/data-tables/js/datatables.min.js')}}"></script>
<script src="{{asset('assets-admin/js/pages/data-basic-custom.js')}}"></script>
@endsection