@extends('client.layouts.app')

@section('content')
    <section class="flat-title-page inner">
        <div class="overlay"></div>
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading mg-bt-12">
                        <h1 class="heading text-center">Liên hệ</h1>
                    </div>
                    <div class="breadcrumbs style2">
                        <ul>
                            <li><a href="{{route('client.index')}}">Trang chủ</a></li>
                            <li><a href="{{route('client.lienhe')}}">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tf-contact tf-section">
        <div class="themesflat-container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="box-feature-contact">
                        <img src="assets/images/blog/thumb-8.png" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <h2 class="tf-title-heading style-2 mg-bt-60">
                        Player Duo xin hân hạnh được hỗ trợ
                    </h2>
                    <div class="form-inner">
                        <form action="https://themesflat.co/html/axiesv/contact/contact-process2.php" method="post"
                            id="contactform" novalidate="novalidate" class="form-submit">
                            <input id="name" name="name" tabindex="1" value="" aria-required="true" required
                                type="text" placeholder="Họ và tên">
                            <input id="email" name="email" tabindex="2" value="" aria-required="true" required
                                type="email" placeholder="Email">
                            <input id="email" name="email" tabindex="2" value="" aria-required="true" required
                                   type="text" placeholder="Tiêu đề">
                            <textarea id="message" name="message" tabindex="3" aria-required="true" required placeholder="Nội dung"></textarea>
                            <button class="submit">Send message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
