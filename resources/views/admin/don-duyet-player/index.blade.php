@extends('admin.layout.app')
@section('script-header')
<link rel="stylesheet" href="{{asset('assets-admin/plugins/data-tables/css/datatables.min.css')}}">
@endsection
@section('title', 'Quản lí đơn duyệt player')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Quản lý đơn duyệt player</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tài khoản</th>
                                <th>CCCD</th>
                                <th>Video</th>
                                <th>Trạng thái xác thực</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user_gui_xac_thucs as $user_gui_xac_thuc)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$user_gui_xac_thuc->ten}}</td>
                                    <td>{{$user_gui_xac_thuc->cccd}}</td>
                                    <td>
                                        @if ($user_gui_xac_thuc->personal_video)
                                            <video width="215" height="130" controls>
                                                <source
                                                    src="{{ \Illuminate\Support\Facades\Storage::url($user_gui_xac_thuc->personal_video) }}"
                                                    type="video/mp4">
                                            </video>

                                            @else
                                            <div width="215" height="130">
                                            </div>
                                        @endif
                                        
                                    </td>
                                    <td>{{$user_gui_xac_thuc->trang_thai_xac_thuc}}</td>
                                    <td>
                                        <form action="{{route('admin.duyetPlayer', $user_gui_xac_thuc->id)}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success mt-4">Cập nhật</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tài khoản</th>
                                <th>CCCD</th>
                                <th>Video</th>
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