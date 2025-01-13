@extends('client.layouts.app')

@section('title', 'Chi tiết tài khoản')

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
                            <li><a href="{{ route('client.index') }}">Home</a></li>
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
                    <div class="content-left">
                        <div class="media">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($player->anh_dai_dien) }}" alt=""
                                width="400" height="400">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-12">
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
                                @foreach ($danhmuctaikhoans as $category)
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

                            <p style="color: #FFFFFF">{{ $player->mo_ta }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12">
                    <div class="content-right">
                        <div class="sc-item-details">
                            <div class="meta-item-details style2">
                                <div class="item meta-price w-100">
                                    <span class="heading">Giá thuê</span>
                                    <div class="price">
                                        <div class="price-box">
                                            <h5>{{ number_format($player->gia_tien, 0, ',') }} VNĐ</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" data-toggle="modal"
                                data-target="#popup_bid{{ $player->isVerified() ? '' : 'disabled' }}"
                                data-id="{{ $player->id }}" class="sc-button loadmore style fl-button pri-3 ">
                                <i class="fa fa-user fa-2x"></i>
                                @if ($player->isVerified())
                                    <span>Thuê</span>
                                @else
                                    <span class="text-danger">Người dùng chưa xác thực</span>
                                @endif
                            </a>

                            <a href="#" data-toggle="modal" data-target="#popup_chat"
                                class="sc-button loadmore style fl-button pri-3">
                                <i class="fa fa-comments fa-2x"></i>
                                <span>Trò Chuyện</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="danh-gia-list mt-5">
                <h2 class="container">Đánh giá</h2>
                @foreach ($danhGias as $danhGia)
                    <div class="danh-gia-item d-flex align-items-start mb-4 p-3 rounded shadow-sm">
                        <!-- Ảnh đại diện -->
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($danhGia->nguoiThue->anh_dai_dien) }}"
                            alt="Ảnh đại diện" class="rounded-circle me-3"
                            style="width: 50px; height: 50px; object-fit: cover;">

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
                                    @if ($i <= $danhGia->danh_gia)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star text-muted"></i>
                                    @endif
                                @endfor
                                <p> (Thuê {{ $danhGia->lichSuThue->gio_thue }}h)</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if ($danhGias->isEmpty())
                    <p class="text-center text-muted">Chưa có đánh giá nào...</p>
                @endif
            </div>
        </div>
    </div>

    <style>
        /* Phần danh sách đánh giá */
        .danh-gia-list {
            background-color: #f9f9f9;
            /* Nền nhẹ */
            padding: 20px;
            border-radius: 10px;
            margin: auto;
            width: 100%;
            /* Chiều rộng tự nhiên */
        }

        /* Tiêu đề */
        .danh-gia-list h2 {
            font-size: 50px;
            /* Giữ kích thước lớn */
            font-weight: bold;
            color: #007bff;
            /* Màu nổi bật */
            text-align: center;
            margin-bottom: 30px;
            /* Khoảng cách lớn hơn */
        }

        /* Mỗi đánh giá */
        .danh-gia-item {
            display: flex;
            /* Sắp xếp ngang */
            align-items: center;
            /* Canh giữa theo trục dọc */
            background-color: #ffffff;
            /* Nền trắng */
            padding: 15px;
            margin-bottom: 20px;
            /* Khoảng cách giữa các đánh giá */
            border-radius: 8px;
            width: 100%;
            /* Chiều rộng tự động */
        }

        /* Ảnh đại diện */
        .danh-gia-item img {
            flex-shrink: 0;
            /* Không co ảnh */
            width: 50px;
            height: 50px;
            object-fit: cover;
            /* Ảnh luôn vừa khung */
            border: 2px solid #007bff;
            border-radius: 50%;
            /* Bo tròn */
            margin-right: 15px;
            /* Khoảng cách bên phải */
        }

        /* Nội dung đánh giá */
        .danh-gia-content {
            display: flex;
            /* Sắp xếp ngang */
            justify-content: space-between;
            /* Phân bố đều giữa các phần */
            align-items: flex-start;
            /* Canh trên cùng */
            border-left: 2px dashed #ccc;
            padding-left: 15px;
            width: calc(100% - 70px);
            /* Trừ đi phần chiều rộng của ảnh + margin */
        }

        /* Phần trái (Nội dung chính) */
        .danh-gia-left {
            flex-grow: 1;
            /* Chiếm tối đa không gian còn lại */
        }

        .danh-gia-left strong {
            font-size: 16px;
            /* Kích thước lớn */
            color: #343a40;
        }

        .danh-gia-left small {
            font-size: 0.9rem;
            /* Nhỏ hơn một chút */
            color: #6c757d;
            margin-top: 5px;
        }

        .danh-gia-left p {
            margin-top: 10px;
            line-height: 1.5;
            font-size: 14px;
            color: #555;
            /* Màu chữ mềm hơn */
        }

        /* Phần sao đánh giá */
        .danh-gia-stars {
            flex-shrink: 0;
            /* Không thu nhỏ phần này */
            text-align: right;
            /* Canh phải */
            white-space: nowrap;
            /* Không xuống dòng */
        }

        .danh-gia-stars i {
            font-size: 1.2rem;
            margin-right: 2px;
        }

        .danh-gia-stars p {
            margin-top: 5px;
            font-size: 1rem;
            color: #6c757d;
            font-style: italic;
        }
    </style>
