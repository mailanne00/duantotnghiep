@extends('admin.layouts.app')

@section('header')

<!-- data tables css -->
<link rel="stylesheet" href="{{asset('assets/plugins/data-tables/css/datatables.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

@endsection

@section('content')

<div class="row">
    <!-- Zero config table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Danh sách danh mục</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th>Ảnh đại diện</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($danhmucs as $danhmuc)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$danhmuc->ten}}</td>
                                <td>
                                    <img src="{{Storage::url($danhmuc->anh_dai_dien)}}" alt="" width="100px">
                                </td>
                                <td>
                                    <form action="{{ route('admin.danhmucs.update-status', $danhmuc->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="switch switch-primary d-inline">
                                            <input type="checkbox" name="trang_thai" value="{{ $danhmuc->trang_thai == 1 ? 0 : 1 }}" id="switch-{{ $danhmuc->id }}" {{ $danhmuc->trang_thai == 1 ? 'checked' : '' }} onchange="this.form.submit()">
                                            <label for="switch-{{ $danhmuc->id }}" class="cr switch-alignment"></label>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{route('admin.danhmucs.edit', $danhmuc->id)}}">
                                                <i class="icon feather icon-edit f-16 text-c-green"></i>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <form action="{{route('admin.danhmucs.destroy', $danhmuc->id)}}" method="POST" onsubmit="return confirm('Bạn có muốn xoá không?')">
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