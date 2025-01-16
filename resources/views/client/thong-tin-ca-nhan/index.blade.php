@extends('client.layouts.app')
@section('title', 'Thông tin cá nhân')
@section('content')
<section class="flat-title-page inner">
    <div class="overlay"></div>
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading mg-bt-12">
                    <h1 class="heading text-center">Thông tin cá nhân</h1>
                </div>
                <div class="breadcrumbs style2">
                    <ul>
                        <li><a href="{{ route('client.index') }}">Trang chủ</a></li>
                        <li><a href="#">Thông tin cá nhân</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="tf-create-item tf-section">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="themesflat-container">
        <form action="{{ route('client.thong-tin-ca-nhan.update') }}" method="POST" class="form-profile"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="sc-card-profile text-center">
                        <div class="sc-card-profile text-center">
                            <div class="card-media">
                                <img id="profileimg" src="{{ \Illuminate\Support\Facades\Storage::url($user->anh_dai_dien) }}" alt="Image">
                                <div id="upload-profile">
                                    <a href="#" class="btn-upload">
                                        Upload New Photo
                                    </a>
                                    <input id="tf-upload-img" type="file" name="anh_dai_dien">
                                </div>
                            </div>




                            <div class="status-activity mt-2">
                                <label class="switch">
                                    <input type="checkbox" name="trang_thai" value="1" {{ $user->trang_thai == 1 ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>
                                <span class="status-text {{ $user->trang_thai == 1 ? 'text-success' : 'text-danger' }}">
                                    {{ $user->trang_thai == 1 ? 'Đang chờ thuê' : 'Ngừng nhận đơn thuê' }}
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                    <div class="form-upload-profile">
                        <div class="form-infor-profile">
                            <div class="info-account">
                                <h4 class="title-create-item">Thông tin cá nhân</h4>
                                <fieldset>
                                    <h4 class="title-infor-account">Tên</h4>
                                    <input type="text" name="ten" placeholder="Tên đăng nhập"
                                        class="form-control text-white bg-dark" value="{{ old('ten', $user->ten) }}"
                                        required>

                                    @error('ten')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                                <fieldset>
                                    <h4 class="title-infor-account">Số điện thoại</h4>
                                    <input type="text" placeholder="Số điện thoại"
                                        class="form-control text-white bg-dark" name="sdt"
                                        value="{{ old('sdt', $user->sdt) }}" required>
                                </fieldset>
                                <fieldset>
                                    <h4 class="title-infor-account">Email</h4>
                                    <input type="email" placeholder="Nhập email"
                                        class="form-control text-white bg-dark" name="email"
                                        value="{{ old('email', $user->email) }}" required>
                                </fieldset>
                                <fieldset>
                                    <h4 class="title-infor-account">Ngày sinh</h4>
                                    <input type="date" class="form-control text-white bg-dark"
                                        placeholder="Ngày tháng năm sinh" name="ngay_sinh"
                                        value="{{ old('ngay_sinh', $user->ngay_sinh) }}"
                                        max="{{ date('Y-m-d') }}" required>
                                </fieldset>

                                <fieldset>
                                    <h4 class="title-infor-account">Địa chỉ</h4>
                                    <input type="text" placeholder="Địa chỉ" name="dia_chi"
                                        value="{{ old('dia_chi', $user->dia_chi) }}"
                                        class="form-control text-white bg-dark" required>
                                </fieldset>
                                <fieldset class="mb-3">
                                    <h4 class="title-infor-account text-white mb-2">Giới tính</h4>
                                    <select class="form-select text-white bg-dark border-0 rounded-2 p-2"
                                        name="gioi_tinh" required>
                                        <option value="" class="text-white bg-dark" disabled selected>Chọn giới
                                            tính</option>
                                        <option value="male" {{ $user->gioi_tinh == 'male' ? 'selected' : '' }}
                                            class="text-white bg-dark">Nam</option>
                                        <option value="female" {{ $user->gioi_tinh == 'female' ? 'selected' : '' }}
                                            class="text-white bg-dark">Nữ</option>
                                        <option value="other" {{ $user->gioi_tinh == 'other' ? 'selected' : '' }}
                                            class="text-white bg-dark">Khác</option>
                                    </select>
                                </fieldset>
                                <fieldset>
                                    <h4 class="title-infor-account">Biệt danh</h4>
                                    <input type="text" placeholder="Biệt danh"
                                        class="form-control text-white bg-dark" name="biet_danh"
                                        value="{{ old('biet_danh', $user->biet_danh) }}">

                                    @error('ten')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                                <fieldset>
                                    {{-- Hiển thị trạng thái xác thực --}}
                                    @if ($user->trang_thai_xac_thuc == 1)
                                    <h4 class="title-infor-account">Giá tiền</h4>
                                    <div class="form-group mt-3">

                                        <input type="number" id="gia_tien" name="gia_tien" class="form-control text-white bg-dark"
                                            value="{{ $user->gia_tien ?? '' }}" placeholder="Nhập giá tiền">
                                    </div>
                                    <h4 class="title-infor-account">Mô tả</h4>
                                    <div class="form-group mt-3">
                                        <textarea id="mo_ta" name="mo_ta" class="form-control text-white bg-dark"
                                            placeholder="Nhập mô tả">{{ $user->mo_ta ?? '' }}</textarea>
                                    </div>
                                    @endif
                                </fieldset>


                                <h4 class="title-infor-account">Danh mục game</h4>


                                <input type="hidden" name="danh_muc" id="selectedCategoriesInput" value="{{ implode(',', $selectedCategories) }}">

                                <div id="selectedCategoriesContainer"
                                    class="border p-2 rounded bg-dark text-white mb-3 d-flex flex-wrap gap-2 align-items-center"
                                    style="min-height: 50px;">
                                    @foreach ($selectedCategories as $categoryId)
                                    @php
                                    $category = $categories->firstWhere('id', $categoryId);
                                    @endphp
                                    @if ($category)
                                    <div class="selected-tag" data-id="{{ $category->id }}">
                                        <span>{{ $category->ten }}</span>
                                        <button type="button" class="remove-tag">&times;</button>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>

                                <div id="categoryList">
                                    @foreach ($categories as $category)
                                    @if (!in_array($category->id, $selectedCategories))
                                    <div class="category-btn" data-id="{{ $category->id }}">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($category->anh) }}" alt="" width="30" height="30">
                                        <span>{{ $category->ten }}</span>
                                    </div>

                                    @endif
                                    @endforeach
                                </div>



                            </div>
                        </div>
                        <h4 class="title-create-item">Upload CCCD và Video Bản Thân</h4>

                        <div class="form-infor-profile" id="cccd-video">

                            <fieldset>
                                <h4 class="title-infor-account">Ảnh CCCD</h4>
                                <input type="file" name="cccd" accept="image/*"
                                    class="form-control text-white bg-dark">
                                @error('cccd')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @if ($user->cccd)
                                <div class="mt-2">
                                    <h5>Ảnh CCCD đã tải lên:</h5>
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($user->cccd) }}"
                                        alt="Ảnh CCCD" class="img-fluid" style="max-width: 200px;">
                                </div>
                                @endif
                            </fieldset>

                            <fieldset>
                                <h4 class="title-infor-account">Video Bản Thân</h4>
                                <input type="file" name="personal_video" accept="video/*"
                                    class="form-control text-white bg-dark">
                                @error('personal_video')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @if ($user->personal_video)
                                <div class="mt-2">
                                    <h5>Video bản thân đã tải lên:</h5>
                                    <video controls class="img-fluid" style="max-width: 300px;">
                                        <source
                                            src="{{ \Illuminate\Support\Facades\Storage::url($user->personal_video) }}"
                                            type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                @endif
                            </fieldset>



                            <div class="form-infor-profiles">
                                <div>
                                    <h4 class="title-infor-account">Số CCCD</h4>
                                    <input type="text" name="cccd_so" placeholder="Nhập số CCCD"
                                        class="form-control text-white bg-dark">
                                    @error('cccd_so')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    @if ($user->cccd_so)
                                    <div class="mt-2">
                                        <h5>Số CCCD đã tải lên: {{$user->cccd_so}}</h5>
                                    </div>
                                    @endif
                                </div>

                                <div>
                                    <h4 class="title-create-item">Trạng thái xác thực</h4>
                                    <p>
                                        @if ($user->trang_thai_xac_thuc == 1)
                                        <span class="text-success" style="font-size: 18px;">Đã xác thực</span>
                                        @elseif ($user->trang_thai_xac_thuc == 2)
                                        <span class="text-danger" style="font-size: 18px;">Từ chối xác thực</span>
                                        @else
                                        <span class="text-danger" style="font-size: 18px;">Chưa xác thực</span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                        </div>

                        <button class="tf-button-submit mg-t-15" type="submit">
                            Cập nhật thông tin
                        </button>

                    </div>
                </div>


            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectedCategoriesContainer = document.getElementById('selectedCategoriesContainer');
        const selectedCategoriesInput = document.getElementById('selectedCategoriesInput');
        const categoryButtons = document.querySelectorAll('.category-btn');
        const categoryList = document.getElementById('categoryList');

        let selectedCategories = @json($selectedCategories); // Lấy dữ liệu đã chọn từ cơ sở dữ liệu

        // Cập nhật giá trị của input ẩn
        function updateSelectedCategories() {
            selectedCategoriesInput.value = selectedCategories.join(','); // Cập nhật lại giá trị của input ẩn
        }

        // Hiển thị danh mục chưa được chọn
        function updateCategoryList() {
            // Ẩn tất cả các button danh mục và chỉ hiển thị danh mục chưa được chọn
            categoryButtons.forEach(button => {
                const categoryId = button.getAttribute('data-id');
                if (!selectedCategories.includes(categoryId)) {
                    button.style.display = 'block';
                } else {
                    button.style.display = 'none';
                }
            });
        }

        // Cập nhật lại input ẩn và danh sách các danh mục
        function updateCategoryDisplay() {
            updateCategoryList();
            updateSelectedCategories();
        }

        // Xử lý khi người dùng chọn danh mục
        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                const categoryId = this.dataset.id;
                const categoryName = this.querySelector('span').textContent.trim();

                if (!selectedCategories.includes(categoryId)) {
                    selectedCategories.push(categoryId);

                    // Tạo thẻ mới cho danh mục đã chọn
                    const tag = document.createElement('div');
                    tag.classList.add('selected-tag');
                    tag.setAttribute('data-id', categoryId);
                    tag.innerHTML = `
                    <span>${categoryName}</span>
                    <button type="button" class="remove-tag">&times;</button>
                `;

                    // Xử lý sự kiện xóa thẻ danh mục đã chọn
                    tag.querySelector('.remove-tag').addEventListener('click', function() {
                        // Xóa danh mục khỏi danh sách đã chọn
                        selectedCategories = selectedCategories.filter(id => id !== categoryId);

                        // Cập nhật lại giá trị của input ẩn sau khi xóa danh mục
                        updateSelectedCategories();

                        // Xóa thẻ khỏi giao diện
                        tag.remove();

                        // Hiển thị lại button danh mục có thể chọn
                        const categoryButton = document.querySelector(`.category-btn[data-id="${categoryId}"]`);
                        if (categoryButton) {
                            categoryButton.style.display = 'block';
                        }

                        // Cập nhật danh sách và input
                        updateCategoryDisplay();
                    });

                    selectedCategoriesContainer.appendChild(tag);
                    this.style.display = 'none'; // Ẩn nút danh mục đã chọn
                    updateCategoryDisplay(); // Cập nhật lại danh sách danh mục và input ẩn
                }
            });
        });

        // Cập nhật danh sách danh mục ban đầu
        updateCategoryDisplay();
    });
    document.querySelector('input[name="active_status"]').addEventListener('change', function() {
        var statusText = this.checked ? 'Đang chờ thuê' : 'Ngừng nhận đơn thuê';
        var statusColor = this.checked ? 'text-success' : 'text-danger';
        var statusSpan = document.querySelector('.status-text');

        statusSpan.textContent = statusText;
        statusSpan.className = 'status-text ' + statusColor;
    });
