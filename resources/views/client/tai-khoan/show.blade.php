@extends('client.layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
<section class="flat-title-page inner">
    <div class="overlay"></div>
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading mg-bt-12">
                    <h1 class="heading text-center">{{ $player->ten }}</h1>
                </div>
                <div class="breadcrumbs style2">
                    <ul>
                        <li><a href="{{route('client.index')}}">Home</a></li>
                        <li>{{ $player->ten }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- tf item details -->
<div class="tf-section tf-item-details">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="content-left">
                    <div class="media">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($player->anh_dai_dien) }}" alt=""
                            width="1000" height="400">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="content-right">
                    <div class="sc-item-details">
                        <h2 class="style2">{{ $player->ten }}</h2>
                        <div class="meta-item">
                            <div class="left">
                                <span class="viewed eye">225</span>
                                <span class="liked heart wishlist-button mg-l-8"><span
                                        class="number-like">100</span></span>
                            </div>
                            <div class="right">
                                <a href="#" class="share"></a>
                                <a class="option"></a>
                            </div>
                        </div>
                        <div class="client-infor sc-card-product">
                            @foreach ($selectedCategories as $category)
                            <div class="meta-info">
                                <div class="author">
                                    <div class="avatar">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($category->anh) }}"
                                            alt="{{ $category->ten }}">
                                    </div>
                                    <div class="info">
                                        <h6>
                                            <a href="#">{{ $category->ten }}</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <p>Habitant sollicitudin faucibus cursus lectus pulvinar dolor non ultrices eget.
                            Facilisi lobortisal morbi fringilla urna amet sed ipsum vitae ipsum malesuada.
                            Habitant sollicitudin faucibus cursus lectus pulvinar dolor non ultrices eget.
                            Facilisi lobortisal morbi fringilla urna amet sed ipsum</p>
                        <div class="meta-item-details style2">
                            <div class="item meta-price w-100">
                                <span class="heading">Price</span>
                                <div class="price">
                                    <div class="price-box">
                                        <h5>{{number_format($player->gia_tien, 0 , ',')}} VNĐ</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" data-toggle="modal" data-target="#popup_bid"
                            class="sc-button loadmore style  fl-button pri-3"> <i
                                class="fa fa-user fa-2x"></i><span>Thuê</span></a>
                        <a href="#" data-toggle="modal" data-target="#popup_bid"
                            class="sc-button loadmore style fl-button pri-3">
                            <i class="fa fa-comments fa-2x"></i>
                            <span>Trò Chuyện</span>
                        </a>

                        <div class="flat-tabs themesflat-tabs">
                            <ul class="menu-tab tab-title">
                                <li class="item-title active">
                                    <span class="inner">Bid History</span>
                                </li>
                                <li class="item-title">
                                    <span class="inner">Info</span>
                                </li>
                                <li class="item-title">
                                    <span class="inner">Provenance</span>
                                </li>
                            </ul>
                            <div class="content-tab">
                                <div class="content-inner tab-content">
                                    <ul class="bid-history-list">
                                        <li>
                                            <div class="content">
                                                <div class="client">
                                                    <div class="sc-author-box style-2">
                                                        <div class="author-avatar">
                                                            <a href="#">
                                                                <img src="assets/images/avatar/avt-3.jpg" alt=""
                                                                    class="avatar">
                                                            </a>
                                                            <div class="badge"></div>
                                                        </div>
                                                        <div class="author-infor">
                                                            <div class="name">
                                                                <h6><a href="author02.html">Mason Woodward </a></h6>
                                                                <span> place a bid</span>
                                                            </div>
                                                            <span class="time">8 hours ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <h5> 4.89 ETH</h5>
                                                    <span>= $12.246</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <div class="client">
                                                    <div class="sc-author-box style-2">
                                                        <div class="author-avatar">
                                                            <a href="#">
                                                                <img src="assets/images/avatar/avt-11.jpg"
                                                                    alt="" class="avatar">
                                                            </a>
                                                            <div class="badge"></div>
                                                        </div>
                                                        <div class="author-infor">
                                                            <div class="name">
                                                                <h6> <a href="author02.html">Mason Woodward </a></h6>
                                                                <span>bid accepted</span>
                                                            </div>
                                                            <span class="time">at 06/10/2021, 3:20 AM</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <h5> 4.89 ETH</h5>
                                                    <span>= $12.246</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <div class="client">
                                                    <div class="sc-author-box style-2">
                                                        <div class="author-avatar">
                                                            <a href="#">
                                                                <img src="assets/images/avatar/avt-1.jpg"
                                                                    alt="" class="avatar">
                                                            </a>
                                                            <div class="badge"></div>
                                                        </div>
                                                        <div class="author-infor">
                                                            <div class="name">
                                                                <h6> <a href="author02.html">Mason Woodward </a></h6>
                                                                <span> place a bid</span>
                                                            </div>
                                                            <span class="time">8 hours ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <h5> 4.89 ETH</h5>
                                                    <span>= $12.246</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <div class="client">
                                                    <div class="sc-author-box style-2">
                                                        <div class="author-avatar">
                                                            <a href="#">
                                                                <img src="assets/images/avatar/avt-5.jpg"
                                                                    alt="" class="avatar">
                                                            </a>
                                                            <div class="badge"></div>
                                                        </div>
                                                        <div class="author-infor">
                                                            <div class="name">
                                                                <h6> <a href="author02.html">Mason Woodward </a></h6>
                                                                <span> place a bid</span>
                                                            </div>
                                                            <span class="time">8 hours ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <h5> 4.89 ETH</h5>
                                                    <span>= $12.246</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <div class="client">
                                                    <div class="sc-author-box style-2">
                                                        <div class="author-avatar">
                                                            <a href="#">
                                                                <img src="assets/images/avatar/avt-7.jpg"
                                                                    alt="" class="avatar">
                                                            </a>
                                                            <div class="badge"></div>
                                                        </div>
                                                        <div class="author-infor">
                                                            <div class="name">
                                                                <h6> <a href="author02.html">Mason Woodward </a></h6>
                                                                <span> place a bid</span>
                                                            </div>
                                                            <span class="time">8 hours ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <h5> 4.89 ETH</h5>
                                                    <span>= $12.246</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="content">
                                                <div class="client">
                                                    <div class="sc-author-box style-2">
                                                        <div class="author-avatar">
                                                            <a href="#">
                                                                <img src="assets/images/avatar/avt-8.jpg"
                                                                    alt="" class="avatar">
                                                            </a>
                                                            <div class="badge"></div>
                                                        </div>
                                                        <div class="author-infor">
                                                            <div class="name">
                                                                <h6> <a href="author02.html">Mason Woodward </a></h6>
                                                                <span> place a bid</span>
                                                            </div>
                                                            <span class="time">8 hours ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <h5> 4.89 ETH</h5>
                                                    <span>= $12.246</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="content-inner tab-content">
                                    <ul class="bid-history-list">
                                        <li>
                                            <div class="content">
                                                <div class="client">
                                                    <div class="sc-author-box style-2">
                                                        <div class="author-avatar">
                                                            <a href="#">
                                                                <img src="assets/images/avatar/avt-3.jpg"
                                                                    alt="" class="avatar">
                                                            </a>
                                                            <div class="badge"></div>
                                                        </div>
                                                        <div class="author-infor">
                                                            <div class="name">
                                                                <h6> <a href="author02.html">Mason Woodward </a></h6>
                                                                <span> place a bid</span>
                                                            </div>
                                                            <span class="time">8 hours ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="content-inner tab-content">
                                    <div class="provenance">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book.
                                            It has survived not only five centuries, but also the leap into electronic
                                            typesetting,
                                            remaining essentially unchanged. It was popularised in the 1960s with the
                                            release of Letraset sheets containing Lorem Ipsum passages,
                                            and more recently with desktop publishing software like Aldus PageMaker
                                            including versions of Lorem Ipsum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="danh-gia-list">
            <h1>Đánh giá</h1>
            @foreach ($danhGias as $danhGia)

            <div class="danh-gia-item d-flex align-items-start mb-4 p-3 rounded shadow-sm">
                <!-- Ảnh đại diện -->
                <img src="{{ \Illuminate\Support\Facades\Storage::url($danhGia->nguoiThue->anh_dai_dien) }}" alt="Ảnh đại diện" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">

                <!-- Nội dung đánh giá -->
                <div class="danh-gia-content w-100 d-flex justify-content-between">
                    <!-- Phần bên trái -->
                    <div class="danh-gia-left flex-grow-1">
                        <strong class="text-dark">{{ $danhGia->nguoiThue->ten }}</strong>
                        <small class="text-muted d-block">{{ $danhGia->created_at }}</small>
                        <p class="mb-2 text-secondary">
                            {{ $danhGia->noi_dung }}
                        </p>
                    </div>

                    <!-- Phần sao đánh giá -->
                    <div class="danh-gia-stars text-end flex-shrink-0">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <=$danhGia->danh_gia)
                            <i class="fas fa-star text-warning"></i>
                            @else
                            <i class="far fa-star text-muted"></i>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
            @endforeach

            @if($danhGias->isEmpty())
            <p class="text-center text-muted">Chưa có đánh giá nào...</p>
            @endif
        </div>
    </div>
