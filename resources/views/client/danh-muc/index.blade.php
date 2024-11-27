@extends('client.layouts.app')

@section('content')
    <section class="flat-title-page inner">
        <div class="overlay"></div>
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading mg-bt-12">
                        <h1 class="heading text-center">Danh Mục</h1>
                    </div>
                    <div class="breadcrumbs style2">
                        <ul>
                            <li><a href="{{route('client.index')}}">Trang chủ</a></li>
                            <li><a href="{{route('client.danhmuc')}}">Danh Mục</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="tf-section sc-explore-2">
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flat-tabs explore-tab">
                        <ul class="menu-tab">
                            <li class="item-title active">
                                <span class="inner">All</span>
                            </li>
                            <li class="item-title">
                                <span class="inner">Mới Nhất</span>
                            </li>
                            <li class="item-title">
                                <span class="inner">Phổ Biến Nhất</span>
                            </li>
                        </ul>
                        <div class="content-tab mg-t-40">
                            <div class="row content-inner" style="">
                                @foreach($danhMucs as $danhMuc)
                                    <div class="col sc-card-product explode style2 mg-bt" style="min-width: 200px; right: 8px">
                                        <div class="card-media">
                                            <a href="{{route('client.danhmuc.show', $danhMuc->id)}}"><img
                                                    src="{{\Illuminate\Support\Facades\Storage::url($danhMuc->anh)}}" alt="Image"></a>
                                        </div>
                                        <div class="card-title" style="">
                                            <h5 style="margin: 0 auto">{{$danhMuc->ten}}</h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
