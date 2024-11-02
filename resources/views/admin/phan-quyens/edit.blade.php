@extends('admin.layouts.app')
<title>@yield('title' , 'Đây là chỉnh sửa')</title>
@section('content')
<div class="container">
    <h1>Sửa</h1>
    <form action="{{ route('admin.phanquyen.update' , $phanquyens->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row">

        <div class="mb-3 col-md-6">
            <label for="name">Tên</label>
            <input type="text" name="ten" class="form-control" value="{{$phanquyens->ten}}" required>
        </div>
        <div class="mb-3 col-md-6">
            <label for="name">Trạng thái</label>
            <input type="text" name="trang_thai" class="form-control" value="{{$phanquyens->trang_thai}}" required>
        </div>
        </div>
        
      
       
        <button type="submit" class="btn btn-success">Sửa</button>
    </form>
</div>
@endsection