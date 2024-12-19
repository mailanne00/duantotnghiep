<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->


<!-- Mirrored from themesflat.co/html/axiesv/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2024 04:36:31 GMT -->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Play duo</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="assets/images/logo/PLAYERDUO.png" >
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/icon/Favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chatbox.css') }}">

    @yield('css')
    <style>
        .flat-title-page.style3 .heading{
            font-size: 39px;
            line-height: 47px
        }

        h2 {
            font-size: 23px !important;
        }

        h4 {
            font-size: 16px !important;
        }

        .sc-button.loadmore {
            padding: 12px 22px;
        }

        h3 {
            font-size: 18px !important;
        }

        h1{
            font-size: 30px;
        }

        h5 {
            font-size: 15px;
        }
        .tf-section.wrap-accordion .container{
            width: 1410px;
            max-width: 1410px;
        }

        h6 {
            font-size: 15px !important;
        }

        .flat-accordion2 .flat-toggle2 .toggle-content p{
            font-size: 13px;
        }
    </style>
    <style>
    .modal-content {
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        min-height: 60vh;
    }

    .modal-header {
        border-bottom: 2px solid #007bff;
    }

    .modal-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .modal-body {
        padding: 20px;
        height: calc(100% - 120px);
        overflow-y: auto;
    }

    .form-label {
        font-weight: bold;
    }

    textarea.form-control {
        resize: none;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .text-muted {
        font-size: 0.9rem;
    }

    .video-container {
        flex: 1;
        width: 80%;
        height: 80%;
        position: relative;
    }

    #modalVideo {
        width: 80%;
        height: 80%;
        object-fit: cover;
        border-radius: 10px;
    }

    .video-info {
        flex: 1;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .video-info h6 {
        font-weight: bold;
        font-size: 1.2rem;
        margin-bottom: 5px;
    }

    .video-info p {
        margin: 5px 0;
    }

    .video-info .btn {
        margin-right: 10px;
    }

    .video-info .form-control {
        margin-top: 10px;
    }

    .video-info .form-control::placeholder {
        color: #aaa;
    }

    .bi-heart, .bi-chat {
        margin-right: 5px;
    }

    @media (max-width: 768px) {
        .modal-dialog {
            max-width: 80%;
            width: 80%;
        }

        .video-container {
            max-width: 100%;
        }
    }

    .story-card:first-child {
        border: 3px solid #003366; 
    }

    .story-card {
        flex: 0 0 calc(25% - 20px); 
        max-width: 200px; 
        height: 300px; 
        border-radius: 10px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .story-card img, 
    .story-card video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .story-card:hover {
        transform: scale(1.05);
    }

    .story-footer {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.5);
        color: white;
        text-align: center;
        padding: 5px;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .story-badge {
        position: absolute;
        bottom: 5px;
        right: 5px;
        color: white;
        font-size: 0.8rem;
        background: rgba(0, 0, 0, 0.5);
        padding: 2px 6px;
        border-radius: 10px;
    }

    .story-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        padding: 20px;
    }

    #videoPreviewContainer {
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    #videoPreviewContainer:hover {
        background-color: #f8f9fa;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }
</style>
</head>

<body class="body header-fixed is_dark connect-wal" style="background-color: #14141F;">

    <!-- preloade -->
{{--    <div class="preload preload-container">--}}
{{--        <div class="preload-logo"></div>--}}
{{--    </div>--}}
    <!-- /preload -->

    <div id="wrapper">
        <div id="page" class="clearfix">
            <header id="header_main" class="header_1 js-header">
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="site-header-inner">
                                <div class="wrap-box flex">
                                    <div id="site-logo" class="clearfix">
                                        <div id="site-logo-inner">
                                        <a href="{{ route('client.index') }}" rel="home" class="main-logo">
    <img id="logo_header" src="assets/images/logo/PLAYERDUO.png" 
         alt="nft-gaming" style="
         width: 100%; 
         height: auto; 
         max-width: 70px; 
         border-radius: 30px; 
         transition: transform 0.3s ease, box-shadow 0.3s ease;">
</a>

                                        </div>
                                    </div>
                                    <div class="mobile-button"><span></span></div><!-- /.mobile-button -->
                                    <nav id="main-nav" class="main-nav">
                                        <ul id="menu-primary-menu" class="menu">
                                            <li class="">
                                                <a href="{{ route('client.index') }}">Trang chủ</a>
                                            </li>
                                            <li class="">
                                                <a href="{{ route('client.dangTin') }}">Đăng tin</a>
                                            </li>
                                            <li class="">
                                                <a href="{{ route('client.chinhsach') }}">Chính sách</a>
                                            </li>

                                            <li class="">
                                                <a href="{{ route('client.lienhe') }}">Liên hệ</a>

                                            </li>
                                        </ul>
                                    </nav><!-- /#main-nav -->
                                    <div class="flat-search-btn flex">
                                        <div class="header-search flat-show-search" id="s1">
                                            <a href="#" class="show-search header-search-trigger">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="../../../www.w3.org/2000/svg.html">
                                                    <mask id="mask0_334_638" style="mask-type:alpha"
                                                        maskUnits="userSpaceOnUse" x="1" y="1" width="18" height="17">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M1.66699 1.66666H17.6862V17.3322H1.66699V1.66666Z"
                                                            fill="white" stroke="white" />
                                                    </mask>
                                                    <g mask="url(#mask0_334_638)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.67711 2.87312C5.9406 2.87312 2.90072 5.84505 2.90072 9.49903C2.90072 13.153 5.9406 16.1257 9.67711 16.1257C13.4128 16.1257 16.4527 13.153 16.4527 9.49903C16.4527 5.84505 13.4128 2.87312 9.67711 2.87312ZM9.67709 17.3322C5.26039 17.3322 1.66699 13.8182 1.66699 9.49902C1.66699 5.17988 5.26039 1.66666 9.67709 1.66666C14.0938 1.66666 17.6864 5.17988 17.6864 9.49902C17.6864 13.8182 14.0938 17.3322 9.67709 17.3322Z"
                                                            fill="white" />
                                                        <path
                                                            d="M9.67711 2.37312C5.67512 2.37312 2.40072 5.55836 2.40072 9.49903H3.40072C3.40072 6.13174 6.20607 3.37312 9.67711 3.37312V2.37312ZM2.40072 9.49903C2.40072 13.4396 5.67504 16.6257 9.67711 16.6257V15.6257C6.20615 15.6257 3.40072 12.8664 3.40072 9.49903H2.40072ZM9.67711 16.6257C13.6784 16.6257 16.9527 13.4396 16.9527 9.49903H15.9527C15.9527 12.8664 13.1472 15.6257 9.67711 15.6257V16.6257ZM16.9527 9.49903C16.9527 5.5584 13.6783 2.37312 9.67711 2.37312V3.37312C13.1473 3.37312 15.9527 6.1317 15.9527 9.49903H16.9527ZM9.67709 16.8322C5.52595 16.8322 2.16699 13.5316 2.16699 9.49902H1.16699C1.16699 14.1048 4.99484 17.8322 9.67709 17.8322V16.8322ZM2.16699 9.49902C2.16699 5.46656 5.52588 2.16666 9.67709 2.16666V1.16666C4.9949 1.16666 1.16699 4.8932 1.16699 9.49902H2.16699ZM9.67709 2.16666C13.8282 2.16666 17.1864 5.46649 17.1864 9.49902H18.1864C18.1864 4.89327 14.3593 1.16666 9.67709 1.16666V2.16666ZM17.1864 9.49902C17.1864 13.5316 13.8282 16.8322 9.67709 16.8322V17.8322C14.3594 17.8322 18.1864 14.1047 18.1864 9.49902H17.1864Z"
                                                            fill="white" />
                                                    </g>
                                                    <mask id="mask1_334_638" style="mask-type:alpha"
                                                        maskUnits="userSpaceOnUse" x="13" y="13" width="6" height="6">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M14.2012 14.2999H18.3333V18.3333H14.2012V14.2999Z"
                                                            fill="white" stroke="white" />
                                                    </mask>
                                                    <g mask="url(#mask1_334_638)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M17.7166 18.3333C17.5596 18.3333 17.4016 18.2746 17.2807 18.1572L14.3823 15.3308C14.1413 15.0952 14.1405 14.7131 14.3815 14.4774C14.6217 14.2402 15.0123 14.2418 15.2541 14.4758L18.1526 17.303C18.3935 17.5387 18.3944 17.9199 18.1534 18.1556C18.0333 18.2746 17.8746 18.3333 17.7166 18.3333Z"
                                                            fill="white" />
                                                        <path
                                                            d="M17.7166 18.3333C17.5595 18.3333 17.4016 18.2746 17.2807 18.1572L14.3823 15.3308C14.1413 15.0952 14.1405 14.7131 14.3815 14.4774C14.6217 14.2402 15.0123 14.2418 15.2541 14.4758L18.1526 17.303C18.3935 17.5387 18.3944 17.9199 18.1534 18.1556C18.0333 18.2746 17.8746 18.3333 17.7166 18.3333"
                                                            stroke="white" />
                                                    </g>
                                                </svg>
                                            </a>
                                            <div class="top-search">
                                                <form action="#" method="get" role="search" class="search-form">
                                                    <input type="search" id="s" class="search-field"
                                                        placeholder="Search..." value="" name="s" title="Search for"
                                                        required="">
                                                    <button class="search search-submit" type="submit" title="Search">
                                                        <i class="icon-fl-search-filled"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="sc-btn-top mg-r-12" id="site-header">
                                            <a href="connect-wallet.html" id="connectbtn"
                                                class="sc-button header-slider style style-1 wallet fl-button pri-1"><span>Wallet
                                                    connect
                                                </span></a>
                                        </div>

                                        <div class="admin_active" id="header_admin">
                                            <div class="header_avatar">
                                                <div class="popup-notification">
                                                    <div class="notification">
                                                        <span class="number">3</span>
                                                        <svg width="19" height="22" viewBox="0 0 19 22" fill="#fff"
                                                            xmlns="../../../www.w3.org/2000/svg.html">
                                                            <path
                                                                d="M18.4915 15.495L17.209 13.65C17.0339 13.3992 16.9397 13.1009 16.939 12.795V7.5C16.939 5.51088 16.1488 3.60322 14.7423 2.1967C13.3357 0.790176 11.4281 0 9.43896 0C7.44984 0 5.54218 0.790176 4.13566 2.1967C2.72914 3.60322 1.93896 5.51088 1.93896 7.5V12.795C1.93824 13.1009 1.84403 13.3992 1.66896 13.65L0.386463 15.495C0.192273 15.7102 0.064576 15.977 0.018815 16.2632C-0.0269461 16.5494 0.0111884 16.8427 0.128607 17.1077C0.246026 17.3727 0.437699 17.598 0.680449 17.7563C0.923199 17.9147 1.20663 17.9993 1.49646 18H5.76396C5.9361 18.8477 6.39601 19.6099 7.06577 20.1573C7.73553 20.7047 8.57394 21.0038 9.43896 21.0038C10.304 21.0038 11.1424 20.7047 11.8122 20.1573C12.4819 19.6099 12.9418 18.8477 13.114 18H17.3815C17.6713 17.9993 17.9547 17.9147 18.1975 17.7563C18.4402 17.598 18.6319 17.3727 18.7493 17.1077C18.8667 16.8427 18.9049 16.5494 18.8591 16.2632C18.8133 15.977 18.6856 15.7102 18.4915 15.495ZM9.43896 19.5C8.97475 19.4987 8.52231 19.3538 8.14366 19.0853C7.76501 18.8168 7.4787 18.4377 7.32396 18H11.554C11.3992 18.4377 11.1129 18.8168 10.7343 19.0853C10.3556 19.3538 9.90317 19.4987 9.43896 19.5ZM1.49646 16.5C1.53036 16.4685 1.56056 16.4333 1.58646 16.395L2.89896 14.505C3.24909 14.0034 3.43751 13.4067 3.43896 12.795V7.5C3.43896 5.9087 4.0711 4.38258 5.19632 3.25736C6.32154 2.13214 7.84766 1.5 9.43896 1.5C11.0303 1.5 12.5564 2.13214 13.6816 3.25736C14.8068 4.38258 15.439 5.9087 15.439 7.5V12.795C15.4404 13.4067 15.6288 14.0034 15.979 14.505L17.2915 16.395C17.3174 16.4333 17.3476 16.4685 17.3815 16.5H1.49646Z"
                                                                fill="white" />
                                                        </svg>
                                                    </div>
                                                    <div class="avatar_popup2 mt-20">
                                                        <div class="show mg-bt-18">
                                                            <h4>Notifications</h4>
                                                            <a href="#">Show All</a>
                                                        </div>
                                                        <div class="flat-tabs">
                                                            <ul class="menu-tab">
                                                                <li class="active"><span>All</span></li>
                                                                <li><span>Unread</span></li>
                                                            </ul>
                                                            <div class="content-tab">
                                                                <div class="content-inner">
                                                                    <div class="wrap-box">
                                                                        <div class="heading">Today</div>
                                                                        <div class="sc-box">
                                                                            <div class="content">
                                                                                <div class="avatar">
                                                                                    <img src="assets/images/avatar/avt-6.jpg"
                                                                                        alt="">
                                                                                </div>
                                                                                <div class="infor">
                                                                                    <span class="fw-7">Tyler
                                                                                        Covington</span>
                                                                                    <span>started following you.</span>
                                                                                    <p>1 hour ago
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sc-box">
                                                                            <div class="content">
                                                                                <div class="avatar">
                                                                                    <img src="assets/images/avatar/avt-6.jpg"
                                                                                        alt="">
                                                                                </div>
                                                                                <div class="infor">
                                                                                    <span class="fw-7">Tyler
                                                                                        Covington</span>
                                                                                    <span>started following you.</span>
                                                                                    <p>1 hour ago
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sc-box">
                                                                            <div class="content">
                                                                                <div class="avatar">
                                                                                    <img src="assets/images/avatar/avt-6.jpg"
                                                                                        alt="">
                                                                                </div>
                                                                                <div class="infor">
                                                                                    <span class="fw-7">Tyler
                                                                                        Covington</span>
                                                                                    <span>liked your items.</span>
                                                                                    <p>1 hour ago
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sc-box">
                                                                            <div class="content">
                                                                                <div class="avatar">
                                                                                    <img src="assets/images/avatar/avt-6.jpg"
                                                                                        alt="">
                                                                                </div>
                                                                                <div class="infor">
                                                                                    <span class="fw-7">Tyler
                                                                                        Covington</span>
                                                                                    <span>started following you.</span>
                                                                                    <p>1 hour ago
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sc-box">
                                                                            <div class="content">
                                                                                <div class="avatar">
                                                                                    <img src="assets/images/avatar/avt-6.jpg"
                                                                                        alt="">
                                                                                </div>
                                                                                <div class="infor">
                                                                                    <span class="fw-7">Tyler
                                                                                        Covington</span>
                                                                                    <span>started following you.</span>
                                                                                    <p>1 hour ago
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="wrap-box">
                                                                        <div class="heading">Yesterday</div>
                                                                        <div class="sc-box">
                                                                            <div class="content">
                                                                                <div class="avatar">
                                                                                    <img src="assets/images/avatar/avt-6.jpg"
                                                                                        alt="">
                                                                                </div>
                                                                                <div class="infor">
                                                                                    <span class="fw-7">Tyler
                                                                                        Covington</span>
                                                                                    <span>started following you.</span>
                                                                                    <p>1 hour ago
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sc-box">
                                                                            <div class="content">
                                                                                <div class="avatar">
                                                                                    <img src="assets/images/avatar/avt-6.jpg"
                                                                                        alt="">
                                                                                </div>
                                                                                <div class="infor">
                                                                                    <span class="fw-7">Tyler
                                                                                        Covington</span>
                                                                                    <span>started following you.</span>
                                                                                    <p>1 hour ago
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="content-inner">
                                                                    <div class="wrap-box">
                                                                        <div class="heading">Today</div>
                                                                        <div class="sc-box">
                                                                            <div class="content">
                                                                                <div class="avatar">
                                                                                    <img src="assets/images/avatar/avt-6.jpg"
                                                                                        alt="">
                                                                                </div>
                                                                                <div class="infor">
                                                                                    <span class="fw-7">Tyler
                                                                                        Covington</span>
                                                                                    <span>started following you.</span>
                                                                                    <p>1 hour ago
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sc-box">
                                                                            <div class="content">
                                                                                <div class="avatar">
                                                                                    <img src="assets/images/avatar/avt-6.jpg"
                                                                                        alt="">
                                                                                </div>
                                                                                <div class="infor">
                                                                                    <span class="fw-7">Tyler
                                                                                        Covington</span>
                                                                                    <span>started following you.</span>
                                                                                    <p>1 hour ago
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="sc-box">
                                                                            <div class="content">
                                                                                <div class="avatar">
                                                                                    <img src="assets/images/avatar/avt-6.jpg"
                                                                                        alt="">
                                                                                </div>
                                                                                <div class="infor">
                                                                                    <span class="fw-7">Tyler
                                                                                        Covington</span>
                                                                                    <span>started following you.</span>
                                                                                    <p>1 hour ago
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="wrap-box">
                                                                        <div class="heading">Yesterday</div>
                                                                        <div class="sc-box">
                                                                            <div class="content">
                                                                                <div class="avatar">
                                                                                    <img src="assets/images/avatar/avt-6.jpg"
                                                                                        alt="">
                                                                                </div>
                                                                                <div class="infor">
                                                                                    <span class="fw-7">Tyler
                                                                                        Covington</span>
                                                                                    <span>started following you.</span>
                                                                                    <p>1 hour ago
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if (Auth::check())
                                                    <div class="popup-user">
                                                        <img class="avatar"
                                                            src="{{ \Illuminate\Support\Facades\Storage::url(Auth::user()->anh_dai_dien) }}"
                                                            alt="avatar" />
                                                        <div class="avatar_popup mt-20">
                                                            <h4>{{ Auth::user()->ten }}</h4>
                                                            <div class="d-flex align-items-center mt-20 mg-bt-12">
                                                                <div class="info">
                                                                    <p>Số dư</p>
                                                                    <p class="style">{{ Auth::user()->so_du }}</p>
                                                                </div>
                                                            </div>
                                                            <p>Id</p>
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mg-t-5 mg-bt-17">
                                                                <p> {{ Auth::user()->id }}</p>
                                                                <a href="index-2.html" class="ml-2">
                                                                    <i class="fal fa-copy"></i>
                                                                </a>
                                                            </div>
                                                            <div class="divider"></div>
                                                            <div class="hr"></div>
                                                            <div class="links mt-20">
                                                                <a class="mt-10" href="{{ route('client.thongtincanhan') }}">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20"
                                                                        fill="none"
                                                                        xmlns="../../../www.w3.org/2000/svg.html">
                                                                        <path
                                                                            d="M0.774902 18.333C0.774902 18.7932 1.14762 19.1664 1.60824 19.1664C2.06885 19.1664 2.44157 18.7932 2.44157 18.333C2.44157 15.3923 4.13448 12.7889 6.77329 11.5578C7.68653 12.1513 8.77296 12.4997 9.94076 12.4997C11.113 12.4997 12.2036 12.1489 13.119 11.5513C13.9067 11.9232 14.6368 12.4235 15.2443 13.0307C16.6611 14.4479 17.4416 16.3311 17.4416 18.333C17.4416 18.7932 17.8143 19.1664 18.2749 19.1664C18.7355 19.1664 19.1083 18.7932 19.1083 18.333C19.1083 15.8859 18.1545 13.5845 16.4227 11.8523C15.8432 11.2725 15.1698 10.7754 14.4472 10.3655C15.2757 9.3581 15.7741 8.06944 15.7741 6.66635C15.7741 3.44979 13.1569 0.833008 9.94076 0.833008C6.72461 0.833008 4.10742 3.44979 4.10742 6.66635C4.10742 8.06604 4.60379 9.35154 5.42863 10.3579C2.56796 11.9685 0.774902 14.9779 0.774902 18.333V18.333ZM9.94076 2.49968C12.2381 2.49968 14.1074 4.36898 14.1074 6.66635C14.1074 8.96371 12.2381 10.833 9.94076 10.833C7.6434 10.833 5.77409 8.96371 5.77409 6.66635C5.77409 4.36898 7.6434 2.49968 9.94076 2.49968V2.49968Z"
                                                                            fill="white" />
                                                                    </svg>
                                                                    <span>Thông tin cá nhân</span>
                                                                </a>
                                                                <a class="mt-10" href="{{ route('client.lichSuThue') }}">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20"
                                                                        fill="none"
                                                                        xmlns="../../../www.w3.org/2000/svg.html">
                                                                        <path
                                                                            d="M0.774902 18.333C0.774902 18.7932 1.14762 19.1664 1.60824 19.1664C2.06885 19.1664 2.44157 18.7932 2.44157 18.333C2.44157 15.3923 4.13448 12.7889 6.77329 11.5578C7.68653 12.1513 8.77296 12.4997 9.94076 12.4997C11.113 12.4997 12.2036 12.1489 13.119 11.5513C13.9067 11.9232 14.6368 12.4235 15.2443 13.0307C16.6611 14.4479 17.4416 16.3311 17.4416 18.333C17.4416 18.7932 17.8143 19.1664 18.2749 19.1664C18.7355 19.1664 19.1083 18.7932 19.1083 18.333C19.1083 15.8859 18.1545 13.5845 16.4227 11.8523C15.8432 11.2725 15.1698 10.7754 14.4472 10.3655C15.2757 9.3581 15.7741 8.06944 15.7741 6.66635C15.7741 3.44979 13.1569 0.833008 9.94076 0.833008C6.72461 0.833008 4.10742 3.44979 4.10742 6.66635C4.10742 8.06604 4.60379 9.35154 5.42863 10.3579C2.56796 11.9685 0.774902 14.9779 0.774902 18.333V18.333ZM9.94076 2.49968C12.2381 2.49968 14.1074 4.36898 14.1074 6.66635C14.1074 8.96371 12.2381 10.833 9.94076 10.833C7.6434 10.833 5.77409 8.96371 5.77409 6.66635C5.77409 4.36898 7.6434 2.49968 9.94076 2.49968V2.49968Z"
                                                                            fill="white" />
                                                                    </svg>
                                                                    <span>Lịch sử thuê</span>
                                                                </a>
                                                                <a class="mt-10" href="profile.html">
                                                                    <svg width="20" height="18" viewBox="0 0 20 18"
                                                                        fill="none"
                                                                        xmlns="../../../www.w3.org/2000/svg.html">
                                                                        <path
                                                                            d="M17.1154 0.730469H2.88461C1.29402 0.730469 0 2.02449 0 3.61508V14.3843C0 15.9749 1.29402 17.2689 2.88461 17.2689H17.1154C18.706 17.2689 20 15.9749 20 14.3843V3.61508C20 2.02449 18.706 0.730469 17.1154 0.730469ZM18.7529 10.6035H14.6154C13.6611 10.6035 13 9.95407 13 8.99969C13 8.04532 13.661 7.34544 14.6154 7.34544H18.7529V10.6035ZM18.7529 6.11508H14.6154C13.0248 6.11508 11.7308 7.40911 11.7308 8.99969C11.7308 10.5903 13.0248 11.8843 14.6154 11.8843H18.7529V14.3843C18.7529 15.3386 18.0698 15.9996 17.1154 15.9996H2.88461C1.93027 15.9996 1.29231 15.3387 1.29231 14.3843V3.61508C1.29231 2.66074 1.93023 1.99963 2.88461 1.99963H17.1266C18.0809 1.99963 18.7529 2.6607 18.7529 3.61508V6.11508Z"
                                                                            fill="white" />
                                                                    </svg>
                                                                    <span>Nạp tiền</span>
                                                                </a>
                                                                <a class="mt-10" href="{{ route('client.logout') }}"
                                                                    id="logout">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20"
                                                                        fill="none"
                                                                        xmlns="../../../www.w3.org/2000/svg.html">
                                                                        <path
                                                                            d="M9.9668 18.3057H2.49168C2.0332 18.3057 1.66113 17.9335 1.66113 17.4751V2.52492C1.66113 2.06644 2.03324 1.69437 2.49168 1.69437H9.9668C10.4261 1.69437 10.7973 1.32312 10.7973 0.863828C10.7973 0.404531 10.4261 0.0332031 9.9668 0.0332031H2.49168C1.11793 0.0332031 0 1.15117 0 2.52492V17.4751C0 18.8488 1.11793 19.9668 2.49168 19.9668H9.9668C10.4261 19.9668 10.7973 19.5955 10.7973 19.1362C10.7973 18.6769 10.4261 18.3057 9.9668 18.3057Z"
                                                                            fill="white" />
                                                                        <path
                                                                            d="M19.7525 9.40904L14.7027 4.42564C14.3771 4.10337 13.8505 4.10755 13.5282 4.43396C13.206 4.76036 13.2093 5.28611 13.5366 5.60837L17.1454 9.16982H7.47508C7.01578 9.16982 6.64453 9.54107 6.64453 10.0004C6.64453 10.4597 7.01578 10.8309 7.47508 10.8309H17.1454L13.5366 14.3924C13.2093 14.7147 13.2068 15.2404 13.5282 15.5668C13.691 15.7313 13.9053 15.8143 14.1196 15.8143C14.3306 15.8143 14.5415 15.7346 14.7027 15.5751L19.7525 10.5917C19.9103 10.4356 20 10.2229 20 10.0003C20 9.77783 19.9111 9.56603 19.7525 9.40904Z"
                                                                            fill="white" />
                                                                    </svg>
                                                                    <span>Đăng xuất</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <a href="{{ route('client.login') }}" class="btn-login">Đăng
                                                        nhập</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            @yield('content')
            <!-- này là  Đăng Tin -->
            <div class="modal fade" id="dangTinModal" tabindex="-1" aria-labelledby="dangTinModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header text-white">
                            <button type="button" class="btn-close" style="color: black;" data-bs-dismiss="modal" aria-label="Close"></button>
                            <form method="POST" action="{{ route('client.taoTin') }}" enctype="multipart/form-data">
                        </div>
                            <div class="modal-body p-4">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="content" class="form-label fs-5">Nội dung Story</label>
                                            <textarea class="form-control rounded-3" name="noi_dung" id="content" rows="7" placeholder="" required style="font-size: 1.2rem; padding: 1rem;"></textarea>
                                        </div>
                                        <div class="col-md-6 d-flex flex-column justify-content-between">
                                            <label for="upload-video" class="form-label fs-5">Tải Video Lên</label>
                                            <div class="text-center border rounded-3 p-3" id="videoPreviewContainer" style="height: 150px;">
                                                <i class="bi bi-upload fs-1 text-muted"></i>
                                                <p class="small text-muted">Chọn video từ thiết bị</p>
                                                <input type="file" class="form-control d-none" id="upload-video" name="video" accept="video/*" required onchange="previewVideo(event)">
                                            </div>
                                            <label for="upload-video" class="btn btn-outline-primary mt-2 w-100">
                                                <i class="bi bi-folder-plus"></i> Chọn Video
                                            </label>
                                        </div>
                                    </div>
                                    <div id="videoPreview" class="text-center mt-3 d-none">
                                        <video id="previewPlayer" width="100%" height="250" controls class="rounded-3 shadow-sm"></video>
                                    </div>


                                
                            </div>
                            <div class="modal-footer justify-content-center" style="background-color: #FFC1C1; border-color: #FFC1C1;
                                    color: white;margin-top: 50px;">
                                <button type="submit" class="btn btn-success px-8 py-2 rounded-pill" style="font-size: 1.6rem;">
                                    <i class="bi bi-send fs-4"></i> Đăng Story
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Nạp tiền player duo -->

            <div class="chatbox-wrapper">
                <div class="chatbox-header d-flex justify-content-between align-items-center p-3 bg-primary text-white rounded-top"
                    onclick="toggleChatbox()">
                    <div>
                        <i class="fas fa-comment-dots"></i>
                        Chat với chúng tôi
                    </div>
                    <div>
                        <i class="fas fa-chevron-up" id="toggleIcon"></i>
                    </div>
                </div>
                <div class="chatbox-body">
                    <div class="chat-list">
                        <ul class="list-unstyled">
                            <li class="chat-user d-flex align-items-center mb-3">
                                <img src="assets/images/avatar/avt-2.jpg" alt="User Avatar" class="rounded-circle"
                                    width="40px" height="40px">
                                <span class="ms-2" id="text-title-chatbox">Nguyễn Hoàng</span>
                            </li>
                            <li class="chat-user d-flex align-items-center mb-3">
                                <img src="assets/images/avatar/avt-2.jpg" alt="User Avatar" class="rounded-circle"
                                    width="40px" height="40px">
                                <span class="ms-2" id="text-title-chatbox">Nguyễn Hoàng</span>
                            </li>
                            <li class="chat-user d-flex align-items-center mb-3">
                                <img src="assets/images/avatar/avt-3.jpg" alt="User Avatar" class="rounded-circle"
                                    width="40px" height="40px">
                                <span class="ms-2" id="text-title-chatbox">Nguyễn Hoàng</span>
                            </li>
                        </ul>
                    </div>
                    <div class="chat-content">
                        <div class="chat-messages">
                            <header class="chat-header mb-5">
                                <!-- Avatar -->
                                <img src="assets/images/avatar/avt-3.jpg" alt="User Avatar" class="avatar">

                                <!-- User Info -->
                                <div class="user-info">
                                    <p class="user-name">Nguyễn Hoàng</p>
                                    <p class="user-status">Đang hoạt động</p>
                                </div>
                            </header>

                            <div>
                                <div class="message user1">
                                    <img src="assets/images/avatar/avt-3.jpg" alt="User 1 Avatar" class="avatar">
                                    <p>Hello</p>
                                </div>

                            </div>
                            <div class="message you">
                                <p> Hi, how can I help you?</p>
                            </div>
                        </div>
                        <div class="chat-input d-flex p-3">
                            <input type="text" class="form-control me-2" placeholder="Type a message" id="messageInput">
                            <button id="sendButton"><i class="fas fa-arrow-right fa-lg"></i></button>
                        </div>
                    </div>
                </div>
            </div>




            <footer id="footer" class="footer-light-style clearfix">
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-12">
                            <div class="widget widget-logo">
                                <div class="logo-footer" id="logo-footer">
                                    <a href="index-2.html">
                                        <img id="logo_footer" src="assets/images/logo/logo_dark.png" alt="nft-gaming"
                                            width="135" height="56" data-retina="assets/images/logo/logo_dark@2x.png"
                                            data-width="135" data-height="56">
                                    </a>
                                </div>
                                <p class="sub-widget-logo">Lorem ipsum dolor sit amet,consectetur adipisicing elit.
                                    Quis non, fugit totam vel laboriosam vitae.</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-5 col-5">
                            <div class="widget widget-menu style-1">
                                <h5 class="title-widget">My Account</h5>
                                <ul>
                                    <li><a href="author01.html">Authors</a></li>
                                    <li><a href="connect-wallet.html">Collection</a></li>
                                    <li><a href="profile.html">Author Profile</a></li>
                                    <li><a href="create-item.html">Create Item</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-7 col-7">
                            <div class="widget widget-menu style-2">
                                <h5 class="title-widget">Resources</h5>
                                <ul>
                                    <li><a href="help-center.html">Help & Support</a></li>
                                    <li><a href="auctions.html">Live Auctions</a></li>
                                    <li><a href="item-details.html">Item Details</a></li>
                                    <li><a href="activity1.html">Activity</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-5 col-5">
                            <div class="widget widget-menu fl-st-3">
                                <h5 class="title-widget">Company</h5>
                                <ul>
                                    <li><a href="explore-1.html">Explore</a></li>
                                    <li><a href="contact1.html">Contact Us</a></li>
                                    <li><a href="blog.html">Our Blog</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-7 col-12">
                            <div class="widget widget-subcribe">
                                <h5 class="title-widget">Subscribe Us</h5>
                                <div class="form-subcribe">
                                    <form id="subscribe-form" action="#" method="GET" accept-charset="utf-8"
                                        class="form-submit">
                                        <input name="email" value="" class="email" type="email"
                                            placeholder="info@yourgmail.com" required>
                                        <button id="submit" name="submit" type="submit"><i
                                                class="icon-fl-send"></i></button>
                                    </form>
                                </div>
                                <div class="widget-social style-1 mg-t32">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>

                                        <li class="style-2"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li class="mgr-none"><a href="#"><i class="icon-fl-tik-tok-2"></i></a>
                                        </li>
                                        <li class="mgr-none"><a href="#"><i class="icon-fl-vt"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer><!-- /#footer -->
        </div>
        <!-- /#page -->

        <!-- Modal Popup Bid -->
        @yield('modal_user')


    </div>
    <!-- /#wrapper -->

    <a id="scroll-top"></a>
    </script>
    <!-- Javascript -->
    <script src="{{ asset('assets/js/chatbox.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin.js') }}"></script>
    <script src="{{ asset('assets/js/count-down.js') }}"></script>
    <script src="{{ asset('assets/js/shortcodes.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.js') }}"></script>
    <script src="{{ asset('assets/js/web3.min.js') }}"></script>
    <script src="{{ asset('assets/js/moralis.js') }}"></script>
    <script src="{{ asset('assets/js/nft.js') }}"></script>

    @yield('script_footer')
</body>


<!-- Mirrored from themesflat.co/html/axiesv/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2024 04:34:40 GMT -->

</html>
