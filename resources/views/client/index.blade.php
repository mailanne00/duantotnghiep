@extends('client.layouts.app')

@section('title', 'Trang chủ')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
@if (session('successNapTien'))
<script>
    Swal.fire({
        title: "Nạp tiền thành công!",
        icon: "success",
        draggable: true
    });
</script>
@endif
<section class="flat-title-page style3">
    <img class="bgr-gradient gradient1" src="{{ asset('assets/images/backgroup-secsion/bg-gradient1.png') }}"
        alt="">
    <img class="bgr-gradient gradient2" src="{{ asset('assets/images/backgroup-secsion/bg-gradient2.png') }}"
        alt="">
    <img class="bgr-gradient gradient3" src="{{ asset('assets/images/backgroup-secsion/bg-gradient3.png') }}"
        alt="">
    <div class="overlay"></div>
    <div class="swiper-container mainslider home auctions">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slider-item">
                    <div class="themesflat-container ">
                        <div class="wrap-heading flat-slider flex">
                            <div class="content">
                                <h2 class="heading m-t-15">Chào mừng bạn đến với
                                </h2>
                                <h1 class="heading mb-style"><span class="tf-text s1">Player Duo</span>
                                </h1>
                                <h1 class="heading mt-2">Hệ thống trợ giúp việc tìm gamer với mục tiêu</h1>
                                <p class="sub-heading mg-t-19 mg-bt-40">Bạn chỉ cần chơi game, mọi thứ khác PlayerDuo sẽ lo giúp bạn
                                </p>
                                <div class="flat-bt-slider flex style2">
                                    <a href="#toppick"
                                        class="sc-button header-slider style style-1 rocket fl-button pri-1"><span>Tìm kiếm player
                                        </span></a>
                                    <a href=""
                                        class="sc-button header-slider style style-1 note fl-button pri-1"><span>Tạo tài khoản mới
                                        </span></a>
                                </div>
                            </div>
                            <div class="wrap-image">
                                <div class="overlay-style2"></div>
                                <img src="{{ asset('assets/images/backgroup-secsion/img_sliderhome7.png') }}"
                                    alt="Image">
                            </div>
                        </div>

                    </div>
                </div><!-- item-->
            </div>
        </div>
    </div>
</section>

<!-- Người chơi đã thuê -->
@if (auth()->check())
@if (!empty($userDaThues))
<section class="tf-section live-auctions home7">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-live-auctions">
                    <h2 class="tf-title pb-22">
                        Người chơi đã thuê</h2>
                    <a href="" class="exp style2">XEM TẤT CẢ</a>
                </div>
            </div>

            <div class="col-md-12">
                <div class="swiper-container show-shadow carousel10 pad-t-17 auctions">
                    <div class="swiper-wrapper">
                        @foreach ($userDaThues as $userDaThue)
                        <div class="swiper-slide">
                            <div class="slider-item">
                                <div class="sc-card-product menu_card style-h7">
                                    <div class="card-media" style="width: 224px; height: 224px;">
                                        <a
                                            href="{{ route('client.taikhoan.show', $userDaThue->nguoiDuocThue->id) }}"><img
                                                src="{{ \Illuminate\Support\Facades\Storage::url($userDaThue->nguoiDuocThue->anh_dai_dien) }}"
                                                alt="Image"
                                                style="min-height:220px; max-height: 220px; object-fit: cover; object-position: center;"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                data-id="{{ $userDaThue->nguoiDuocThue->id }}"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Thuê</span></a>
                                        </div>
                                    </div>
                                    <div class="card-title">
                                        <h5><a
                                                href="{{ route('client.taikhoan.show', $userDaThue->nguoiDuocThue->id) }}">{{ $userDaThue->nguoiDuocThue->ten }}</a>
                                        </h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="info style2">
                                                <span
                                                    class="pricing">{{ number_format($userDaThue->nguoiDuocThue->gia_tien, 0, ',', '.') }}
                                                    VNĐ</span>
                                            </div>

                                        </div>
                                        <div style="position: relative;">
                                            <div style="position: absolute; background: #27ae60; width:10px; height:10px; border-radius:50%; transform: translate(59px, -67px);">
                                            </div>
                                            <div class="tags">{{ $userDaThue->nguoiDuocThue->countDanhGia }}
                                                <i class="fas fa-star f-10 m-l-10 text-c-yellow"></i>
                                                ({{ $userDaThue->nguoiDuocThue->countRent }})
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- item-->
                        </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination mg-t-13"></div>
                    <div class="swiper-button-next btn-slide-next active"></div>
                    <div class="swiper-button-prev btn-slide-prev"></div>
                </div>
            </div>

        </div>
    </div>
