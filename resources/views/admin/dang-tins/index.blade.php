@extends('admin.layouts.app')

@section('header')

<!-- data tables css -->
<link rel="stylesheet" href="{{asset('assets/plugins/data-tables/css/datatables.min.css')}}">

@endsection

@section('content')

<div class="row">
    <!-- Zero config table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Danh sách video tin</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tài khoản</th>
                                <th>Video</th>
                                <th>Lượt thích</th>
                                <th>Nội dung</th>
                                <th>Trạng thái</th>
                                <th>Ngày đăng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dangtins as $dangtin)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$dangtin->taiKhoan->ten}}</td>
                                <td>
                                    <video width="200px" controls>
                                        <source src="{{ Storage::url($dangtin->video) }}" type="video/mp4">
                                    </video>
                                </td>
                                <td>{{$dangtin->luot_thichs_count}}</td>
                                <td>{{$dangtin->noi_dung}}</td>
                                <td>
                                    {!! $dangtin->trang_thai == 1 ? '<label class="badge badge-light-success">Success</label>' : '<label class="badge badge-light-danger">Cancel</label>' !!}
                                </td>
                                <td>{{$dangtin->created_at}}</td>
                                <td>
                                    <form action="{{route('admin.dangtins.destroy', $dangtin->id)}}" method="POST" onsubmit="return confirm('Bạn có muốn xoá không?')">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" style="border:none; background:none"><i class="feather icon-trash-2 f-16 ms-3 text-c-red"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tài Khoản</th>
                                <th>Video</th>
                                <th>Lượt Thích</th>
                                <th>Nội Dung</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Language - Comma Decimal Place table end -->
</div>

@endsection

@section('script')
<script src="{{asset('assets/plugins/data-tables/js/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/pages/data-basic-custom.js')}}"></script>
@endsection