</div>





<style>
    /* Container chung */
    h1 {
        margin-bottom: 20px;
        margin-left: 20px;
        font-size: 48px;
        /* Kích thước lớn vừa phải */
        font-weight: 700;
        /* Đậm nhưng không quá nặng */
        color: #2c3e50;
        /* Màu xanh đậm thanh lịch */
        
        padding-left: 15px;
        /* Tạo khoảng cách giữa viền và chữ */
        background: linear-gradient(to right, #3498db, #2ecc71);
        /* Hiệu ứng gradient */
        -webkit-background-clip: text;
        /* Gradient chỉ áp dụng cho chữ */
        -webkit-text-fill-color: transparent;
        /* Giữ phần chữ trong suốt để hiện gradient */
        letter-spacing: 0.5px;
        /* Nhẹ nhàng tăng khoảng cách giữa chữ */
        line-height: 1.3;
        /* Cân bằng khoảng cách dòng */
        transition: transform 0.2s ease, opacity 0.3s ease;
        /* Hiệu ứng hover */
    }



    .danh-gia-list {
        margin-top: 30px;
    }

    /* Mỗi item đánh giá */
    .danh-gia-item {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        display: flex;
        align-items: start;
        padding: 15px;

    }


    /* Ảnh đại diện */
    .danh-gia-item img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 15px;
    }

    /* Nội dung đánh giá */
    .danh-gia-content {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    /* Nội dung bên trái */
    .danh-gia-left {
        flex-grow: 1;
        /* Đảm bảo phần nội dung bên trái chiếm không gian */
        margin-right: 15px;
        word-wrap: break-word;
    }

    .danh-gia-left strong {
        font-size: 20px;
        /* Hiển thị tên rõ ràng */
        color: #333;
        white-space: nowrap;
        /* Giữ tên trên một dòng */
        overflow: hidden;
        /* Cắt nếu tên quá dài */
        text-overflow: ellipsis;
        /* Thêm "..." nếu bị cắt */
    }

    .danh-gia-left p {
        overflow-wrap: break-word;
        word-wrap: break-word;
        word-break: break-word;
        white-space: normal;
    }

    /* Sao đánh giá */
    .danh-gia-stars {
        min-width: 100px;
        /* Đảm bảo phần sao không thu nhỏ */
        text-align: right;
        /* Căn phải sao đánh giá */
        flex-shrink: 0;
        /* Không cho phép bị thu nhỏ */
    }

    .danh-gia-stars i {
        font-size: 18px;
        margin-left: 2px;
    }

    /* Ngày tháng nhỏ hơn */
    .danh-gia-left small {
        font-size: 13px;
        color: #888;
        margin-top: 5px;
    }

    /* Hiển thị thông báo khi không có đánh giá */
    .text-center.text-muted {
        font-size: 16px;
        color: #999;
        padding: 20px;
    }
</style>


<script>

</script>






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

                    <p>Số giờ thuê
                    </p>
                    <select style="color: #0b0b0b; height: 50px; font-size: 16px; border-radius: 10px;"
                        class="form-control no-scroll" name="gio_thue" id="gio_thue" onchange="tinhTongChiPhi()">
                        @for($i = 1; $i <= 24; $i++)
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
                    </div>
                    <div class="d-flex justify-content-between">
                        <p> Số dư:</p>
                        <p class="text-right price color-popup" id="so_du_auth"></p>
                        <input type="hidden" name="so_du_auth" id="soDuAuth">
                    </div>
                    <!-- <div class="d-flex justify-content-between">
                                <p> Số dữ của bạn:</p>
                                <p class="text-right price color-popup"></p>
                            </div> -->
                    <button type="submit" class="btn btn-primary" style="color: #FFFFFF">Thuê</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script_footer')
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
                    $('#user_gia_tien').text(new Intl.NumberFormat('de-DE').format(data.gia_tien) + ' VNĐ');
                    $('#so_du_auth').text(new Intl.NumberFormat('de-DE').format(data.so_du) + ' VNĐ');
                    document.getElementById('soDuAuth').value = data.so_du
                    $('#user_image').attr('src', data.anh_dai_dien); // Cập nhật ảnh đại diện
                    document.getElementById('userId').value = data.id
                    document.getElementById('gia_thue').value = data.gia_tien

                    giaMoiGio = data.gia_tien;
                },
                error: function() {
                    alert('Không thể tải thông tin người dùng.');
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

        if (so_du_auth < tongChiPhi) {
            alert("Số dư của bạn không đủ")
            return false;
        }

        return true;

    }
</script>
@endsection