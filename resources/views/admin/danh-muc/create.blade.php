@extends('admin.layout.app')
@section('script-header')
    <link rel="stylesheet" href="{{asset('assets-admin/plugins/data-tables/css/datatables.min.css')}}">
@endsection
@section('title', 'Quản lí danh mục')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Thêm danh mục</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.danh-mucs.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">Tên danh mục</label>
                                        <input type="text" class="form-control" name="ten" placeholder="Tên danh mục">
                                        @error('ten')
                                        <p class="mt-2 text-danger" style="margin-bottom: unset">{{$message}}</p>
                                        @enderror()
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Ảnh danh mục</label>
                                        <input type="file" class="form-control" name="anh">
                                        @error('anh')
                                        <p class="mt-2 text-danger" style="margin-bottom: unset">{{$message}}</p>
                                        @enderror()
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mt-4">Submit</button>
                            </form>
                        </div>
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
