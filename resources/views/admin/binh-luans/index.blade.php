@extends('admin.layouts.app')

@section('header')

<!-- data tables css -->
<link rel="stylesheet" href="{{asset('assets/plugins/data-tables/css/datatables.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/plugins/ratting/css/bootstrap-stars.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/ratting/css/css-stars.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/ratting/css/fontawesome-stars.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/ratting/css/fontawesome-stars-o.css')}}">

<Style>
    .stars .star {
        font-size: 24px;
        /* Điều chỉnh kích thước sao */
        color: #ccc;
        /* Màu sao mặc định */
    }

    .stars .star.filled {
        color: #FFD700;
        /* Màu vàng cho sao được đánh giá */
    }
</Style>

@endsection

@section('content')

<div class="row">
    <!-- Zero config table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Danh sách bình luận</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên tài khoản</th>
                                <th>Tên player</th>
                                <th>Nội dung</th>
                                <th>Đánh giá</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($binhluans as $binhluan)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$binhluan->taikhoan->ten}}</td>
                                <td>{{$binhluan->player->taikhoan->ten}}</td>
                                <td>{{$binhluan->noi_dung}}</td>
                                <td>
                                    <div class="stars stars-example-css">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span class="star {{ $i <= $binhluan->danh_gia ? 'filled' : '' }}">&#9733;</span>
                                        @endfor
                                    </div>
                                </td>
                                <td>
                                    <div class="switch switch-primary d-inline">
                                        <input onclick="updateStatus('{{ $binhluan->id }}', '{{$binhluan->trang_thai==1 ? 0 : 1}}')" type="checkbox" id="switch-{{ $binhluan->id }}" {{ $binhluan->trang_thai == 1 ? 'checked' : '' }}>
                                        <label for="switch-{{ $binhluan->id }}" class="cr switch-alignment"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{route('admin.danhmucs.edit', $binhluan->id)}}">
                                                <i class="icon feather icon-edit f-16 text-c-green"></i>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <form action="{{route('admin.danhmucs.destroy', $binhluan->id)}}" method="POST" onsubmit="return confirm('Bạn có muốn xoá không?')">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" style="border:none; background:none"><i class="feather icon-trash-2 f-16 ms-3 text-c-red"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Language - Comma Decimal Place table end -->
</div>

@endsection

<script>
    function updateStatus(id, status) {
        $.ajax({
            url: '/admin/catalogues/' + id,
            method: 'PUT',
            data: {
                _token: '{{csrf_token()}}',
                trang_thai: status,
            },
            success: (data) => {
                alert('Sửa trạng thái thành công');
            }
        })
    }
</script>

@section('script')
<script src="{{asset('assets/plugins/data-tables/js/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/pages/data-basic-custom.js')}}"></script>

<script src="{{asset('assets/plugins/ratting/js/jquery.barrating.min.js')}}"></script>
<script src="{{asset('assets/js/pages/ac-rating.js')}}"></script>
@endsection