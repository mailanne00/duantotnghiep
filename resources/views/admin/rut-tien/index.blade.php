@extends('admin.layout.app')
@section('script-header')
<link rel="stylesheet" href="{{asset('assets-admin/plugins/data-tables/css/datatables.min.css')}}">
@endsection
@section('title', 'Quản lí rút tiền')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Danh sách rút tiền</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Ảnh đại diện</th>
                                <th>Tài khoản</th>
                                <th>Ngân hàng</th>
                                <th>Số tài khoản</th>
                                <th>Số tiền</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($yeuCauRutTiens as $yeuCauRutTien)
                            <tr class="group">
                                <td>MYC-{{$yeuCauRutTien->id}}</td>
                                <td>
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($yeuCauRutTien->nguoiRut->anh_dai_dien)}}" style="width: 80px; border-radius: 10px;" alt="">
                                </td>
                                <td>{{$yeuCauRutTien->nguoiRut->ten}}</td>
                                <td>{{$yeuCauRutTien->ten_ngan_hang}}</td>
                                <td>{{$yeuCauRutTien->so_tai_khoan}}</td>
                                <td class="text-success">{{number_format($yeuCauRutTien->so_tien,0,'.')}} VNĐ</td>
                                <td>{{$yeuCauRutTien->created_at}}</td>
                                @if ($yeuCauRutTien->xet_duyet == 0)
                                <td class="text-primary">Đang xét duyệt</td>
                                @elseif($yeuCauRutTien->xet_duyet == 1)
                                @if ($yeuCauRutTien->trang_thai == 0)
                                <td class="text-warning">Đang chờ xử lý</td>
                                @elseif($yeuCauRutTien->trang_thai == 1)
                                <td class="text-success">Thanh toán thành công</td>
                                @else
                                <td class="text-danger">Từ chối thanh toán</td>
                                @endif
                                @endif
                                <td>
                                @if ($yeuCauRutTien->trang_thai == 0)
                                <form action="{{route('admin.rutTien.thanhToan', $yeuCauRutTien->id)}}" method="post">
                                    @csrf
                                <button class="btn btn-success">Đã thanh toán</button>
                                </form> 
                                <br>
                                <form action="{{route('admin.rutTien.tuChoiThanhToan', $yeuCauRutTien->id)}}" method="post">
                                @csrf
                                <button class="btn btn-danger">Từ chối</button>
                                </form>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Mã</th>
                                <th>Ảnh đại diện</th>
                                <th>Tài khoản</th>
                                <th>Ngân hàng</th>
                                <th>Số tài khoản</th>
                                <th>Số tiền</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
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
@section('script-footer')
<script src="{{asset('assets-admin/plugins/data-tables/js/datatables.min.js')}}"></script>
<script src="{{asset('assets-admin/js/pages/data-basic-custom.js')}}"></script>
@endsection