</script>
<style>
    /* Container for the form sections */
    .form-infor-profile {
        background-color: #2a2a2a;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        margin-bottom: 30px;
        justify-content: space-around;
    }

    /* Title styling */
    h4.title-create-item,
    h4.title-infor-account {
        color: #fff;
        font-size: 1.6rem;
        margin-bottom: 15px;
    }

    /* Input fields */
    input[type="file"] {
        width: 100%;
        padding: 12px 18px;
        background-color: #333;
        color: #fff;
        border: 1px solid #444;
        border-radius: 6px;
        font-size: 1rem;
        margin-bottom: 15px;
        transition: border-color 0.3s ease;
    }

    input[type="file"]:focus {
        border-color: #66cc66;
        outline: none;
    }



    /* Error message styling */
    .text-danger {
        color: #ff3b2d;
        font-size: 0.9rem;
        margin-top: 5px;
    }

    /* Display uploaded image or video */
    img.img-fluid,
    video.img-fluid {
        border-radius: 6px;
        max-width: 100%;
        margin-top: 15px;
    }

    .mt-2 {
        margin-top: 10px;
    }

    /* Status message */
    .form-infor-profile p {
        font-size: 1.2rem;
        margin-top: 10px;
    }

    .text-success {
        color: #66cc66;
    }

    .text-danger {
        color: #ff3b2d;
    }

    /* Responsive design for small screens */
    @media (max-width: 768px) {
        .form-infor-profile {
            padding: 20px;
        }

        h4.title-create-item,
        h4.title-infor-account {
            font-size: 1.4rem;
        }

        input[type="file"] {
            padding: 10px 15px;
        }
    }

    .form-infor-profiles {
        margin-left: 20px;
    }

    #cccd-video {
        justify-content: space-around;
    }

    .title-create-item {
        text-align: center;
    }

    /* Nút bật/tắt (Toggle Button) */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        border-radius: 50%;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: 0.4s;
    }

    input:checked+.slider {
        background-color: #66cc66;
        /* Màu xanh khi bật */
    }

    input:checked+.slider:before {
        transform: translateX(26px);
        /* Di chuyển vòng tròn khi bật */
    }

    .status-activity {
        font-size: 1.2rem;
        margin-top: 10px;
        display: flex;
        align-items: center;
    }

    .status-text {
        margin-left: 10px;
        font-weight: bold;
    }

    .text-success {
        color: #66cc66;
    }

    .text-danger {
        color: #ff3b2d;
    }
</style>
@endsection