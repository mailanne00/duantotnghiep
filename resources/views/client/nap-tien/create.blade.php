@extends('client.layouts.app')

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
                        Ví điện tử Vn Pay
                    </h2>
                </div>
                <div class="col-md-12">
                    <div class="sc-box-icon-inner style-2">
                        <div class="sc-box-icon">
                            <h4 class="heading"><i class="fas fa-exclamation-triangle"></i><a style="margin-left: 10px">Chú ý</a> </h4>
                            <p class="content text-secondary">
                                Vui lòng quét mã QR chuyển theo nội dung trên hoá đơn. Thời gian chuyển tối đa 60 phút <br>
                            </p>
                        </div>
                        <div style="margin-left: 100px">
                            <form>
                                <fieldset>
                                    <input type="text" name="so_tien" placeholder="Nhập số tiền cần nạp"
                                           class="form-control text-white bg-dark">
                                </fieldset>
                                <button class="tf-button-submit mg-t-15" type="submit">
                                    Nạp tiền
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