@endsection

@section('modal_user')
    <div class="modal fade popup" id="popup_bid" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form id="chatForm" action="{{ route('client.themDonThue') }}" onsubmit="return themDonThue()"
                    method="post">
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
                            @for ($i = 1; $i <= 24; $i++)
                                <option value="{{ $i }}" style="font-size: 16px;">
                                    {{ $i }} giờ
                                </option>
                            @endfor
                        </select>

                        <p>Nội Dung</p>
                        <input type="hidden" id="nguoiNhanThue" name="nguoi_nhan" value="{{ $player->id }}">
                        <input type="hidden" id="tenNguoiNhanThue" name="ten_nguoi_nhan" value="{{ $player->ten }}">
                        <textarea id="chatMessageThue" name="tin_nhan" class="form-control styled-textarea"
                            style="resize: none; font-size: 16px; border-radius: 10px" rows="4" placeholder="Nhập tin nhắn..."></textarea>

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
                        <button type="submit" id="sendMessageBtnThue" class="btn btn-primary"
                            style="color: #FFFFFF">Thuê</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('modal_chat')
    <div class="modal fade popup" id="popup_chat" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form id="chatForm" class="modal-body space-y-20 pd-40">
                    @csrf
                    <h3>Trò Chuyện</h3>
                    <p class="text-center">Người chơi: <span class="price color-popup"
                            id="chat_user_name">{{ $player->ten }}</span></p>
                    <input type="hidden" id="nguoiNhan" name="nguoi_nhan" value="{{ $player->id }}">
                    <input type="hidden" id="tenNguoiNhan" name="ten_nguoi_nhan" value="{{ $player->ten }}">
                    <textarea id="chatMessage" class="form-control styled-textarea"
                        style="resize: none; font-size: 16px; border-radius: 10px" rows="4" placeholder="Nhập tin nhắn..."></textarea>
                    <button type="button" id="sendMessageBtn" class="btn btn-primary mt-3"
                        style="color: #FFFFFF">Gửi</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script_footer')
    <script>
        const authUserId = @json(auth()->id());
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

        document.addEventListener('DOMContentLoaded', () => {
            // Gán sự kiện click vào nút Trò Chuyện
            document.querySelectorAll('[data-target="#popup_chat"]').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-id');
                    const userName = this.querySelector('span').textContent;

                    // Cập nhật thông tin vào modal Trò Chuyện
                    document.getElementById('chat_user_name').textContent = userName;

                    // Nếu cần thêm dữ liệu userId vào modal (ví dụ để gửi tin nhắn)
                    console.log('User ID:', userId); // Bạn có thể thực hiện thêm logic tại đây
                });
            });
        });
    </script>
@endsection