</section>
@else
<div style="height: 50px; background: #14141F"></div>
@endif
@else
<div style="height: 50px; background: #14141F"></div>
@endif

<!-- Danh mục -->
<section class="tf-section category">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-live-auctions">
                    <h2 class="tf-title pb-39">Danh mục</h2>
                    <a href="{{ route('client.danhmuc') }}" class="exp style2">XEM TẤT CẢ</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="swiper-container carousel11">
                    <div class="swiper-wrapper">
                        @foreach ($danhMucs as $danhMuc)
                        <div class="swiper-slide" style="max-width: 160px">
                            <div class="slider-item" style="width: 160px">
                                <div class="sc-categoty">
                                    <div class="card-media">
                                        <a href="{{ route('client.danhmuc.show', $danhMuc->id) }}"><img
                                                src="{{ \Illuminate\Support\Facades\Storage::url($danhMuc->anh) }}"
                                                alt="Image" style="min-height:160px"></a>
                                    </div>
                                    <div class="card-title">
                                        <p style="font-size: 14px; color: #FFFFFF; font-weight: 600">
                                            {{ $danhMuc->ten }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-button-next btn-slide-next active"></div>
                <div class="swiper-button-prev btn-slide-prev"></div>
            </div>
        </div>
    </div>
</section>

<!-- Top Đại Gia -->
<section class="tf-section top-seller home7 bg-style">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="heading-live-auctions">
                    <h2 class="tf-title pb-23">
                        Top Đại Gia</h2>
                </div>
                <div class="flat-tabs seller-tab style2">
                    <ul class="menu-tab">
                        <li class="item-title active">
                            <span class="inner">Ngày hôm nay</span>
                        </li>
                        <li class="item-title">
                            <span class="inner">7 ngày qua</span>
                        </li>
                        <li class="item-title">
                            <span class="inner">30 ngày qua</span>
                        </li>
                    </ul>
                    <div class="content-tab mg-t-16">
                        <div class="content-inner">
                            <div class="tf-box">
                                @php
                                $index = 1;
                                @endphp
                                @foreach ($taiKhoanDaiGias->chunk(3) as $chunk)
                                <div class="box-item">
                                    @foreach ($chunk as $taiKhoanDaiGia)
                                    @if ($taiKhoanDaiGia->daiGia['24h'] !== 0)
                                    <div class="sc-author-box style-3">
                                        <div class="author-style2 flex">
                                            <div class="author-avatar">
                                                <a href="#">
                                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($taiKhoanDaiGia->anh_dai_dien) }}"
                                                        alt="Image" class="avatar">
                                                </a>
                                                <div class="badge"><i class="ripple"></i></div>
                                            </div>
                                            <div class="author-infor">
                                                <h5><a href="#">{{ $taiKhoanDaiGia->ten }}</a></h5>
                                                <div class="tag">{{ $taiKhoanDaiGia->email }}</div>
                                                <span
                                                    class="price">{{ number_format($taiKhoanDaiGia->daiGia['24h'], 0, ',', '.') }}
                                                    VND</span>
                                            </div>
                                        </div>
                                        <div class="action">
                                            <div class="number">#{{ $index++ }}</div>
                                            <div class="btn-follow">
                                                <a href="#">Follow</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="content-inner">
                            <div class="tf-box">
                                @php
                                $index = 1;
                                @endphp
                                @foreach ($taiKhoanDaiGias->chunk(3) as $chunk)
                                <div class="box-item">
                                    @foreach ($chunk as $taiKhoanDaiGia)
                                    @if ($taiKhoanDaiGia->daiGia['week'] !== 0)
                                    <div class="sc-author-box style-3">
                                        <div class="author-style2 flex">
                                            <div class="author-avatar">
                                                <a href="#">
                                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($taiKhoanDaiGia->anh_dai_dien) }}"
                                                        alt="Image" class="avatar">
                                                </a>
                                                <div class="badge"><i class="ripple"></i></div>
                                            </div>
                                            <div class="author-infor">
                                                <h5><a href="#">{{ $taiKhoanDaiGia->ten }}</a></h5>
                                                <div class="tag">{{ $taiKhoanDaiGia->email }}</div>
                                                <span
                                                    class="price">{{ number_format($taiKhoanDaiGia->daiGia['week'], 0, ',', '.') }}
                                                    VND</span>
                                            </div>
                                        </div>
                                        <div class="action">
                                            <div class="number">#{{ $index++ }}</div>
                                            <div class="btn-follow">
                                                <a href="#">Follow</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="content-inner">
                            <div class="tf-box">
                                @php
                                $index = 1;
                                @endphp
                                @foreach ($taiKhoanDaiGias->chunk(3) as $chunk)
                                <div class="box-item">
                                    @foreach ($chunk as $taiKhoanDaiGia)
                                    @if ($taiKhoanDaiGia->daiGia['month'] !== 0)
                                    <div class="sc-author-box style-3">
                                        <div class="author-style2 flex">
                                            <div class="author-avatar">
                                                <a href="#">
                                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($taiKhoanDaiGia->anh_dai_dien) }}"
                                                        alt="Image" class="avatar">
                                                </a>
                                                <div class="badge"><i class="ripple"></i></div>
                                            </div>
                                            <div class="author-infor">
                                                <h5><a href="#">{{ $taiKhoanDaiGia->ten }}</a></h5>
                                                <div class="tag">{{ $taiKhoanDaiGia->email }}</div>
                                                <span
                                                    class="price">{{ number_format($taiKhoanDaiGia->daiGia['month'], 0, ',', '.') }}
                                                    VND</span>
                                            </div>
                                        </div>
                                        <div class="action">
                                            <div class="number">#{{ $index++ }}</div>
                                            <div class="btn-follow">
                                                <a href="#">Follow</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Top Pick -->
