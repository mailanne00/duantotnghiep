@extends('admin.layout.app')
@section('script-header')
    <link rel="stylesheet" href="{{asset('assets-admin/plugins/data-tables/css/datatables.min.css')}}">
@endsection
@section('title', 'Quản lí banner')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Sửa banner</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.banners.update', $banner->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="">
                                    <label class="form-label" style="margin-left: 25px">Nội dung</label>
                                    <div class="card-body">
                                        <textarea name="noi_dung" id="classic-editor">{!! $banner->noi_dung !!}</textarea>
                                    </div>
                                </div>
                                <div class="col" style="margin-left: 25px; margin-right: 20px">
                                    <label class="form-label">Ảnh banner</label>
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($banner->anh)}}" style="width: 100px; margin-left: 20px" alt="">
                                    <input type="file" class="form-control mt-3" name="anh">
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

    <script src="{{asset('assets-admin/js/plugins/ckeditor.js')}}"></script>
    <script type="text/javascript">
        $(window).on('load', function () {
            $(function () {
                ClassicEditor.create(document.querySelector('#classic-editor'))
                    .catch(error => {
                        console.error(error);
                    });
            });
        });
    </script>
@endsection
