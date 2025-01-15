@extends('admin.layout.app')
@section('script-header')
<link rel="stylesheet" href="{{asset('assets-admin/plugins/data-tables/css/datatables.min.css')}}">
@endsection
@section('title', 'Quản lí đơn thuê')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Quản lý đơn thuê</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã đơn thuê</th>
                                <th>Người thuê</th>
                                <th>Người được thuê</th>
                                <th>Giá thuê 1h</th>
                                <th>Giờ thuê</th>
                                <th>Thời gian bắt đầu</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lichSuThues as $lichSuThue)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$lichSuThue->id}}</td>
                                    <td>{{$lichSuThue->nguoiThue->ten}}</td>
                                    <td>{{$lichSuThue->nguoiDuocThue->ten}}</td>
                                    <td>{{number_format($lichSuThue->gia_thue, 0, ',', '.')}} VNĐ</td>
                                    <td>{{$lichSuThue->gio_thue}}</td>
                                    <td>{{$lichSuThue->created_at}}</td>
                                    <td><span class="badge text-bg-{{$lichSuThue->mau}}">{{$lichSuThue->trangThai2}}</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#modalChiTiet_{{ $lichSuThue->id }}">Chi tiết</a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modalChiTiet_{{ $lichSuThue->id }}" tabindex="-1"
                                    aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Chi tiết đơn thuê #{{ $lichSuThue->id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="d-flex justify-content-between mb-3 align-items-center">
                                                            <div class="modal-info">
                                                                <p>Ảnh người đi thuê:</p>
                                                            </div>
                                                            <div class="modal-info text-right">
                                                                <img src="{{ Storage::url($lichSuThue->nguoiThue->anh_dai_dien) }}"
                                                                    alt="Images"
                                                                    style="width:80px; height:80px; object-fit:cover">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between mb-3 align-items-center">
                                                            <div class="modal-info">
                                                                <p>Ảnh người được thuê:</p>
                                                            </div>
                                                            <div class="modal-info text-right">
                                                                <img src="{{ Storage::url($lichSuThue->nguoiDuocThue->anh_dai_dien) }}"
                                                                    alt="Images"
                                                                    style="width:80px; height:80px; object-fit:cover">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="modal-info">
                                                                <p>Người thuê:</p>
                                                            </div>
                                                            <div class="modal-info text-right">
                                                                <span
                                                                    class="price color-popup">{{ $lichSuThue->nguoiThue->ten }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="modal-info">
                                                                <p>Thời gian tạo:</p>
                                                            </div>
                                                            <div class="modal-info text-right">
                                                                <span
                                                                    class="price color-popup">{{ $lichSuThue->created_at }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="modal-info">
                                                                <p>Thời gian kết thúc:</p>
                                                            </div>
                                                            <div class="modal-info text-right">
                                                                <span
                                                                    class="price color-popup">{{ $lichSuThue->thoi_gian_ket_thuc }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="modal-info">
                                                                <p>Trạng thái:</p>
                                                            </div>
                                                            <div class="modal-info text-right">
                                                                <span
                                                                    class="text-{{ $lichSuThue->mau }} price color-popup">{{ $lichSuThue->trangThai2 }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="modal-info">
                                                                <p>Số giờ thuê:</p>
                                                            </div>
                                                            <div class="modal-info text-right">
                                                                <span class="price color-popup">{{ $lichSuThue->gio_thue }}
                                                                    giờ</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="modal-info">
                                                                <p>Giá thuê:</p>
                                                            </div>
                                                            <div class="modal-info text-right">
                                                                <span
                                                                    class="price color-popup">{{ number_format($lichSuThue->gia_thue, 0, ',', '.') }}
                                                                    VNĐ</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="modal-info">
                                                                <p>Tổng chi phí:</p>
                                                            </div>
                                                            <div class="modal-info text-right">
                                                                <span
                                                                    class="price color-popup">{{ number_format($lichSuThue->gio_thue * $lichSuThue->gia_thue, 0, ',', '.') }}
                                                                    VNĐ</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="modal-info">
                                                                <p>Lợi nhuận:</p>
                                                            </div>
                                                            <div class="modal-info text-right">
                                                                <span
                                                                    class="price color-popup">{{ number_format($lichSuThue->loi_nhuan, 0, ',', '.') }}
                                                                    VNĐ</span>
                                                            </div>
                                                        </div>
                                                        @if (!empty($lichSuThue->danhGia->toArray()) && $lichSuThue->trang_thai == 1)
                                                            <div class="d-flex justify-content-between mb-3">
                                                                <div class="modal-info">
                                                                    <p>Đánh giá:</p>
                                                                </div>
                                                                <div class="modal-info text-right">
                                                                    <span
                                                                        class="price color-popup">{{ $lichSuThue->danhGia[0]['danh_gia'] }}⭐️</span>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Mã đơn thuê</th>
                                <th>Người thuê</th>
                                <th>Người được thuê</th>
                                <th>Giá thuê 1h</th>
                                <th>Giờ thuê</th>
                                <th>Thời gian bắt đầu</th>
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