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
                            <li><a href="index-2.html">Home</a></li>
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
                <div class="col-xl-3 col-md-12">
                    <div class="content-left" style="width:300px; margin-left: 15%">
                        <div class="media">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($player->anh_dai_dien) }}" alt=""
                                width="600px">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="content-right">
                        <div class="sc-item-details">
                            <h2 class="style2">{{ $player->ten }}</h2>
                            <div class="meta-item">
                                <div class="left">

                                </div>
                                <div class="right">
                                    <span class="liked heart mg-l-8"><span
                                            class="">Theo dõi</span></span>
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

                            <div class="flat-tabs themesflat-tabs">
                                <ul class="menu-tab tab-title">
                                    <li class="item-title">
                                        <span class="inner">Thông tin</span>
                                    </li>
                                </ul>
                                <div class="content-tab">
                                    <div class="content-inner tab-content">
                                        <div class="provenance">
                                            <p>noi dung.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-12">
                    <div class="content-right">
                        <div class="sc-item-details">
                            <div class="meta-item-details style2">
                                <div class="item meta-price w-100">
                                    <span class="heading">Giá Thuê</span>
                                    <div class="price">
                                        <div class="price-box">
                                            <h5>{{number_format($player->gia_tien, 0 , ',')}} VNĐ</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" data-toggle="modal" data-target="#popup_bid" data-id="{{ $player->id }}"
                                class="sc-button loadmore style  fl-button pri-3"> <i
                                    class="fa fa-user fa-2x"></i><span>Thuê</span></a>
                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                               class="sc-button loadmore style fl-button pri-3">
                                <i class="fa fa-comments fa-2x"></i>
                                <span>Trò Chuyện</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /tf item details -->

    <div class="danh-gia-list">
    @foreach ($danhGias as $danhGia)
        <div class="danh-gia-item p-3 mb-4 border rounded bg-white shadow-sm">
            <!-- Thông tin ngôi sao -->
            <div class="d-flex align-items-center mb-2">
                <div class="danh-gia-stars me-2">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $danhGia->danh_gia)
                            <i class="fas fa-star text-warning"></i>
                        @else
                            <i class="far fa-star text-muted"></i>
                        @endif
                    @endfor
                </div>
                <!-- <strong class="text-muted fs-6">{{ $danhGia->danh_gia }} sao</strong> -->
            </div>

            <!-- Nội dung bình luận -->
            <p class="mb-2 text-secondary" style="line-height: 1.6;">
                {{ $danhGia->noi_dung }}
            </p>

            <!-- Tên người dùng và ngày -->
            <div class="d-flex justify-content-between text-muted fs-6">
                <span>Đánh giá bởi: <strong>{{ $danhGia->nguoiThue->ten }}</strong></span>
                <!--  -->
            </div>
        </div>
    @endforeach

    @if ($danhGias->isEmpty())
        <p class="text-center text-muted">Chưa có đánh giá nào.</p>
    @endif
</div>




</div>

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
    $(document).ready(function () {
        // Khi modal popup được mở
        $('#popup_bid').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Lấy nút "Thuê" đã được click
            var userId = button.data('id'); // Lấy ID người dùng từ thuộc tính data-id

            // Gửi AJAX để lấy dữ liệu người dùng
            $.ajax({
                url: '/modal-user/' + userId,  // Đường dẫn tới API lấy thông tin người dùng
                method: 'GET',
                success: function (data) {
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
                    $('#user_image').attr('src', data.anh_dai_dien);  // Cập nhật ảnh đại diện
                    document.getElementById('userId').value = data.id
                    document.getElementById('gia_thue').value = data.gia_tien

                    giaMoiGio = data.gia_tien;
                },
                error: function () {
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

    function themDonThue(){
        const gioThue = parseInt(document.getElementById('gio_thue').value) || 0;
        const tongChiPhi = gioThue * giaMoiGio;

        const user_id = document.getElementById('userId').value;
        const so_du_auth = document.getElementById('soDuAuth').value;

        if (user_id == null){
            alert("Người chơi không tồn tại")
            return false;
        }

        if (so_du_auth < tongChiPhi){
            alert("Số dư của bạn không đủ")
            return false;
        }

        return true;

    }

</script>
@endsection