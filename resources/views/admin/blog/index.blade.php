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

                                    
                                </td>
                            </tr>
                            <!-- Modal Xem Chi Tiết Bài Viết -->
                            <div class="modal fade" id="postDetailModal{{$blog->id}}" tabindex="-1" aria-labelledby="postDetailModalLabel{{$blog->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="width:800px; margin-top:50px; margin-left: -30%; border-radius:10px">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="color: black" id="postDetailModalLabel{{$blog->id}}">Chi Tiết Bài Viết</h5>
                                            
                                        </div>
                                        <div class="modal-body">
                                            <h3>{{$blog->taiKhoan->ten}}</h3>
                                            <p>{{$blog->noi_dung}}</p>
                                            <img src="{{\Illuminate\Support\Facades\Storage::url($blog->anh)}}" alt="" class="img-fluid">
                                            <div class="comments">
                                                @foreach ($blog->binhLuans as $binhLuan)
                                                <div class="comment mb-3" style="display:flex">
                                                    <!-- Avatar người bình luận -->
                                                    <img src="{{Storage::url($binhLuan->taiKhoan->anh_dai_dien)}}" alt="" style="width:40px; height:40px; object-fit:cover; border-radius:50%; margin-top:10px">

                                                    <!-- Tên người bình luận và nội dung bình luận -->
                                                    <div style="margin-left:10px;">
                                                        <strong>{{ $binhLuan->taiKhoan->ten }}</strong> <!-- Tên người bình luận -->
                                                        <p style="color: #34353A; background-color:#EFF2F5; padding: 10px; border-radius: 10px; margin-top: 5px;">{{ $binhLuan->noi_dung }}</p>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    <style>.modal-content {
                                        border-radius: 12px;
                                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                                        padding: 20px;
                                        background-color: #fff;
                                        transition: transform 0.3s ease-in-out;
                                    }

                                    .modal-header {
                                        background-color: #f8f9fa;
                                        border-bottom: 2px solid #dee2e6;
                                        padding: 15px 20px;
                                        text-align: center;
                                    }

                                    .modal-title {
                                        color: #34353A;
                                        font-size: 24px;
                                        font-weight: 600;
                                    }

                                    .modal-body {
                                        padding: 20px;
                                        max-height: 500px;
                                        overflow-y: auto;
                                    }

                                    .modal-footer {
                                        padding: 10px 15px;
                                        text-align: center;
                                    }

                                    .modal-footer .btn {
                                        font-size: 16px;
                                        padding: 10px 20px;
                                        border-radius: 8px;
                                    }

                                    .modal-footer .btn-primary {
                                        background-color: #007bff;
                                        border: none;
                                    }

                                    .modal-footer .btn-secondary {
                                        background-color: #6c757d;
                                        border: none;
                                    }

                                    .modal .modal-dialog {
                                        max-width: 800px;
                                        margin: 30px auto;
                                    }

                                    /* Định dạng ảnh bài viết */
                                    .modal-body img {
                                        width: 100%;
                                        border-radius: 10px;
                                        margin-bottom: 15px;
                                    }

                                    /* Giao diện bình luận */
                                    .comments .comment {
                                        display: flex;
                                        align-items: flex-start;
                                        background-color: #f9f9f9;
                                        padding: 12px;
                                        margin-bottom: 15px;
                                        border-radius: 8px;
                                        transition: background-color 0.3s;
                                    }

                                    .comments .comment:hover {
                                        background-color: #f1f1f1;
                                    }

                                    .comments .comment-avatar {
                                        border-radius: 50%;
                                        width: 40px;
                                        height: 40px;
                                        margin-right: 10px;
                                        object-fit: cover;
                                    }

                                    .comments .comment-text {
                                        flex-grow: 1;
                                    }

                                    .comments .comment strong {
                                        font-weight: bold;
                                        color: #34353A;
                                    }

                                    .comments .comment p {
                                        background-color: #eff2f5;
                                        padding: 10px;
                                        border-radius: 10px;
                                        font-size: 16px;
                                        color: #34353A;
                                        margin-top: 5px;
                                    }

                                    /* Style cho textarea */
                                    textarea.form-control {
                                        border-radius: 8px;
                                        font-size: 16px;
                                        padding: 12px;
                                        margin-top: 15px;
                                        border: 1px solid #ccc;
                                        box-sizing: border-box;
                                    }

                                    textarea.form-control:focus {
                                        border-color: #007bff;
                                        box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
                                    }

                                    /* Style cho nút gửi */
                                    button[type="submit"] {
                                        background-color: #007bff;
                                        color: white;
                                        border-radius: 8px;
                                        border: none;
                                        padding: 12px 25px;
                                        font-size: 16px;
                                        cursor: pointer;
                                        margin-top: 10px;
                                        width: 100%;
                                    }

                                    button[type="submit"]:hover {
                                        background-color: #0056b3;
                                    }
                                </style>
                                </style>
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



</div>



@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@section('script-footer')
<script src="{{asset('assets-admin/plugins/data-tables/js/datatables.min.js')}}"></script>
<script src="{{asset('assets-admin/js/pages/data-basic-custom.js')}}"></script>

@endsectiont