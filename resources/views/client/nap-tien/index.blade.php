@extends('client.layouts.app')
@section('title', 'Nạp tiền')
@section('content')
    <section class="flat-title-page inner">
        <div class="overlay"></div>
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading mg-bt-12">
                        <h1 class="heading text-center">Nạp tiền</h1>
                    </div>
                    <div class="breadcrumbs style2">
                        <ul>
                            <li><a href="index-2.html">Trang chủ</a></li>
                            <li><a href="#">Thông tin cá nhân</a></li>
                            <li>Nạp tiền</li>
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
                        Chọn phương thức thanh toán
                    </h2>
                </div>
                <div class="col-md-12">
                    <div class="sc-box-icon-inner style-2">
                        <div class="sc-box-icon">
                            <div class="img">
                                <img src="{{asset('assets/images/logo/vnpay.jpg')}}" alt="Image" width="50px" style="border-radius: 10%">
                            </div>
                            <h4 class="heading"><a href="{{route('client.napTien.create')}}">Ví điện tử VN Pay</a> </h4>
                            <p class="content text-success">Không mất phí</p>
                        </div>
                        <div class="sc-box-icon">
                            <div class="img">
                                <img src="{{asset('assets/images/logo/zalopay.webp')}}" alt="Image" width="50px" style="margin-bottom: 8px">
                            </div>
                            <h4 class="heading"><a>Ví điện tử Zalo Pay</a> </h4>
                            <p class="content text-danger">Chưa hỗ trợ</p>
                        </div>
                        <div class="sc-box-icon">
                            <div class="img">
                                <img src="{{asset('assets/images/logo/bank3.jpg')}}" alt="Image" width="50px" style="border-radius: 10%;margin-top: -10px">
                            </div>
                            <h4 class="heading"><a>Tài khoản ngân hàng</a> </h4>
                            <p class="content text-danger">Chưa hỗ trợ</p>
                        </div>
                        <div class="sc-box-icon">
                            <div class="img">
                                <img src="{{asset('assets/images/logo/momo.png')}}" alt="Image" width="50px" style="margin-top: -10px">
                            </div>
                            <h4 class="heading"><a> Ví điện tử Momo</a></h4>
                            <p class="content text-danger">Chưa hỗ trợ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
