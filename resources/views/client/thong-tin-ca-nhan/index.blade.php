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
                        <div class="card-media">
                            <img id="profileimg"
                                src="{{ \Illuminate\Support\Facades\Storage::url($user->anh_dai_dien) }}"
                                alt="Image">
                        </div>
                        <div id="upload-profile">
                            <a href="#" class="btn-upload">
                                Upload New Photo </a>
                            <input id="tf-upload-img" type="file" name="anh_dai_dien">
                        </div>
                        {{-- <a href="#" class="btn-upload style2">
                                Delete</a> --}}
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                    <div class="form-upload-profile">



                        <div class="form-infor-profile">
                            <div class="info-account">
                                <h4 class="title-create-item">Thông tin cả nhân</h4>
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
                                        value="{{ old('ngay_sinh', $user->ngay_sinh) }}" required>
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
                                        value="{{ old('biet_danh', $user->biet_danh) }}" required>

                                    @error('ten')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </fieldset>

                                <fieldset>
                                    <h4 class="title-infor-account">Danh mục game</h4>
                                    <input type="hidden" name="selected_categories" id="selectedCategoriesInput">

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
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($category->anh) }}"
                                                alt="" width="30" height="30">
                                            <span>{{ $category->ten }}</span>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </fieldset>


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
                                <h4 class="title-create-item">Trạng thái xác thực</h4>
                                <p>
                                    @if ($user->trang_thai_xac_thuc)
                                    <span class="text-success">Đã xác thực</span>
                                    @else
                                    <span class="text-danger">Chưa xác thực</span>
                                    @endif
                                </p>
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

        // Lấy danh mục đã chọn từ PHP (truyền từ server)
        let selectedCategories = @json($selectedCategories); // Dữ liệu đã chọn từ database

        // Cập nhật giá trị của input ẩn
        function updateSelectedCategories() {
            selectedCategoriesInput.value = selectedCategories.join(
                ','); // Chuyển mảng ID thành chuỗi cách nhau bởi dấu phẩy
        }

        // Hàm hiển thị lại danh mục trong categoryList nếu không có trong selectedCategories
        function updateCategoryList() {
            // Lọc các game đã chọn và ẩn chúng trong categoryList
            const categoryButtons = document.querySelectorAll('.category-btn');
            categoryButtons.forEach(button => {
                const categoryId = button.getAttribute('data-id');
                // Nếu danh mục chưa được chọn thì hiển thị lại nó trong categoryList
                if (!selectedCategories.includes(categoryId)) {
                    button.style.display = 'block';
                }
            });
        }

        // Thêm danh mục vào danh sách đã chọn
        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                const categoryId = this.dataset.id;
                const categoryName = this.querySelector('span').textContent.trim();

                // Nếu danh mục chưa được chọn
                if (!selectedCategories.includes(categoryId)) {
                    selectedCategories.push(categoryId);

                    // Tạo thẻ để hiển thị danh mục đã chọn
                    const tag = document.createElement('div');
                    tag.classList.add('selected-tag');
                    tag.setAttribute('data-id', categoryId);
                    tag.innerHTML = `
                    <span>${categoryName}</span>
                    <button type="button" class="remove-tag">&times;</button>
                `;

                    // Thêm sự kiện để xóa danh mục
                    tag.querySelector('.remove-tag').addEventListener('click', function() {
                        // Xóa danh mục khỏi danh sách đã chọn
                        selectedCategories = selectedCategories.filter(id => id !==
                            categoryId);
                        tag.remove();
                        updateSelectedCategories(); // Cập nhật lại input ẩn

                        // Hiển thị lại nút thêm danh mục vào danh sách categoryList
                        const restoredButton = document.querySelector(
                            `.category-btn[data-id="${categoryId}"]`);
                        if (restoredButton) {
                            restoredButton.style.display = 'block'; // Hiển thị lại nút
                        }
                    });

                    // Thêm thẻ vào container
                    selectedCategoriesContainer.appendChild(tag);

                    // Ẩn nút thêm danh mục khỏi danh sách
                    this.style.display = 'none';

                    // Cập nhật lại giá trị trong input ẩn
                    updateSelectedCategories();
                }
            });
        });

        // Xử lý sự kiện xóa danh mục đã chọn
        selectedCategoriesContainer.addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('remove-tag')) {
                const tag = event.target.closest('.selected-tag');
                const categoryId = tag.getAttribute('data-id');
                // Loại bỏ danh mục khỏi danh sách đã chọn
                selectedCategories = selectedCategories.filter(id => id !== categoryId);
                tag.remove(); // Xóa thẻ khỏi giao diện
                updateSelectedCategories(); // Cập nhật lại giá trị input ẩn

                // Hiển thị lại nút thêm danh mục vào danh sách categoryList
                const restoredButton = document.querySelector(`.category-btn[data-id="${categoryId}"]`);
                if (restoredButton) {
                    restoredButton.style.display = 'block'; // Hiển thị lại nút
                }
            }
        });

        // Cập nhật danh mục ban đầu cho categoryList
        updateCategoryList();

        // Cập nhật giá trị ban đầu cho input ẩn từ danh mục đã chọn (có thể lấy từ server)
        updateSelectedCategories();
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
</style>
@endsection