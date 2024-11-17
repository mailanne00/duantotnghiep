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
        <div class="themesflat-container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="sc-card-profile text-center">
                        <div class="card-media">
                            <img id="profileimg" src="assets/images/avatar/avata_profile.jpg" alt="Image">
                        </div>
                        <div id="upload-profile">
                            <a href="#" class="btn-upload">
                                Upload New Photo </a>
                            <input id="tf-upload-img" type="file" name="profile" required="">
                        </div>
                        <a href="#" class="btn-upload style2">
                            Delete</a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                    <div class="form-upload-profile">
                        <h4 class="title-create-item">Choice your Cover image</h4>
                        <div class="option-profile clearfix">
                            <form action="#">
                                <label class="uploadFile">
                                    <input type="file" class="inputfile form-control" name="file">
                                </label>
                            </form>
                            <div class="image">
                                <img src="assets/images/backgroup-secsion/option1_bg_profile.jpg" alt="">
                            </div>
                            <div class="image style2">
                                <img src="assets/images/backgroup-secsion/option2_bg_profile.jpg" alt="">
                            </div>
                        </div>

                        <form action="#" class="form-profile">
                            <div class="form-infor-profile">
                                <div class="info-account">
                                    <h4 class="title-create-item">Account info</h4>
                                    <fieldset>
                                        <h4 class="title-infor-account">Display name</h4>
                                        <input type="text" placeholder="Trista Francis" required>
                                    </fieldset>
                                    <fieldset>
                                        <h4 class="title-infor-account">Custom URL</h4>
                                        <input type="text" placeholder="Axies.Trista Francis.com/" required>
                                    </fieldset>
                                    <fieldset>
                                        <h4 class="title-infor-account">Email</h4>
                                        <input type="email" placeholder="Enter your email" required>
                                    </fieldset>
                                    <fieldset>
                                        <h4 class="title-infor-account">Bio</h4>
                                        <textarea tabindex="4" rows="5" required></textarea>
                                    </fieldset>
                                </div>
                                <div class="info-social">
                                    <h4 class="title-create-item">Your Social media</h4>
                                    <fieldset>
                                        <h4 class="title-infor-account">Facebook</h4>
                                        <input type="text" placeholder="Facebook username" required>
                                        <a href="#" class="connect"><i class="fab fa-facebook"></i>Connect to face
                                            book</a>
                                    </fieldset>
                                    <fieldset>
                                        <h4 class="title-infor-account">Twitter</h4>
                                        <input type="text" placeholder="Twitter username" required>
                                        <a href="#" class="connect"><i class="fab fa-twitter"></i>Connect to
                                            Twitter</a>
                                    </fieldset>
                                    <fieldset>
                                        <h4 class="title-infor-account">Discord</h4>
                                        <input type="text" placeholder="Discord username" required>
                                        <a href="#" class="connect"><i class="icon-fl-vt"></i>Connect to Discord</a>
                                    </fieldset>
                                </div>
                            </div>
                            <button class="tf-button-submit mg-t-15" type="submit">
                                Cập nhật thông tin
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
