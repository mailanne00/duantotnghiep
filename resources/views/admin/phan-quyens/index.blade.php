@extends('admin.layouts.app')

<title>@yield('title' , 'Đây là danh sách')</title>
@section('content')

<div class="row">
    <!-- Zero config table start -->
    <div class="col-sm-12">
    <!-- <a href="{{ route('admin.phanquyen.create') }}" class="btn btn-primary">Thêm</a> -->
        <div class="card">
            <div class="card-header">
                <h5>Danh sách</h5>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($phanquyens as $phanquyen)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $phanquyen->ten }}</td>
                                <td>{{ $phanquyen->trang_thai }}</td>
                                <td>
                                <a href="{{ route('admin.phanquyen.edit', $phanquyen->id) }}"class="btn btn-warning">Chỉnh sửa</a>
                                <!-- <form action="{{ route('admin.phanquyen.destroy', $phanquyen->id) }}" method="POST" style="display:inline;" onclick="confirm('Bạn có chắc muốn xóa không?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>


                                </form> -->
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

@endsection