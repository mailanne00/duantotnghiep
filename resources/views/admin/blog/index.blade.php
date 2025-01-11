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
                                    <button class="btn btn-info" data-toggle="modal" data-target="#postDetailModal{{$blog->id}}">
                                        Xem Chi Tiết
                                    </button>

                                    <button class="btn btn-info" data-toggle="modal" data-target="#commentsModal_{{ $blog->id }}">Xem bình luận</button>

                                </td>
                            </tr>
                            <!-- Modal Xem Bình Luận -->
                            <div class="modal fade" id="commentsModal_{{ $blog->id }}" tabindex="-1" aria-labelledby="commentsModalLabel_{{ $blog->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="commentsModalLabel_{{ $blog->id }}">Bình luận bài viết: {{$blog->taiKhoan->ten}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @if($blog->binhLuans->count())
                                            <ul class="list-group">
                                                @foreach($blog->binhLuans as $comment)
                                                <li class="list-group-item">
                                                    <strong>{{ $comment->taiKhoan->ten }}:</strong>
                                                    {{ $comment->noi_dung }}
                                                </li>
                                                @endforeach
                                            </ul>
                                            @else
                                            <p>Chưa có bình luận nào.</p>

                                        </div> @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
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

    <!-- Modal Xem Chi Tiết Bài Viết -->
    <div class="modal fade" id="postDetailModal{{$blog->id}}" tabindex="-1" aria-labelledby="postDetailModalLabel{{$blog->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width:800px; margin-top:50px; margin-left: -30%; border-radius:10px">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: black" id="postDetailModalLabel{{$blog->id}}">Chi Tiết Bài Viết</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>{{$blog->taiKhoan->ten}}</h3>
                    <p>{{$blog->noi_dung}}</p>
                    <img src="{{\Illuminate\Support\Facades\Storage::url($blog->anh)}}" alt="" class="img-fluid">
                    <div class="comments">
                        @foreach ($blog->binhLuans as $binhLuan)
                        <div class="comment mb-3" style="display:flex">
                            <img src="{{Storage::url($binhLuan->taiKhoan->anh_dai_dien)}}" alt="" style="width:40px; height:40px; object-fit:cover; border-radius:50%; margin-top:10px">
                            <p style="margin-left:2%; margin-top:1%; color: #34353A; background-color:#EFF2F5; padding: 10px; border-radius: 10px">{{$binhLuan->noi_dung}}</p>
                        </div>
                        @endforeach
                    </div>
                    <form action="{{route('client.binhLuan.store', $blog->id)}}" method="post">
                        @csrf
                        <textarea class="form-control mt-5 my-2" id="newComment" name="noi_dung" style="font-size: 16px" placeholder="Viết bình luận..."></textarea>
                        <button type="submit" class="btn btn-primary" style="width:80px;">Gửi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@section('script-footer')
<script src="{{asset('assets-admin/plugins/data-tables/js/datatables.min.js')}}"></script>
<script src="{{asset('assets-admin/js/pages/data-basic-custom.js')}}"></script>

@endsection