<section class="tf-section live-auctions top-picks style3 home7 mobie-pb-70" id="toppick">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-live-auctions mg-bt-24">
                    <h2 class="tf-title">
                        Top Player được đánh giá cao nhất</h2>
                    <a href="{{ route('client.topDanhGia') }}" class="exp style2">XEM TẤT CẢ</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="top-pick-box">
                    @foreach ($taiKhoans as $taiKhoan)
                    <div class="sc-card-product menu_card style-h7">
                        <div class="card-media">
                            <a href="{{ route('client.taikhoan.show', $taiKhoan->id) }}"><img
                                    src="{{ \Illuminate\Support\Facades\Storage::url($taiKhoan->anh_dai_dien) }}"
                                    alt="Image"
                                    style="min-height: 220px;max-height: 220px; object-fit:cover"></a>
                        </div>
                        <div class="card-title">
                            <h5><a href="">{{ $taiKhoan->ten }}</a></h5>
                        </div>
                        <div class="meta-info">
                            <div class="author">
                                <div class="info style2">
                                    <span class="pricing">{{ number_format($taiKhoan->gia_tien, 0, ',', '.') }}
                                        VNĐ</span>
                                </div>
                            </div>
                            <div style="position: relative;">
                                <div style="position: absolute; background: #27ae60; width:10px; height:10px; border-radius:50%; transform: translate(59px, -67px);">
                                </div>
                                <div class="tags">{{ $taiKhoan->countDanhGia }}
                                    <i class="fas fa-star f-10 m-l-10 text-c-yellow"></i>
                                    ({{ $taiKhoan->countRent }})
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hot Player -->
<section class="tf-section live-auctions top-picks style3 home7 mobie-pb-70">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-live-auctions mg-bt-24">
                    <h2 class="tf-title">
                        Top Player được thuê nhiều nhất</h2>
                    <a href="{{ route('client.topHot') }}" class="exp style2">XEM TẤT CẢ</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="top-pick-box">
                    @foreach ($taiKhoans2 as $taiKhoan)
                    <div class="sc-card-product menu_card style-h7">
                        <div class="card-media">
                            <a href="{{ route('client.taikhoan.show', $taiKhoan->id) }}"><img
                                    src="{{ \Illuminate\Support\Facades\Storage::url($taiKhoan->anh_dai_dien) }}"
                                    alt="Image"
                                    style="min-height: 220px;max-height: 220px; object-fit:cover"></a>
                        </div>
                        <div class="card-title">
                            <h5><a href="">{{ $taiKhoan->ten }}</a></h5>
                        </div>
                        <div class="meta-info">
                            <div class="author">
                                <div class="info style2">
                                    <span class="pricing">{{ number_format($taiKhoan->gia_tien, 0, ',', '.') }}
                                        VNĐ</span>
                                </div>
                            </div>
                            <div style="position: relative;">
                                <div style="position: absolute; background: #27ae60; width:10px; height:10px; border-radius:50%; transform: translate(59px, -67px);">
                                </div>
                                <div class="tags">{{ $taiKhoan->countDanhGia }}
                                    <i class="fas fa-star f-10 m-l-10 text-c-yellow"></i>
                                    ({{ $taiKhoan->countRent }})
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('modal_user')
<div class="modal fade popup" id="popup_bid" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <form action="{{ route('client.themDonThue') }}" onsubmit="return themDonThue()" method="post">
                @csrf
                <div class="modal-body space-y-20 pd-40">
                    <h3>Thuê người chơi</h3>
                    <input type="hidden" name="user_id" id="userId">
                    <p class="text-center">Người chơi: <span class="price color-popup" id="user_name"></span>
                    </p>

                    <p>Số giờ thuê</p>
                    <select style="color: #0b0b0b; height: 50px; font-size: 16px; border-radius: 10px;"
                        class="form-control no-scroll" name="gio_thue" id="gio_thue" onchange="tinhTongChiPhi()">
                        @for ($i = 1; $i <= 24; $i++)
                            <option value="{{ $i }}" style="font-size: 16px;">
                            {{ $i }} giờ
                            </option>
                            @endfor
                    </select>
                    <p>Nội Dung</p>
                    <textarea class="form-control quantity styled-textarea"
                        style="padding-top: 14px; resize: none;font-size: 16px; border-radius: 10px" rows="4"
                        placeholder="Nhập nội dung..." name="noi_dung">{{ old('noi_dung') }}</textarea>
                    <div class="hr"></div>
                    <div class="d-flex justify-content-between">
                        <p> Tổng chi phí:</p>
                        <p class="text-right price color-popup" id="user_gia_tien"></p>
                        <input type="hidden" name="gia_thue" id="gia_thue">

                        <input type="hidden" name="tong_gia" id="tongGia">
                    </div>
                    <div class="d-flex justify-content-between">
                        <p> Số dư:</p>
                        <p class="text-right price color-popup" id="so_du_auth"></p>
                        <input type="hidden" name="so_du_auth" id="soDuAuth">
                    </div>
                    <button type="submit" class="btn btn-primary" style="color: #FFFFFF">Thuê</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script_footer')
