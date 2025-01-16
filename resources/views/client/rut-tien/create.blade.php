@extends('client.layouts.app')
@section('title','Rút tiền')
@section('content')
<section class="flat-title-page inner">
    <div class="overlay"></div>
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading mg-bt-12">
                    <h1 class="heading text-center">Rút tiền</h1>
                </div>
                <div class="breadcrumbs style2">
                    <ul>
                        <li><a href="index-2.html">Trang chủ</a></li>
                        <li><a href="#">Thông tin cá nhân</a></li>
                        <li>Rút tiền</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="tf-connect-wallet tf-section">
    <div class="themesflat-container" style="margin-top: -50px">
        <div class="row">
            <div class="col-12">
                <h2 class="tf-title-heading ct style-2 mb-5">
                    Tạo yêu cầu rút tiền
                </h2>
            </div>
            <div class="col-md-12">
                <div class="sc-box-icon-inner style-2">
                    <div class="sc-box-icon">
                        <h4 class="heading"><i class="fas fa-exclamation-triangle"></i><a style="margin-left: 10px">Chú ý</a> </h4>
                        <p class="content text-secondary">
                            Vui lòng xác thực yêu cầu rút tiền qua email sau khi tạo yêu cầu rút tiền.
                        </p>
                    </div>
                    <div style="margin-left: 100px">
                        <form action="{{route('client.rutTien.store')}}" method="POST">
                            @csrf
                            <div class="row bankName">
                                <div class="col-6">
                                    <label for="" style="font-size:16px; margin-bottom:10px">Tên Ngân hàng :</label>
                                    <input type="text" value="{{$bankName}}" disabled style="color:aliceblue">
                                    <input type="hidden" name="ten_ngan_hang" value="{{$bankName}}" style="color:aliceblue">
                                </div>
                                <div class="col-6">
                                    <label for="" style="font-size:16px; margin-bottom:10px">Số tài khoản</label>
                                    <input type="text" name="so_tai_khoan">
                                    @error('so_tai_khoan')
                                    <p class="text-danger mt-3" style="margin-bottom: 20px; font-size: 14px; margin-top: -20px">{{$message}}</p>
                                    @enderror()
                                </div>
                            </div>
                            <div class="row bankName mt-5">
                                <div class="col">
                                    <label for="" style="font-size:16px; margin-bottom:10px">Số tiền cần rút</label>
                                    <input type="integer" name="so_tien" style="color:black; margin-left:20px; height:50px; width:228px; border-radius:10px">
                                    @error('so_tien')
                                    <p class="text-danger mt-3" style="margin-bottom: 20px; font-size: 14px; margin-top: -20px">{{$message}}</p>
                                    @enderror()
                                </div>
                            </div>
                            <button class="tf-button-submit mg-t-15" type="submit" style="border: 1px solid ">
                                Rút tiền
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection