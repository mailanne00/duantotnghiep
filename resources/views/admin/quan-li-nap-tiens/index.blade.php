@extends('admin.layouts.app')
@section('title', 'Quản lí nạp tiền')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Danh sách nạp tiền</h5>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Người nạp</th>
                                <th>Mã đơn nạp</th>
                                <th>Phương thức nạp</th>
                                <th>Số tiền nạp</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($quanLiNapTiens as $quanLiNapTien)
                                <tr>
                                    <td>
                                        {{$quanLiNapTien->taiKhoan->ten}}
                                    </td>
                                    <td>
                                        {{$quanLiNapTien->ma_don_nap}}
                                    </td>
                                    <td>
                                        {{$quanLiNapTien->phuong_thuc->ten_phuong_thuc}}
                                    </td>
                                    <td>
                                        <span style="color: #13bd8a">
                                            {{number_format($quanLiNapTien->so_tien, 0 , ',')}} VNĐ
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge text-bg-{{$quanLiNapTien->mau}}">
                                            {{$quanLiNapTien->trang_thai_thanh_toan}}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.quan-li-nap-tiens.show', $quanLiNapTien->id)}}">
                                            <button class="btn btn-info">Xem chi tiết</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Người nạp</th>
                                <th>Mã đơn nạp</th>
                                <th>Phương thức nạp</th>
                                <th>Số tiền nạp</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
