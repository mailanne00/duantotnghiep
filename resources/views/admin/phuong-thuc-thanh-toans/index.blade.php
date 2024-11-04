@extends('admin.layouts.app')

@section('header')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<link rel="stylesheet" href="{{asset('assets/plugins/data-tables/css/datatables.min.css')}}">

@endsection

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Danh sách phương thức thanh toán</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên phương thức</th>
                                <th>Logo</th>
                                <th>Số tài khoản</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($phuongthucthanhtoans as $phuongthucthanhtoan)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$phuongthucthanhtoan->ten_phuong_thuc}}</td>
                                <td>
                                    <img src="{{ Storage::url($phuongthucthanhtoan->logo) }}" alt="" width="70px">
                                </td>
                                <td>{{$phuongthucthanhtoan->so_tai_khoan}}</td>
                                <td>{{$phuongthucthanhtoan->mo_ta}}</td>
                                <td>
                                    <form action="{{ route('admin.phuongthucthanhtoans.update-status', $phuongthucthanhtoan->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="switch switch-primary d-inline">
                                            <input type="checkbox" name="trang_thai" value="{{ $phuongthucthanhtoan->trang_thai == 1 ? 0 : 1 }}" id="switch-{{ $phuongthucthanhtoan->id }}" {{ $phuongthucthanhtoan->trang_thai == 1 ? 'checked' : '' }} onchange="this.form.submit()">
                                            <label for="switch-{{ $phuongthucthanhtoan->id }}" class="cr switch-alignment"></label>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{route('admin.phuongthucthanhtoans.edit', $phuongthucthanhtoan->id)}}">
                                                <i class="icon feather icon-edit f-16 text-c-green"></i>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <form action="{{route('admin.phuongthucthanhtoans.destroy', $phuongthucthanhtoan->id)}}" method="POST" onsubmit="return confirm('Bạn có muốn xoá không?')">
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
</div>

@if (session('success'))
<script>
    swal("Thành công!", "{{ session('success') }}", "success");
</script>
@endif

@endsection

@section('script')
<script src="{{asset('assets/plugins/data-tables/js/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/pages/data-basic-custom.js')}}"></script>
@endsection