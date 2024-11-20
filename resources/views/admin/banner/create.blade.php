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
                    <h5>Thêm banner</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.banners.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="">
                                        <label class="form-label" style="margin-left: 25px">Nội dung</label>
                                        <div class="card-body">
                                            <textarea name="noi_dung" id="classic-editor"></textarea>
                                        </div>
                                    </div>
                                    <div class="col" style="margin-left: 25px; margin-right: 20px">
                                        <label class="form-label">Ảnh banner</label>
                                        <input type="file" class="form-control" name="anh">
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
