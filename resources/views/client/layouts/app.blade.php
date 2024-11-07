<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title','Đây là trang chủ')</title>

    <link rel="icon" href="{{ asset('asset/images/logoPD.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('asset/css/normalize.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/11.1.0/nouislider.min.css" />

    <link rel="stylesheet" href="{{asset('asset/font-awesome/css/all.css')}}">

    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">

    <link rel="stylesheet" href="{{asset('asset/css/responsive.css')}}">

    @yield('header')

</head>



<body>

    <header class="menu__header">

        <div class="navbar-header">

            <a href="./index.html" class="logo">

                <img src="{{asset('asset/images/logoPD.png')}}" alt="logo playerduo">

                <!-- <div class="text-logo d-lg-block d-none">

                    <h4>PLAYERDUO</h4>

                    <p>GAME COMMUNITY</p>

                </div> -->

            </a>

        </div>

        <div class="navbar p-0">

            <ul class="navbar-center">

                <!-- <li class="item active"><a href=""><span>Thuê người chơi</span></a></li>

                <li class="item"><a href=""><span>Kết nối</span></a></li>

                <li class="item"><a href="" data-bs-toggle="modal" data-bs-target="#rank" aria-hidden="true"><span>BXH</span></a></li> -->

                <!-- <li class="item-search">

                    <form action="">

                        <input type="text" class="form-control" placeholder="Nickname/Url ...">

                        <button type="button"><i class="fa fa-search" aria-hidden="true"></i></button>

                    </form>

                </li> -->

            </ul>

            <ul class="navbar-right">

                <li class="item-icon mobile-search">

                    <a class="dropdown-toggle">

                        <div class="item-title"><i class="fa fa-bars" aria-hidden="true"></i></div>

                    </a>

                </li>

                <li class="item-icon facebook">

                    <a href="" class="dropdown-toggle" id="dropdown-facebook" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">

                        <i class="fab fa-facebook-f"></i></a>

                    <div class="dropdown-menu p-2 facebook-dp" aria-labelledby="dropdown-facebook">

                        <p>Group</p>

                        <p>Fanpage</p>

                    </div>

                </li>

                <li class="item-icon group-fb"><a href="" class="group-user" data-bs-toggle="modal" data-bs-target="#rank" aria-hidden="true"><i class="far fa-trophy-alt"></i></a></li>

                <li class="item-icon">  

                    <a href="" class="dropdown-toggle" id="dropdown-bell" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">

                        <i class="far fa-bell"></i></a>

                    <div class="dropdown-menu" aria-labelledby="dropdown-bell">

                        <div class="content">

                            <div class="tab-notif-common d-flex justify-content-between">

                                <h5>Thông báo</h5>

                                <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">

                                    <li class="nav-item" role="presentation">

                                        <button class="nav-link  active" id="notification-tab" data-bs-toggle="pill" data-bs-target="#notification" type="button" role="tab" aria-controls="notification" aria-selected="false">Chính</button>

                                    </li>

                                    <li class="nav-item" role="presentation">

                                        <button class="nav-link" id="other-noti-tab" data-bs-toggle="pill" data-bs-target="#other-noti" type="button" role="tab" aria-controls="other-noti" aria-selected="true">Khác</button>

                                    </li>



                                </ul>

                            </div>

                            <div class="tab-content" id="pills-tab2Content">

                                <div class="tab-pane fade" id="other-noti" role="tabpanel" aria-labelledby="other-noti-tab">

                                    ...

                                </div>

                                <div class="tab-pane fade show  active" id="notification" role="tabpanel" aria-labelledby="notification-tab">

                                    ...

                                </div>

                            </div>

                        </div>

                    </div>

                </li>

                <li class="item-icon">

                    <a href="" class="dropdown-toggle" id="dropdown-users" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">

                        <i class="far fa-users"></i></a>

                    <div class="dropdown-menu" aria-labelledby="dropdown-users">

                        <div class="content">

                            <div class="tab-notif-common d-flex justify-content-between">

                                <h5>Người dùng</h5>

                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                    <li class="nav-item" role="presentation">

                                        <button class="nav-link  active" id="notification-tab" data-bs-toggle="pill" data-bs-target="#notification" type="button" role="tab" aria-controls="notification" aria-selected="false">Theo dõi</button>

                                    </li>

                                    <li class="nav-item" role="presentation">

                                        <button class="nav-link" id="other-noti-tab" data-bs-toggle="pill" data-bs-target="#other-noti" type="button" role="tab" aria-controls="other-noti" aria-selected="true">Tương tác</button>

                                    </li>

                                </ul>

                            </div>

                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade" id="other-noti" role="tabpanel" aria-labelledby="other-noti-tab">

                                    ...

                                </div>

                                <div class="tab-pane fade show  active" id="notification" role="tabpanel" aria-labelledby="notification-tab">

                                    ...

                                </div>

                            </div>

                        </div>

                    </div>

                </li>

                <li class="item-icon balance d-lg-block d-none">

                    <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" aria-hidden="true"><i

                            class="fas fa-plus"></i> 0 đ</a>

                </li>

                <li class="item-icon item-avatar">

                    <a href="" class="d-flex justify-content-center align-items-center" id="header-nav-dropdown" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{asset('asset/images/avatar5.png')}}" alt="" width="43px" height="43px"></a>

                    <ul role="menu" class="dropdown-menu" aria-labelledby="header-nav-dropdown">

                        <li class="page-user">

                            <a tabindex="-1" href="./profile.html"><img src="{{asset('asset/images/avatar5.png')}}" class="avt-img" alt="PD">

                                <div class="text-logo">

                                    <h5>hoact</h5>

                                    <p>ID : <span>hoact</span></p>

                                    <p class="label-user-page"><span>Xem trang cá nhân của bạn</span></p>

                                </div>

                            </a>

                        </li>

                        <li class="menu-item hidden-lg hidden-md">

                            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" aria-hidden="true" href="#"><i class="fa fa-plus"></i> <span>Số dư</span> : <span

                                    class="money">0

                                    đ</span></a>

                        </li>

                        <li class="menu-item"><a tabindex="-1" href="./withdraw.html"><i class="fas fa-minus"></i> <span>Rút

                                    tiền</span></a></li>

                        <li class="menu-item"><a tabindex="-1" href="./cards.html"><i class="fas fa-credit-card"></i> <span>Mua

                                    thẻ</span></a></li>

                        <li class="menu-item"><a tabindex="-1" href="./security.html"><i class="fas fa-user-lock"></i><span>Tạo khóa bảo vệ</span></a></li>

                        <li class="menu-item"><a tabindex="-1" href="./balance_fluctuation.html"><i class="fas fa-clock"></i><span>Lịch sử giao dịch</span></a></li>

                        <li class="menu-item"><a tabindex="-1" href="./following.html"><i class="fas fa-users"></i> <span>Danh sách theo

                                    dõi</span></a></li>

                        <li class="menu-item"><a tabindex="-1" href="./customer_info.html"><i class="fas fa-cogs"></i> <span>Cài đặt tài

                                    khoản</span></a></li>

                        <li class="menu-item"><a tabindex="-1" href="./login.html"><i class="fas fa-power-off"></i> <span>Đăng

                                    xuất</span></a></li>

                        <div class="menu-item list-flag">

                            <div class="flag-all active"><img src="https://files.playerduo.com/production/static-files/flag/2.png" class="flag flag-vn" alt="PD"></div>

                            <div class="flag-all false"><img src="https://files.playerduo.com/production/static-files/flag/1.png" class="flag flag-en" alt="PD"></div>

                        </div>

                    </ul>

                </li>



            </ul>

        </div>

        <div class="mobile-input-search">

            <div class="group-search">

                <span class="search input-group">

                    <input placeholder="Nickname/Url ..." type="text" class="form-control" value="">

                    <span class="input-group-addon">

                        <button type="button" class="btn btn-default"><i class="fa fa-search"

                                aria-hidden="true"></i></button>

                    </span>

                </span>

            </div>

            <!-- <div class="link-mobile">

                <li class="item active"><a href="/"><span>Thuê người chơi</span></a></li>

                <li class="item false"><a href="/connect"><span>Kết nối</span></a></li>

                <li class="item"><a data-bs-toggle="modal" data-bs-target="#rank" aria-hidden="true"><span>BXH</span></a></li>

            </div> -->

        </div>

    </header>

    <div class="wrapper">

        <div class="container">

            @yield('content')

        </div>

    </div>

    <!-- Nạp tiền player duo -->

    <div class="recharge-modal modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title text-center text-uppercase" id="staticBackdropLabel">NẠP TIỀN VÀO PLAYER DUO

                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <div id="accordion-controlled-example" role="tablist" class="panel-group accordion">

                        <div class="accordion-item">

                            <div role="tab" id="headingOne" class="panel-heading accordion-header">

                                <div class="panel-title">

                                    <a href="#" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                                        <div class="option d-flex"><img src="https://files.playerduo.com/production/static-files/icon/bank.png" alt="PD" class="option-icon img-rounded">

                                            <div class="option-title">

                                                <p><span>Chuyển khoản qua ngân hàng</span><span class="cl-red">(Khuyến

                                                        nghị )</span></p>

                                                <p><span>Miễn phí. Hỗ trợ từ 8:30 đến 22:00 hàng ngày (Trừ chủ nhật và

                                                        các ngày lễ)</span></p>

                                            </div>

                                        </div>

                                    </a>

                                </div>

                            </div>

                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion-controlled-example">

                                <div class="accordion-body option-content panel-body">

                                    <div class="Bank__Recharge--list">

                                        <div class="row">

                                            <div class="col-md-3 col-xs-6">

                                                <div class="item-bank "><img src="https://playerduo-data.sgp1.cdn.digitaloceanspaces.com/production/static-files/bank/vietcombank.png" class="" alt="https://playerduo-data.sgp1.cdn.digitaloceanspaces.com/production/static-files/bank/vietcombank.png"></div>

                                            </div>

                                            <div class="col-md-3 col-xs-6">

                                                <div class="item-bank "><img src="https://playerduo-data.sgp1.cdn.digitaloceanspaces.com/production/static-files/bank/viettinbank.png" class="" alt="https://playerduo-data.sgp1.cdn.digitaloceanspaces.com/production/static-files/bank/viettinbank.png"></div>

                                            </div>

                                            <div class="col-md-3 col-xs-6">

                                                <div class="item-bank "><img src="https://playerduo-data.sgp1.cdn.digitaloceanspaces.com/production/static-files/bank/techcombank.png" class="" alt="https://playerduo-data.sgp1.cdn.digitaloceanspaces.com/production/static-files/bank/techcombank.png"></div>

                                            </div>

                                        </div><br>

                                        <div class="row">

                                            <div class="col-xs-12">

                                                <form>

                                                    <div class="fieldGroup "><input type="text" name="amount" placeholder="Số tiền muốn nạp (VND)" maxlength="5000" autocomplete="false" value=""></div>

                                                    <p class="text-center"><button type="submit" class="btn btn-success">Nạp tiền</button></p>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                    <hr>

                                    <div class="Bank__Recharge--submit">

                                        <div class="sub-info">

                                            <p><span>* Hỗ trợ từ 8:30 đến 22:00 hằng ngày (Trừ CN)</span></p>

                                            <p><span>* Nếu bạn có vấn đê cần hỗ trợ:</span> <a href="https://www.facebook.com/playerduo/" target="_blank" rel="noopener noreferrer"><span>Chat ngay</span></a></p>

                                        </div>

                                        <div class="sub-form">

                                            <div class="fieldGroup "><input type="text" name="code" placeholder="Mã nạp tiền" maxlength="5000" autocomplete="false" value=""></div>

                                            <div class="btn__fill"><button disabled="" type="button" class="pull-right btn btn-danger"><span>Thông báo</span></button></div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="accordion-item">

                            <div role="tab" id="heading3" class="panel-heading accordion-header">

                                <div class="panel-title">

                                    <a href="#" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">

                                        <div class="option d-flex"><img src="https://files.playerduo.com/production/static-files/icon/player-card.png" alt="PD" class="option-icon img-rounded">

                                            <div class="option-title">

                                                <p><span>Nạp tiền bằng thẻ cào Player Code</span></p>

                                                <p><span>Player Code</span></p>

                                            </div>

                                        </div>

                                    </a>

                                </div>

                            </div>

                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordion-controlled-example">

                                <div class="accordion-body option-content panel-body">

                                    <div>

                                        <div>

                                            <ul class="row">

                                                <li class="col-sm-4 position-relative">

                                                    <div class="type-card-playercode"><img src="https://files.playerduo.com/production/static-files/card/playercode.png" alt="PD" class="img-thumbnail"><span class="discount-card">-10%</span></div>

                                                </li>

                                            </ul>

                                            <p><a href="https://playerduo.com/partner" rel="noopener noreferrer" target="_blank"><i class="fas fa-map-marker-alt"></i>&nbsp;<span>Xem nơi bán Player Code gần bạn</span></a>.</p>

                                            <hr>

                                            <form class="card pd-code">

                                                <div class="row">

                                                    <div class="col-md-6">

                                                        <div class="form-group">

                                                            <div class="fieldGroup "><input type="text" name="seriesNumber" placeholder="" maxlength="255" autocomplete="false" value=""></div>

                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="form-group">

                                                            <div class="fieldGroup "><input type="text" name="cardNumber" placeholder="" maxlength="255" autocomplete="false" value=""></div>

                                                        </div>

                                                    </div><i class="fas fa-minus common__space"></i></div>

                                                <div class="recaptcha">

                                                    <div id="pc" class="g-recaptcha" data-sitekey="6LfJeF8UAAAAAN5D0Ylx8PQAeYjmEHR4G2hY9pdb" data-theme="light" data-type="image" data-size="normal" data-badge="bottomright" data-tabindex="0">

                                                        <div style="width: 304px; height: 78px;">

                                                            <div><iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfJeF8UAAAAAN5D0Ylx8PQAeYjmEHR4G2hY9pdb&amp;co=aHR0cHM6Ly9wbGF5ZXJkdW8uY29tOjQ0Mw..&amp;hl=vi&amp;type=image&amp;v=2uoiJ4hP3NUoP9v_eBNfU6CR&amp;theme=light&amp;size=normal&amp;badge=bottomright&amp;cb=2eu9kzqz6qmp"

                                                                    width="304" height="78" role="presentation" name="a-1iutqbfswf0a" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div>

                                                            <textarea id="g-recaptcha-response-4" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>

                                                        </div>

                                                    </div>

                                                </div>

                                                <p class="text-center"><button type="submit" class="btn btn-success"><span>Nạp tiền</span></button></p>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="accordion-item">

                            <div role="tab" id="heading4" class="panel-heading accordion-header">

                                <div class="panel-title">

                                    <a href="#" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">

                                        <div class="option d-flex"><img src="https://files.playerduo.com/production/static-files/icon/mobile-card.png" alt="PD" class="option-icon img-rounded">

                                            <div class="option-title">

                                                <p><span>Nạp tiền bằng thẻ cào điện thoại</span></p>

                                                <p><span>Mobile Card</span></p>

                                            </div>

                                        </div>

                                    </a>

                                </div>

                            </div>

                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordion-controlled-example">

                                <div class="accordion-body option-content panel-body">

                                    <div>

                                        <div>

                                            <ul class="row">

                                                <li class="col-sm-4">

                                                    <div class="type-card-mobile card--active"><img src="https://files.playerduo.com/production/static-files/card/viettel.png" alt="PD" class="img-thumbnail"><span class="discount-mobile">-35%</span></div>

                                                </li>

                                                <li class="col-sm-4">

                                                    <div class="type-card-mobile"><img src="https://files.playerduo.com/production/static-files/card/mobiphone.png" alt="PD" class="img-thumbnail"><span class="discount-mobile">-35%</span></div>

                                                </li>

                                                <li class="col-sm-4">

                                                    <div class="type-card-mobile"><img src="https://files.playerduo.com/production/static-files/card/vinaphone.png" alt="PD" class="img-thumbnail"><span class="discount-mobile">-35%</span></div>

                                                </li>

                                            </ul>

                                            <hr>

                                            <div class="bg-warning"><span>Vui lòng chọn đúng mệnh giá thẻ, nếu chọn sai mệnh giá sẽ bị trừ 50% giá trị thẻ.</span></div>

                                            <form class="card">

                                                <div class="row">

                                                    <div class="col-md-12">

                                                        <div class="form-group">

                                                            <div class="fieldGroup">

                                                                <p class="control-label"><span>Mệnh giá thẻ:</span></p><select class="form-control" name="moneyNumber"><option value="">Vui lòng chọn</option><option value="10000">10,000đ (-35%)</option><option value="20000">20,000đ (-35%)</option><option value="50000">50,000đ (-35%)</option><option value="100000">100,000đ (-35%)</option><option value="200000">200,000đ (-35%)</option><option value="500000">500,000đ (-35%)</option></select></div>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">

                                                        <div class="form-group">

                                                            <div class="fieldGroup ">

                                                                <p class="control-label"><span>Số series:</span></p><input type="text" name="mobileSeri" placeholder="" maxlength="5000" autocomplete="false" value=""></div>

                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="form-group">

                                                            <div class="fieldGroup ">

                                                                <p class="control-label"><span>Mã thẻ:</span></p><input type="text" name="mobileCardNumber" placeholder="" maxlength="5000" autocomplete="false" value=""></div>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="recaptcha">

                                                    <div id="mc" class="g-recaptcha" data-sitekey="6LfJeF8UAAAAAN5D0Ylx8PQAeYjmEHR4G2hY9pdb" data-theme="light" data-type="image" data-size="normal" data-badge="bottomright" data-tabindex="0">

                                                        <div style="width: 304px; height: 78px;">

                                                            <div><iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=2&amp;k=6LfJeF8UAAAAAN5D0Ylx8PQAeYjmEHR4G2hY9pdb&amp;co=aHR0cHM6Ly9wbGF5ZXJkdW8uY29tOjQ0Mw..&amp;hl=vi&amp;type=image&amp;v=2uoiJ4hP3NUoP9v_eBNfU6CR&amp;theme=light&amp;size=normal&amp;badge=bottomright&amp;cb=mnqbztqamlyw"

                                                                    width="304" height="78" role="presentation" name="a-ajhz6twbnr8t" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div>

                                                            <textarea id="g-recaptcha-response-5" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>

                                                        </div><iframe style="display: none;"></iframe></div>

                                                </div>

                                                <p class="text-center"><button type="submit" class="btn btn-success"><span>Nạp tiền</span></button></p>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <div class="accordion-item">

                            <div role="tab" id="heading5" class="panel-heading accordion-header">

                                <div class="panel-title">

                                    <a href="#" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapse5">

                                        <div class="option d-flex"><img src="https://files.playerduo.com/production/static-files/icon/atm-card.png" alt="PD" class="option-icon img-rounded">

                                            <div class="option-title">

                                                <p><span>Thanh toán trực tiếp qua Internet Banking.</span></p>

                                                <p><span>Phí 1.760đ + 3% giá trị nạp</span></p>

                                            </div>

                                        </div>

                                    </a>

                                </div>

                            </div>

                            <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordion-controlled-example">

                                <div class="accordion-body option-content panel-body">

                                    <div>

                                        <div>

                                            <div class="bank-list  row">

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/1.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/116.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/173.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/174.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/175.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/176.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/177.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/178.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/179.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/168.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/180.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/127.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/87.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/84.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/83.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/108.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/95.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/81.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/121.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/136.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/117.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/110.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/82.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/113.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/99.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/114.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/105.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/135.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/120.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/163.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/107.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/94.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/106.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/111.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/164.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/129.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/101.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/131.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/166.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/134.png" alt="PD" class="img-thumbnail"></div>

                                                <div class="bank col-md-2 col-xs-3"><img src="https://cdn.baokim.vn/public/uploads/banks/124.png" alt="PD" class="img-thumbnail"></div>

                                            </div>

                                            <div class="form-recharge hide-form-recharge row">

                                                <div class="col-xs-12"><button type="button" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i><span>Chọn lại</span></button>

                                                    <p></p>

                                                    <form>

                                                        <div class="fieldGroup "><input type="text" name="amount" placeholder="Số tiền muốn nạp (VND)" maxlength="5000" autocomplete="false" value=""></div>

                                                        <p class="text-center"><button type="submit" class="btn btn-success"><span>Nạp tiền</span></button></p>

                                                    </form>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="accordion-item">

                            <div role="tab" id="headingTwo" class="panel-heading accordion-header">

                                <div class="panel-title">

                                    <a href="#" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

                                        <div class="option d-flex"><img src="https://files.playerduo.com/production/static-files/icon/qr_code.png" alt="PD" class="option-icon img-rounded">

                                            <div class="option-title">

                                                <p><span>Thanh toán trực tiếp qua QR Code</span></p>

                                                <p><span>Phí 3% giá trị nạp</span></p>

                                            </div>

                                        </div>

                                    </a>

                                </div>

                            </div>

                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion-controlled-example">

                                <div class="accordion-body option-content panel-body">

                                    <div>

                                        <div class="form-recharge row">

                                            <div class="col-xs-12">

                                                <form>

                                                    <div class="fieldGroup "><input type="text" name="amount" placeholder="Số tiền muốn nạp (VND)" maxlength="5000" autocomplete="false" value=""></div>

                                                    <p class="text-center"><button type="submit" class="btn btn-success"><span>Nạp tiền</span></button></p>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="accordion-item">

                            <div role="tab" id="heading2" class="panel-heading accordion-header">

                                <div class="panel-title">

                                    <a href="#" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">

                                        <div class="option d-flex"><img src="https://files.playerduo.com/production/static-files/icon/paypal.png" alt="PD" class="option-icon img-rounded">

                                            <div class="option-title">

                                                <p><span>Thanh toán qua Paypal</span>.</p>

                                                <p><span>Phí tùy vào đại lý</span></p>

                                            </div>

                                        </div>

                                    </a>

                                </div>

                            </div>

                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordion-controlled-example">

                                <div class="accordion-body option-content panel-body">

                                    <p><span>Danh sách đại lý bán Player Code qua Paypal</span>:</p>

                                    <p><a href="https://www.facebook.com/moonho93" rel="noopener noreferrer" target="_blank">Hồ Như Nguyệt</a></p>

                                </div>

                            </div>

                        </div>





                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="close-btn btn btn-default" data-bs-dismiss="modal">Đóng</button>

                </div>

            </div>

        </div>

    </div>

    <!-- Bảng xếp hạng -->

    <div class="modal fade rank-modal" id="rank" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="rankLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title text-center text-uppercase" id="rankLabel">BẢNG XẾP HẠNG ĐẠI GIA

                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <ul class="nav rank-modal-tab mb-3 justify-content-center" id="pills-tab1" role="tablist">

                        <li class="nav-item" role="presentation">

                            <a class="nav-link active" id="pills-home-tab1" data-bs-toggle="pill" data-bs-target="#pills-home1" role="tab" aria-controls="pills-home1" aria-selected="true"><span>Hôm nay</span></a>

                        </li>

                        <li class="nav-item" role="presentation">

                            <a class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill" data-bs-target="#pills-profile1" role="tab" aria-controls="pills-profile1" aria-selected="false"><span>7 ngày qua</span></a>

                        </li>

                        <li class="nav-item" role="presentation">

                            <a class="nav-link" id="pills-contact-tab3" data-bs-toggle="pill" data-bs-target="#pills-contact1" role="tab" aria-controls="pills-contact1" aria-selected="false"><span>30 ngày qua</span></a>

                        </li>

                    </ul>

                    <div class="tab-content" id="pills-tab1Content">

                        <div class="tab-pane fade show active" id="pills-home1" role="tabpanel" aria-labelledby="pills-home-tab1">

                            <div class="mt-5">

                                <div class="top-info-section"><img src="https://playerduo.com/api/upload-service/images/13d6afc5-2cfb-4247-b041-952a7b929582__131d2c70-5fae-11ec-ba40-b5b607f164e2__page_avatar.jpg" class="" alt="top donate"><img src="https://files.playerduo.com/production/static-files/no1_top_list.png"

                                        class="background-top1" alt="s">

                                    <p style="margin-top: 25px;"><span><a href="/page5ff8cea655977e2f46a923cb"

                                                target="_blank" rel="noopener noreferrer"

                                                style="font-weight: bold;">Hào Nguyễn </a></span></p>

                                    <p style="font-weight: bold;">15,000,000 đ</p>

                                </div>

                                <ul class="rank-list">

                                    <li>

                                        <div class="rank-list__info">

                                            <p class="rank-list__index" style="width: 25px;">#10</p>

                                            <div class="avt avt-xs"><img src="https://playerduo.com/api/upload-service/images/284e5176-8514-4d30-ab17-9ebb5c3acfc4__a6793ab0-31e4-11ec-851f-6161af46f080__page_avatar.jpg" class="avt-img" alt="PD"><img src="https://files.playerduo.com/production/images/new-rankvip/10.png"

                                                    class="vip-avatar undefined" alt="PD" style="height: 17px; width: 17px;"></div>

                                            <p class="name-player-review color-vip-1">Văn Mít </p>

                                        </div>

                                        <p class="rank-list__money" style="margin-right: 0px;">45,665,000 đ</p>

                                    </li>

                                </ul>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="pills-profile1" role="tabpanel" aria-labelledby="pills-profile-tab2">

                            <div class="mt-5">

                                <div class="top-info-section"><img src="https://playerduo.com/api/upload-service/images/8bc40fcc-b016-45c7-8233-26fa4f55fc4e__ece7fa20-a83d-11ec-ba40-b5b607f164e2__page_avatar.jpg" class="" alt="top donate"><img src="https://files.playerduo.com/production/static-files/no1_top_list.png"

                                        class="background-top1" alt="s">

                                    <p style="margin-top: 25px;"><span><a href="/page60f2f84a10abd358da162c70"

                                                target="_blank" rel="noopener noreferrer"

                                                style="font-weight: bold;">✨KEM•KHUM•TỆ 👌 </a></span></p>

                                    <p style="font-weight: bold;">32,568,000 đ</p>

                                </div>

                                <ul class="rank-list">

                                    <li>

                                        <div class="rank-list__info">

                                            <p class="rank-list__index" style="width: 25px;">#10</p>

                                            <div class="avt avt-xs"><img src="https://playerduo.com/api/upload-service/images/284e5176-8514-4d30-ab17-9ebb5c3acfc4__a6793ab0-31e4-11ec-851f-6161af46f080__page_avatar.jpg" class="avt-img" alt="PD"><img src="https://files.playerduo.com/production/images/new-rankvip/10.png"

                                                    class="vip-avatar undefined" alt="PD" style="height: 17px; width: 17px;"></div>

                                            <p class="name-player-review color-vip-1">Văn Mít </p>

                                        </div>

                                        <p class="rank-list__money" style="margin-right: 0px;">45,665,000 đ</p>

                                    </li>

                                </ul>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="pills-contact1" role="tabpanel" aria-labelledby="pills-contact-tab3">

                            <div class="mt-5">

                                <div class="top-info-section"><img src="https://playerduo.com/api/upload-service/images/11c77d6b-ddbc-47b4-bd07-4a0531e4a236__8e58ac60-92b3-11ec-ba40-b5b607f164e2__page_avatar.jpg" class="" alt="top donate"><img src="https://files.playerduo.com/production/static-files/no1_top_list.png"

                                        class="background-top1" alt="s">

                                    <p style="margin-top: 25px;"><span><a href="/hiencute1" target="_blank"

                                                rel="noopener noreferrer" style="font-weight: bold;">Neih1 </a></span>

                                    </p>

                                    <p style="font-weight: bold;">255,849,000 đ</p>

                                </div>

                                <ul class="rank-list">

                                    <li>

                                        <div class="rank-list__info">

                                            <p class="rank-list__index" style="width: 25px;">#10</p>

                                            <div class="avt avt-xs"><img src="https://playerduo.com/api/upload-service/images/284e5176-8514-4d30-ab17-9ebb5c3acfc4__a6793ab0-31e4-11ec-851f-6161af46f080__page_avatar.jpg" class="avt-img" alt="PD"><img src="https://files.playerduo.com/production/images/new-rankvip/10.png"

                                                    class="vip-avatar undefined" alt="PD" style="height: 17px; width: 17px;"></div>

                                            <p class="name-player-review color-vip-1">Văn Mít </p>

                                        </div>

                                        <p class="rank-list__money" style="margin-right: 0px;">45,665,000 đ</p>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-danger"><span>Bảng xếp hạng đại gia</span></button>

                    <button type="button" class="btn btn-default"><span>Bảng xếp hạng thu nhập</span></button>

                </div>

            </div>

        </div>

    </div>

