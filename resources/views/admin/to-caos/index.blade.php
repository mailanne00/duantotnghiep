@extends('admin.layouts.app')

@section('title', 'Danh sách tố cáo player')

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Tố cáo người chơi</h5>
                <a href="{{ route('admin.tocao.add') }}" class="btn btn-primary">Thêm tố cáo</a>
            </div>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif



            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên người tố cáo</th>
                                <th>Tên người bị tố cáo</th>
                                <th>Nội dung tố cáo</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complaints as $complaint)
                                <tr>
                                    <td>{{ $complaint->id }}</td>
                                    <td>{{ $complaint->user->ten }}</td>
                                    <td>{{ $complaint->player->ten }}</td>
                                    <td>{{ $complaint->noi_dung_to_cao }}</td>
                                    <td>{{ ucfirst($complaint->trang_thai) }}</td>
                                    <td>
                                        <!-- Xử lý -->
                                        <a href="{{ route('admin.tocao.show', $complaint->id) }}" class="btn btn-success">Xử
                                            lí</a>

                                        <!-- Xóa -->
                                        <form action="{{ route('admin.tocaos.destroy', $complaint->id) }}" method="POST"
                                            style="display:inline-block"
                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa khiếu nại này?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên người tố cáo</th>
                                <th>Tên người bị tố cáo</th>
                                <th>Nội dung tố cáo</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
