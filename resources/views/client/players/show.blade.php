@extends('client.layouts.app')

@section('title', 'Chi tiết player')

@section('header')
<link rel="stylesheet" href="{{asset('asset/css/info.css')}}">
@endsection

@section('content')
<div class="player-infomation">

    <div class="row">

        <div class="player-profile-left col-md-12 col-lg-3">

            <div class="player-profile">

                <div class="player-avt">

                    <a href="#" target="_blank"><img src="{{asset('asset/images/player_avatar.jpg')}}" alt="" class="img-fluid"></a>

                    <div class="sound-player pause">

                        <i class="fa fa-play" aria-hidden="true"></i>

                    </div>

                </div>

                <div class="rent-time-wrap">

                    <p class="ready">Đang sẵn sàng</p>

                </div>

                <div class="social-icon">

                    <div class="icon-wrap facebook">

                        <a href=""><i class="fab fa-facebook-f"></i></a>

                    </div>

                </div>

                <div class="member-since">

                    <span>Ngày tham gia</span>

                    <span>26/6/2021</span>

                </div>

                <div class="ui-category">

                    <div class="border-category">

                    </div>

                    <div class="title-category">

                        <span class="member-since-septem">Thành

                            tích</span>

                    </div>

                </div>

                <table class="table-achievement">

                    <tbody>

                        <tr style="display: flex;

                            flex-direction: column;">

                            <td><i class="fas fa-award"></i> 𝙀𝙢 𝙠𝙝𝙤̂𝙣𝙜 𝙝𝙤𝙖̀𝙣 𝙝𝙖̉𝙤, 𝙣𝙝𝙪̛𝙣𝙜 𝙚𝙢 𝙡𝙖̀ 𝙙𝙪𝙮 𝙣𝙝𝙖̂́𝙩 :)</td>

                            <td>05/11/2021</td>

                        </tr>

                        <tr style="display: flex;

                            flex-direction: column;">

                            <td><i class="fas fa-award"></i> 𝐂𝐡𝐮́𝐧𝐠 𝐭𝐚 𝐧𝐞̂𝐧 𝐘𝐄̂𝐔 𝐜𝐡𝐮̛́ đ𝐮̛̀𝐧𝐠 𝐧𝐞̂𝐧 𝐧𝐠𝐚̃ 𝐯𝐚̀𝐨 𝐓𝐈̀𝐍𝐇 𝐘𝐄̂𝐔, 𝐛𝐨̛̉𝐢 𝐠𝐢̀ 𝐛𝐚̂́𝐭 𝐤𝐢̀ 𝐜𝐚́𝐢 𝐠𝐢̀ 𝐧𝐠𝐚̃ đ𝐞̂̀𝐮 𝐬𝐞̃ Đ𝐀𝐔 :)</td>

                            <td>04/11/2021</td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

        <div class="player-profile-main col-md-12 col-lg-6">

            <div class="player-profile-main-wrap">

                <div class="d-flex justify-content-between

                    align-items-center">

                    <span class="name-player-profile">Meoo

                        Nèe💕💕💕</span>

                    <button class="btn-follow-player">

                        <i class="fas fa-heart"></i>&nbsp;<span

                            class="plus"><span>Theo

                                dõi</span></span>

                    </button>

                </div>

                <div class="row mt-4">

                    <div class="col-md-6 col-lg-3 col-6">

                        <div class="item-nav-name"><span>Số

                                người theo dõi</span></div>

                        <div class="item-nav-value">236 <span>người</span></div>

                    </div>

                    <div class="col-md-6 col-lg-3 col-6">

                        <div class="item-nav-name"><span>ĐÃ ĐƯỢC

                                THUÊ</span></div>

                        <div class="item-nav-value">236 <span>người</span></div>

                    </div>

                    <div class="col-md-6 col-lg-3 col-6">

                        <div class="item-nav-name"><span>TỶ LỆ

                                HOÀN THÀNH</span></div>

                        <div class="item-nav-value">88.8 %</div>

                    </div>

                    <div class="col-md-6 col-lg-3 col-6">

                        <div class="item-nav-name"><span>Số

                                người theo dõi</span></div>

                        <div class="item-nav-value"><i class="fas fa-ban"></i></div>

                    </div>

                </div>

                <hr />

                <div class="row">

                    <div class="col-6">

                        <p class="title-player-profile">Thông tin

                        </p>

                    </div>

                </div>

                <div class="content-player-profile">

                    <p>Baby so sweet <strong>TFT , PUBG

                            MOBILE , BUSINESS TOUR</strong></p>

                    <div class="album-of-player d-flex">

                        <a href=""><img src="{{asset('asset/images/player_avatar.jpg')}}" class="img-fluid" alt=""></a>

                        <a href=""><img src="{{asset('asset/images/player_avatar.jpg')}}" class="img-fluid" alt=""></a>

                        <a href=""><img src="{{asset('asset/images/player_avatar.jpg')}}" class="img-fluid" alt=""></a>

                        <a href=""><img src="{{asset('asset/images/player_avatar.jpg')}}" class="img-fluid" alt=""></a>

                    </div>

                    <p>Nhận TFT top 8 </p>

                    <p>Nhận TFT top 8 </p>

                    <p>Nhận TFT top 8 </p>

                    <p>Ước được rent 24h hoặc dnt hứa sẽ ngoan ạa

                    </p>

                </div>

                <hr />

                <div class="top-donate">

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                        <li class="nav-item" role="presentation">

                            <button class="nav-link

                                active" id="donate-tab" data-bs-toggle="pill" data-bs-target="#donate" type="button" role="tab" aria-controls="donate" aria-selected="false">Top

                                Donate</button>

                        </li>

                        <li class="nav-item" role="presentation">

                            <button class="nav-link" id="donate-mon-tab" data-bs-toggle="pill" data-bs-target="#donate-mon" type="button" role="tab" aria-controls="donate-mon" aria-selected="true">Top

                                Donate Tháng</button>

                        </li>



                    </ul>

                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade" id="donate-mon" role="tabpanel" aria-labelledby="donate-mon-tab">

                            <table style="width: 100%;">

                                <tbody>

                                    <tr>

                                        <th class="ky-1">#1</th>

                                        <td class="d-flex">

                                            <div class="avt

                                                avt-sm">

                                                <img src="{{asset('asset/images/page_avatar.jpg')}}" alt="" class="avt-img">

                                                <img src="{{asset('asset/images/rank-avt.png')}}" alt="" class="avt-rank">

                                            </div>

                                            <span class="name-player-review">Lyiuu</span>

                                        </td>

                                        <td class="text-end">

                                            <div class="total-amount">25,600,000 đ

                                            </div>

                                        </td>

                                    </tr>

                                    <tr>

                                        <th class="ky-1">#1</th>

                                        <td class="d-flex">

                                            <div class="avt

                                                avt-sm">

                                                <img src="{{asset('asset/images/page_avatar.jpg')}}" alt="" class="avt-img">

                                                <img src="{{asset('asset/images/rank-avt.png')}}" alt="" class="avt-rank">

                                            </div>

                                            <span class="name-player-review">Lyiuu</span>

                                        </td>

                                        <td class="text-end">

                                            <div class="total-amount">25,600,000 đ

                                            </div>

                                        </td>

                                    </tr>

                                    <tr>

                                        <th class="ky-1">#1</th>

                                        <td class="d-flex">

                                            <div class="avt

                                                avt-sm">

                                                <img src="{{asset('asset/images/page_avatar.jpg')}}" alt="" class="avt-img">

                                                <img src="{{asset('asset/images/rank-avt.png')}}" alt="" class="avt-rank">

                                            </div>

                                            <span class="name-player-review">Lyiuu</span>

                                        </td>

                                        <td class="text-end">

                                            <div class="total-amount">25,600,000 đ

                                            </div>

                                        </td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>

                        <div class="tab-pane fade show

                            active" id="donate" role="tabpanel" aria-labelledby="donate-tab">

                            <table style="width: 100%;">

                                <tbody>

                                    <tr>

                                        <th class="ky-1">#1</th>

                                        <td class="d-flex">

                                            <div class="avt

                                                avt-sm">

                                                <img src="{{asset('asset/images/page_avatar.jpg')}}" alt="" class="avt-img">

                                                <img src="{{asset('asset/images/rank-avt.png')}}" alt="" class="avt-rank">

                                            </div>

                                            <span class="name-player-review">Lyiuu</span>

                                        </td>

                                        <td class="text-end">

                                            <div class="total-amount">25,600,000 đ

                                            </div>

                                        </td>

                                    </tr>

                                    <tr>

                                        <th class="ky-1">#1</th>

                                        <td class="d-flex">

                                            <div class="avt

                                                avt-sm">

                                                <img src="{{asset('asset/images/page_avatar.jpg')}}" alt="" class="avt-img">

                                                <img src="{{asset('asset/images/rank-avt.png')}}" alt="" class="avt-rank">

                                            </div>

                                            <span class="name-player-review">Lyiuu</span>

                                        </td>

                                        <td class="text-end">

                                            <div class="total-amount">25,600,000 đ

                                            </div>

                                        </td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

                <hr />

                <div class="rating">

                    <p class="title-player-profile">Đánh giá

                    </p>

                    <div class="review-duo-player">

                        <div class="row">

                            <div class="col-sm-12">

                                <div class="full-size">

                                    <div class="review-image-small">

                                        <div class="avt

                                            avt-sm">

                                            <img src="{{asset('asset/images/page_avatar.jpg')}}" alt="" class="avt-img">

                                            <img src="{{asset('asset/images/rank-avt.png')}}" alt="" class="avt-rank">

                                        </div>

                                    </div>

                                    <div class="wrapper-content-rating">

                                        <div class="review-content">

                                            <a href="">Ducct</a>

                                            <p class="time-player-review"><span>10:53:54,

                                                    3/3/2022</span></p>

                                        </div>

                                        <div class="review-rating">

                                            <div class="rateting-style">

                                                <i class="fa

                                                    fa-star"></i>

                                                <i class="fa

                                                    fa-star"></i>

                                                <i class="fa

                                                    fa-star"></i>

                                                <i class="fa

                                                    fa-star"></i>

                                                <i class="fas fa-star-half-alt"></i>

                                            </div>

                                            <div class="time-rent-review">

                                                (<span>Thuê

                                                    1h</span>)

                                            </div>

                                        </div>

                                        <p class="content-player-review">Cảm ơn e vì tất cả =)). Chúc e 1 tháng thật thành công

                                        </p>

                                    </div>

                                </div>

                                <div class="full-size">

                                    <div class="review-image-small">

                                        <div class="avt

                                            avt-sm">

                                            <img src="{{asset('asset/images/page_avatar.jpg')}}" alt="" class="avt-img">

                                            <img src="{{asset('asset/images/rank-avt.png')}}" alt="" class="avt-rank">

                                        </div>

                                    </div>

                                    <div class="wrapper-content-rating">

                                        <div class="review-content">

                                            <a href="">Ducct</a>

                                            <p class="time-player-review"><span>10:53:54,

                                                    3/3/2022</span></p>

                                        </div>

                                        <div class="review-rating">

                                            <div class="rateting-style">

                                                <i class="fa

                                                    fa-star"></i>

                                                <i class="fa

                                                    fa-star"></i>

                                                <i class="fa

                                                    fa-star"></i>

                                                <i class="fa

                                                    fa-star"></i>

                                                <i class="fas fa-star-half-alt"></i>

                                            </div>

                                            <div class="time-rent-review">

                                                (<span>Thuê

                                                    1h</span>)

                                            </div>

                                        </div>

                                        <p class="content-player-review">Cảm ơn e vì tất cả =)). Chúc e 1 tháng thật thành công

                                        </p>

                                    </div>

                                </div>

                                <div class="full-size">

                                    <div class="review-image-small">

                                        <div class="avt

                                            avt-sm">

                                            <img src="{{asset('asset/images/page_avatar.jpg')}}" alt="" class="avt-img">

                                            <img src="{{asset('asset/images/rank-avt.png')}}" alt="" class="avt-rank">

                                        </div>

                                    </div>

                                    <div class="wrapper-content-rating">

                                        <div class="review-content">

                                            <a href="">Ducct</a>

                                            <p class="time-player-review"><span>10:53:54,

                                                    3/3/2022</span></p>

                                        </div>

                                        <div class="review-rating">

                                            <div class="rateting-style">

                                                <i class="fa

                                                    fa-star"></i>

                                                <i class="fa

                                                    fa-star"></i>

                                                <i class="fa

                                                    fa-star"></i>

                                                <i class="fa

                                                    fa-star"></i>

                                                <i class="fas fa-star-half-alt"></i>

                                            </div>

                                            <div class="time-rent-review">

                                                (<span>Thuê

                                                    1h</span>)

                                            </div>

                                        </div>

                                        <p class="content-player-review">Cảm ơn e vì tất cả =)). Chúc e 1 tháng thật thành công

                                        </p>

                                    </div>

                                </div>

                            </div>

                            <div class="col-sm-12">

                                <div class="page_account">

                                    <p class="active">1</p>

                                    <p class="">2</p>

                                    <p class="">3</p>

                                    <p class="">4</p>

                                    <p class="">5</p>

                                    <p class="active" style="cursor:

                                        auto;">1/9</p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="player-profile-right col-md-12 col-lg-3">

            <div class="player-profile-right-wrap">

                <div class="right-player-profile">

                    <p class="price-player-profile">70.000 đ/h

                    </p>

                    <div class="rateting-style">

                        <i class="fa fa-star"></i>

                        <i class="fa fa-star"></i>

                        <i class="fa fa-star"></i>

                        <i class="fa fa-star"></i>

                        <i class="fas fa-star-half-alt"></i>&nbsp;

                        <span>88 <span>Đánh giá</span></span>

                    </div>

                    <div class="text-center">

                        <button class="btn-my-style

                            red">Thuê</button>

                        <button class="btn-my-style

                            white">Donate</button>

                        <button class="btn-my-style

                            white"><i class="fas fa-comment-alt"></i>Chat</button>

                    </div>

                </div>



            </div>

        </div>



    </div>

</div>
@endsection

@section('footer')
<script>
    var header = $('header.menu__header');

    $(window).scroll(function() {

        if ($(window).scrollTop() > 200) {

            header.addClass('fix-menu')

        } else {

            header.removeClass('fix-menu')

        }

    });

    $('.navbar-right .mobile-search').click(function() {

        $('.menu__header .mobile-input-search').toggleClass("d-block");

    });
</script>
@endsection