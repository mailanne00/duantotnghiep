@extends('admin.layouts.app')

@section('content')
<div class="row custom-color">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Thêm danh mục</h5>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <form action="{{route('admin.danhmucs.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Tên danh mục</label>
                                <input type="text" name="ten" class="form-control" placeholder="Ten danh muc">
                            </div>
                            <div class="col">
                                <label class="form-label">Ảnh đại diện</label>
                                <input type="file" name="anh_dai_dien" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection