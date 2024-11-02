@extends('admin.layouts.app')

@section('content')
<div class="row custom-color">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Sửa danh mục</h5>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <form action="{{route('admin.danhmucs.update', $danhmuc->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div>
                            <div class="col-6">
                                <label class="form-label">Tên danh mục</label>
                                <input type="text" name="ten" class="form-control" value="{{$danhmuc->ten}}">
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">Ảnh đại diện</label>
                                <div>
                                    <img src="{{ Storage::url($danhmuc->anh_dai_dien)}}" alt="" width="100px">
                                </div>
                                <input type="file" name="anh_dai_dien" class="form-control mt-3">
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