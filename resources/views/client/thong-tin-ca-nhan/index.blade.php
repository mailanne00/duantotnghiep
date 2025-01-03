@extends('client.layouts.app')

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
                            <li><a href="index-2.html">Trang chủ</a></li>
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
                                    <h4 class="title-create-item">Thông tin cá nhân</h4>
                                    <fieldset>
                                        <h4 class="title-infor-account">Tên</h4>
                                        <input type="text" name="ten" placeholder="Tên đăng nhập"
                                            class="form-control text-white bg-dark" value="{{ old('ten', $user->ten) }}">

                                        @error('ten')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                    <fieldset>
                                        <h4 class="title-infor-account">Số điện thoại</h4>
                                        <input type="text" placeholder="Số điện thoại"
                                            class="form-control text-white bg-dark" name="sdt"
                                            value="{{ old('sdt', $user->sdt) }}">
                                    </fieldset>
                                    <fieldset>
                                        <h4 class="title-infor-account">Email</h4>
                                        <input type="email" placeholder="Nhập email"
                                            class="form-control text-white bg-dark" name="email"
                                            value="{{ old('email', $user->email) }}">
                                    </fieldset>
                                    <fieldset>
                                        <h4 class="title-infor-account">Ngày sinh</h4>
                                        <input type="date" class="form-control text-white bg-dark"
                                            placeholder="Ngày tháng năm sinh" name="ngay_sinh"
                                            value="{{ old('ngay_sinh', $user->ngay_sinh) }}">
                                    </fieldset>
                                    <fieldset>
                                        <h4 class="title-infor-account">Địa chỉ</h4>
                                        <input type="text" placeholder="Địa chỉ" name="dia_chi"
                                            value="{{ old('dia_chi', $user->dia_chi) }}"
                                            class="form-control text-white bg-dark">
                                    </fieldset>
                                    <fieldset class="mb-3">
                                        <h4 class="title-infor-account text-white mb-2">Giới tính</h4>
                                        <select class="form-select text-white bg-dark border-0 rounded-2 p-2"
                                            name="gioi_tinh">
                                            <option value="" class="text-white bg-dark" disabled selected>Chọn giới
                                                tính</option>
                                            <option value="Nam" {{ $user->gioi_tinh == 'Nam' ? 'selected' : '' }}
                                                class="text-white bg-dark">Nam</option>
                                            <option value="Nữ" {{ $user->gioi_tinh == 'Nữ' ? 'selected' : '' }}
                                                class="text-white bg-dark">Nữ</option>
                                            <option value="Khác" {{ $user->gioi_tinh == 'Khác' ? 'selected' : '' }}
                                                class="text-white bg-dark">Khác</option>
                                        </select>
                                    </fieldset>
                                    <fieldset>
                                        <h4 class="title-infor-account">Giá tiền</h4>
                                        <input type="text" placeholder="Giá" class="form-control text-white bg-dark"
                                            name="gia_tien" value="{{ old('gia_tien', $user->gia_tien) }}">

                                        @error('ten')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
                                        <h4 class="title-infor-account">Danh mục game</h4>
                                        <input type="hidden" name="danh_muc" id="selectedCategoriesInput">

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
                                <div class="info-social">
                                    <h4 class="title-create-item">Your Social media</h4>
                                    <fieldset>
                                        <h4 class="title-infor-account">Facebook</h4>
                                        <input type="text" placeholder="Facebook username"
                                            class="form-control text-white bg-dark">
                                        <a href="#" class="connect"><i class="fab fa-facebook"></i>Connect to face
                                            book</a>
                                    </fieldset>
                                    <fieldset>
                                        <h4 class="title-infor-account">Twitter</h4>
                                        <input type="text" placeholder="Twitter username"
                                            class="form-control text-white bg-dark">
                                        <a href="#" class="connect"><i class="fab fa-twitter"></i>Connect to
                                            Twitter</a>
                                    </fieldset>
                                    <fieldset>
                                        <h4 class="title-infor-account">Discord</h4>
                                        <input type="text" placeholder="Discord username"
                                            class="form-control text-white bg-dark">
                                        <a href="#" class="connect"><i class="icon-fl-vt"></i>Connect to
                                            Discord</a>
                                    </fieldset>
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
            const categoryList = document.getElementById('categoryList');
            const categoryButtons = document.querySelectorAll('.category-btn');

            let selectedCategories = @json($selectedCategories).map(
                String);

            function updateSelectedCategories() {
                selectedCategoriesInput.value = selectedCategories.join(',');
            }

            function restoreCategoryToList(categoryId, categoryName) {
                if (document.querySelector(`.category-btn[data-id="${categoryId}"]`)) {
                    return;
                }

                const categoryButton = document.createElement('div');
                categoryButton.classList.add('category-btn');
                categoryButton.setAttribute('data-id', categoryId);
                categoryButton.innerHTML = `
            <img src="" alt="" width="30" height="30"> <!-- Thêm đường dẫn ảnh nếu cần -->
            <span>${categoryName}</span>
        `;

                categoryButton.addEventListener('click', function() {
                    addCategory(categoryId, categoryName);
                    categoryButton.remove();
                });

                categoryList.appendChild(categoryButton);
            }

            function addCategory(categoryId, categoryName) {
                if (!selectedCategories.includes(categoryId)) {
                    selectedCategories.push(categoryId);

                    const tag = document.createElement('div');
                    tag.classList.add('selected-tag');
                    tag.setAttribute('data-id', categoryId);
                    tag.innerHTML = `
                <span>${categoryName}</span>
                <button type="button" class="remove-tag">&times;</button>
            `;

                    tag.querySelector('.remove-tag').addEventListener('click', function() {
                        removeCategory(categoryId, tag, categoryName);
                    });

                    selectedCategoriesContainer.appendChild(tag);

                    updateSelectedCategories();
                }
            }

            function removeCategory(categoryId, tag, categoryName) {
                selectedCategories = selectedCategories.filter(id => id !== categoryId);
                tag.remove();

                restoreCategoryToList(categoryId, categoryName);

                updateSelectedCategories();
            }

            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const categoryId = this.dataset.id;
                    const categoryName = this.querySelector('span').textContent.trim();

                    addCategory(categoryId, categoryName);
                    this.remove();
                });
            });

            selectedCategoriesContainer.addEventListener('click', function(event) {
                if (event.target && event.target.classList.contains('remove-tag')) {
                    const tag = event.target.closest('.selected-tag');
                    const categoryId = tag.getAttribute('data-id');
                    const categoryName = tag.querySelector('span').textContent.trim();
                    removeCategory(categoryId, tag, categoryName);
                }
            });

            updateSelectedCategories();
        });
    </script>
@endsection
