<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html.phoenixcoded.net/dasho/bootstrap/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Aug 2024 02:54:26 GMT -->

<head>

    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title', 'Đây là trang chủ')</title>
    <meta name="description"
        content="Dasho Bootstrap admin template made using Bootstrap 5 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="admin templates, bootstrap admin templates, bootstrap 5, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Dasho, Dasho bootstrap admin template">
    <meta name="author" content="Phoenixcoded" />

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/logoPD.png') }}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css') }}">

    <!-- notification css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/notification/css/notification.min.css') }}">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('header')

</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar menupos-fixed menu-dark menu-item-icon-style6 ">
        <div class="navbar-wrapper ">
            <div class="navbar-brand header-logo" style="display: flex; align-items: center;">
                <a href="index.html" class="b-brand">
                    <img src="{{ asset('assets/images/logoPD.png') }}" alt="logo"
                        style="margin-right: 5px; width: 30px">
                    <span style="color: #fff ;font-weight: bold; font-size: 16px;">PlayerDuo</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            </div>
            <div class="navbar-content scroll-div" id="layout-sidenav">
                <ul class="nav pcoded-inner-navbar sidenav-inner">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Menu quản lí</label>
                    </li>
                    <li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project"
                        class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="index.html" class="">Analytics</a></li>
                            <li class=""><a href="dashboard-sale.html" class="">Sales</a></li>
                            <li class=""><a href="dashboard-project.html" class="">Project</a></li>
                            <li class=""><a href="dashboard-help.html" class="">Helpdesk<span
                                        class="pcoded-badge label label-danger">NEW</span></a></li>
                        </ul>
                    </li>
                    <li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project"
                        class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                    class="fas fa-user"></i></span><span class="pcoded-mtext">Quản lí
                                player</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('admin.players.index') }}" class="">Danh sách</a>
                            </li>

                        </ul>
                    </li>
                    <li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project"
                        class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                    class="fas fa-user-secret"></i></span><span class="pcoded-mtext">Quản lí tài
                                khoản</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('admin.taikhoans.index') }}" class="">Danh
                                    sách</a></li>
                            <li class=""><a href="{{ route('admin.taikhoans.create') }}" class="">Thêm
                                    mới</a></li>

                        </ul>
                    </li>


                    <li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project"
                        class="nav-item pcoded-hasmenu">
                        <a href="{{ route('admin.tocao.index') }}" class="nav-link"><span class="pcoded-micon"><i
                                    class="fas fa-exclamation-circle"></i></span><span class="pcoded-mtext">Tố cáo
                                player</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('admin.tocao.index') }}" class="">Danh
                                    sách</a>
                            </li>
                            <li class=""><a href="{{ route('admin.tocao.add') }}" class="">Thêm
                                    mới</a>
                            </li>
                        </ul>
                    </li>
                    <li data-username="comments" class="nav-item"><a href="{{ route('admin.dangtins.index') }}"
                            class="nav-link"><span class="pcoded-micon"><i class="fas fa-video"></i></span><span
                                class="pcoded-mtext">Quản lý đăng tin</span></a></li>
                    <li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project"
                        class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                    class="fas fa-credit-card"></i></span><span class="pcoded-mtext">Quản lý phương
                                thức thanh toán</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('admin.phuongthucthanhtoans.index') }}"
                                    class="">Danh sách</a></li>
                            <li class=""><a href="{{ route('admin.phuongthucthanhtoans.create') }}"
                                    class="">Thêm mới</a></li>
                        </ul>

                    <li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project"
                        class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                    class="fas fa-money-check-alt"></i></span><span class="pcoded-mtext">Quản lí nạp
                                tiền</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('admin.quan-li-nap-tiens.index') }}"
                                    class="">Danh sách</a></li>
                        </ul>
                    </li>
                    <li data-username="comments" class="nav-item"><a href="{{ route('admin.binhluans.thongke') }}"
                            class="nav-link"><span class="pcoded-micon"><i
                                    class="fas fa-comment-dots"></i></span><span class="pcoded-mtext">Quản lý thống
                                kê</span></a></li>

                                <li data-username="comments" class="nav-item"><a href="{{ route('admin.phanquyen.index') }}"
                            class="nav-link"><span class="pcoded-micon"><i
                                    class="fas fa-comment-dots"></i></span><span class="pcoded-mtext">Phân quyền</span></a></li>

                                <li data-username="comments" class="nav-item"><a href="{{ route('admin.tkuser.index') }}"
                            class="nav-link"><span class="pcoded-micon"><i
                                    class="fas fa-comment-dots"></i></span><span class="pcoded-mtext">Quản lý user</span></a></li>           

                    <li data-username="comments" class="nav-item"><a href="{{ route('admin.binhluans.index') }}"
                            class="nav-link"><span class="pcoded-micon"><i
                                    class="fas fa-comment-dots"></i></span><span class="pcoded-mtext">Quản lý bình
                                luận</span></a></li>
                    <li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project"
                        class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                    class="fas fa-list-ul"></i></span><span class="pcoded-mtext">Quản lý danh
                                mục</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="{{ route('admin.danhmucs.index') }}" class="">Danh
                                    sách</a></li>
                            <li class=""><a href="{{ route('admin.danhmucs.create') }}" class="">Thêm
                                    mới</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">

                @yield('content')

            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('assets/js/menu-setting.js') }}"></script>

    @yield('script')
</body>


<!-- Mirrored from html.phoenixcoded.net/dasho/bootstrap/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Aug 2024 02:55:09 GMT -->

</html>