<script>
    const authUserId = @json(Auth::id());
</script>

<script>
    let giaMoiGio = 0;
    $(document).ready(function() {
        // Khi modal popup được mở
        $('#popup_bid').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Lấy nút "Thuê" đã được click
            var userId = button.data('id'); // Lấy ID người dùng từ thuộc tính data-id

            // Gửi AJAX để lấy dữ liệu người dùng
            $.ajax({
                url: '/modal-user/' + userId, // Đường dẫn tới API lấy thông tin người dùng
                method: 'GET',
                success: function(data) {
                    // Cập nhật thông tin trong modal với dữ liệu trả về
                    $('#user_id').text(data.id);
                    $('#user_name').text(data.ten);
                    $('#user_biet_danh').text(data.biet_danh);
                    $('#user_ngay_sinh').text(data.ngay_sinh);
                    $('#user_gioi_tinh').text(data.gioi_tinh);
                    $('#user_dia_chi').text(data.dia_chi);
                    $('#user_email').text(data.email);
                    $('#user_sdt').text(data.sdt);
                    $('#user_gia_tien').text(new Intl.NumberFormat('de-DE').format(data
                        .gia_tien) + ' VNĐ');
                    $('#so_du_auth').text(new Intl.NumberFormat('de-DE').format(data
                        .so_du) + ' VNĐ');
                    document.getElementById('soDuAuth').value = data.so_du
                    $('#user_image').attr('src', data
                        .anh_dai_dien); // Cập nhật ảnh đại diện
                    document.getElementById('userId').value = data.id
                    document.getElementById('gia_thue').value = data.gia_tien

                    document.getElementById('tongGia').value = data.gia_tien
                    giaMoiGio = data.gia_tien;
                },
                error: function() {
                    alert('Bạn chưa đăng nhập.');
                }
            });
        });
    });

    function tinhTongChiPhi() {
        // Lấy giá trị số giờ thuê
        const gioThue = parseInt(document.getElementById('gio_thue').value) || 0;

        // Tính tổng chi phí
        const tongChiPhi = gioThue * giaMoiGio;

        // Cập nhật hiển thị tổng chi phí
        document.getElementById('user_gia_tien').textContent = tongChiPhi.toLocaleString('vi-VN') + ' VNĐ';
        document.getElementById('tongGia').value = tongChiPhi;
    }

    function themDonThue() {
        const gioThue = parseInt(document.getElementById('gio_thue').value) || 0;
        const tongChiPhi = gioThue * giaMoiGio;

        const user_id = document.getElementById('userId').value;
        const so_du_auth = document.getElementById('soDuAuth').value;

        if (user_id == null) {
            alert("Người chơi không tồn tại")
            return false;
        }

        if (authUserId == null) {
            alert("Bạn cần đăng nhập để thuê người chơi")
            return false;
        }

        if (so_du_auth < tongChiPhi) {
            alert("Số dư của bạn không đủ")
            return false;
        }

        return true;

    }
</script>
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                window.scrollTo({
                    top: target.offsetTop - 20, // Khoảng cách tính từ đầu trang đến phần tử
                    behavior: 'smooth' // Hiệu ứng cuộn mượt
                });
            }
        });
    });
</script>
@endsection