</body>

<script src="{{asset('asset/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('asset/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('asset/js/popper.min.js')}}"></script>

<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/11.1.0/nouislider.min.js"></script>



<script>

    //fix menu when scroll

    $(window).scroll(function() {

        if ($(window).scrollTop() > 200) {

            $('header.menu__header').addClass('fix-menu')

        } else {

            $('header.menu__header').removeClass('fix-menu')

        }

    });

    //menu mobile

    $('.navbar-right .mobile-search').click(function() {

        $('.menu__header .mobile-input-search').toggleClass("d-block");

    });

    //filter 

    $('.filter-player .form-control.ready').click(function() {

        $(this).toggleClass("false");

        $(this).toggleClass("check");

    });

    $('.filter-player .form-control.online').click(function() {

        $(this).toggleClass("false");

        $(this).toggleClass("check");

    });

    // noSlider price

    $(function() {

        var $propertiesForm = $('.mall-category-filter');



        $propertiesForm.on('submit', function(e) {

            e.preventDefault();



            $.publish('mall.category.filter.start')

            $(this).request('categoryFilter::onSetFilter', {

                loading: $.oc.stripeLoadIndicator,

                complete: function(response) {

                    $.oc.stripeLoadIndicator.hide()

                    if (response.responseJSON.hasOwnProperty('queryString')) {

                        history.replaceState(null, '', '?' + response.responseJSON.queryString)

                    }

                    $('[data-filter]').hide()

                    if (response.responseJSON.hasOwnProperty('filter')) {

                        for (var filter of Object.keys(response.responseJSON.filter)) {

                            $('[data-filter="' + filter + '"]').show();

                        }

                    }

                    $.publish('mall.category.filter.complete')

                },

                error: function() {

                    $.oc.stripeLoadIndicator.hide()

                    $.oc.flashMsg({

                        text: 'Fehler beim Ausführen der Suche.',

                        class: 'error'

                    })

                    $.publish('mall.category.filter.error')

                }

            });

        });



        $('.mall-slider-handles').each(function() {

            var el = this;

            noUiSlider.create(el, {

                start: [el.dataset.start, el.dataset.end],

                connect: true,

                step: 5000,

                range: {

                    min: [parseInt(el.dataset.min)],

                    max: [parseInt(el.dataset.max)]

                },



            }).on('change', function(values) {

                $('[data-min="' + el.dataset.target + '"]').val(new Intl.NumberFormat().format(parseInt(values[0])))

                $('[data-max="' + el.dataset.target + '"]').val(new Intl.NumberFormat().format(parseInt(values[1])))

                $('#dropdown-price').html(`${new Intl.NumberFormat().format(parseInt(values[0]))} - ${new Intl.NumberFormat().format(parseInt(values[1]))}`)

                $('#dropdown-price').addClass('check');

                if (parseInt(values[0]) == parseInt(el.dataset.min) && parseInt(values[1]) == parseInt(el.dataset.max)) {

                    $('#dropdown-price').removeClass('check');

                    $('#dropdown-price').html('Khoảng giá');

                }

                $propertiesForm.trigger('submit');

            });

        })

    })

    $("input[name='city[]']").change(function() {

        var list = $("input[name='city[]']:checked").map(function() {

            return this.value;

        }).get();

        $('#dropdown-city').val(list)

    });

</script>

@yield('footer')

</html>