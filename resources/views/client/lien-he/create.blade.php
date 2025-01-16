@extends('client.layouts.app')
@section('title', 'Liên hệ')
@section('content')
    <section class="flat-title-page inner">
        <div class="overlay"></div>
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading mg-bt-12">
                        <h1 class="heading text-center">Liên hệ</h1>
                    </div>
                    <div class="breadcrumbs style2">
                        <ul>
                            <li><a href="{{route('client.index')}}">Trang chủ</a></li>
                            <li><a href="{{route('client.lienhe')}}">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tf-contact tf-section">
        <div class="themesflat-container">
            <div class="row">
                <div class="col-lg-12 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863931182069!2d105.74468687555854!3d21.038129780613442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1sen!2s!4v1732265276276!5m2!1sen!2s" width="688" height="480" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <h2 class="tf-title-heading style-2 mg-bt-24 text-center">
                        Player Duo xin hân hạnh được hỗ trợ
                    </h2>
                    <div class="form-inner">
                        <form action="{{route('client.lienhe.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input id="name" name="ten" tabindex="1" aria-required="true"
                                   type="text" value="@if(auth()->check()) {{$taiKhoan->ten}} @else Họ và tên @endif" disabled>
                            @error('ten')
                            <p class="text-danger" style="margin-bottom: 20px; font-size: 14px; margin-top: -20px">{{$message}}</p>
                            @enderror()
                            <input id="email" name="email" tabindex="2" aria-required="true"
                                   type="email" value="@if(auth()->check()) {{$taiKhoan->email}} @else Email @endif" disabled>
                            @error('email')
                            <p class="text-danger" style="margin-bottom: 20px; font-size: 14px; margin-top: -20px">{{$message}}</p>
                            @enderror()
                            <textarea id="message" name="noi_dung" tabindex="3" aria-required="true"  placeholder="Nội dung"></textarea>
                            @error('noi_dung')
                            <p class="text-danger" style="margin-bottom: 20px; font-size: 14px; margin-top: -35px">{{$message}}</p>
                            @enderror()
                            <input id="anh" name="anh" tabindex="2"
                                   type="file" placeholder="" class="form-control" style="color: #828196; background-color: #14141F;">
                                   
                            @if (auth()->check())
                            <div class="text-center"><button class="submit" style="width: 40%;">Send message</button></div>
                            @else
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

