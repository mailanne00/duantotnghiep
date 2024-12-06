@extends('admin.layout.app')
@section('script-header')
    <link rel="stylesheet" href="{{asset('assets-admin/css/pages/pages.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card email-card">
                <div class="card-body">
                    <div class="mail-body">
                        <div class="row">
                            <!-- [ email-left section ] start -->
                            <div class="col-xl-2 col-md-3">

                                <ul class="mb-2 nav nav-tab flex-column nav-pills">
                                    <li class="nav-item mail-section">
                                        <a class="nav-link text-start active"
                                           href="email_inbox.html">
                                            <span><i class="feather icon-inbox"></i>Index</span>
                                            <span class="float-end">6</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mail-section">
                                        <a class="nav-link text-start" href="email_inbox.html">
                                            <span><i class="feather icon-star-on"></i>Starred</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mail-section">
                                        <a class="nav-link text-start" href="email_inbox.html">
                                                                <span><i
                                                                        class="feather icon-file-text"></i>Drafts</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mail-section">
                                        <a class="nav-link text-start" href="email_inbox.html">
                                                                <span><i class="feather icon-navigation"></i>Sent
                                                                    Mail</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mail-section">
                                        <a class="nav-link text-start" href="email_inbox.html">
                                            <span><i class="feather icon-trash-2"></i>Trash</span>
                                        </a>
                                    </li>
                                </ul>
                                <a class="email-more-link" data-bs-toggle="collapse"
                                   href="#email-more-cont" role="button" aria-expanded="false"
                                   aria-controls="email-more-cont"><span><i
                                            class="feather icon-chevron-down me-2"></i>More</span><span
                                        style="display: none;"><i
                                            class="feather icon-chevron-up me-2"></i>Less</span></a>
                                <div class="collapse" id="email-more-cont">
                                    <ul class="nav nav-tab flex-column nav-pills">
                                        <li class="nav-item mail-section">
                                            <a class="nav-link text-start">
                                                                    <span><i class="feather icon-zap"></i>
                                                                        Important</span>
                                                <span class="float-end">6</span>
                                            </a>
                                        </li>
                                        <li class="nav-item mail-section">
                                            <a class="nav-link text-start">
                                                                    <span><i class="feather icon-message-circle"></i>
                                                                        Chats</span>
                                            </a>
                                        </li>
                                        <li class="nav-item mail-section">
                                            <a class="nav-link text-start">
                                                                    <span><i class="feather icon-alert-triangle"></i>
                                                                        Spam</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- [ email-left section ] end -->
                            <!-- [ email-right section ] start -->
                            <div class="col-xl-10 col-md-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Here You Have New Opportunity...</h5>
                                        <h6 class="float-end m-0">
                                            @if (\Carbon\Carbon::parse($lienHe->created_at)->diffInHours(\Carbon\Carbon::now()) < 24)
                                                {{ \Carbon\Carbon::parse($lienHe->created_at)->format('h:i A') }}
                                            @else
                                                {{ \Carbon\Carbon::parse($lienHe->created_at)->format('j M') }}
                                            @endif
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="email-read">
                                            <div class="photo-table m-r-10">
                                                <a href="#">
                                                    <img class="media-object img-radius"
                                                         src="{{\Illuminate\Support\Facades\Storage::url($lienHe->taiKhoan->anh_dai_dien)}}"
                                                         alt="E-mail user" style="width:50px;">
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <h6 class="user-name">{{$lienHe->ten}}</h6>
                                                </a>
                                                <a class="user-mail txt-muted" href="#">
                                                    <h6>From: {{$lienHe->email}}</h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="m-b-20 m-l-50 p-l-10 email-contant">
                                            <div class="photo-contant">
                                                <div>
                                                    <p class="email-content">
                                                        {{$lienHe->noi_dung}}
                                                    </p>
                                                </div>
                                                <div class="m-t-15">
                                                    <i
                                                        class="feather icon-paperclip f-20 m-r-10"></i>Attachments
                                                    <b>(3)</b>
                                                    <div class="row mail-img m-t-20">
                                                        <div class="col-sm-4 col-md-3 col-xl-2 m-b-20">
                                                            <a data-fslightbox="gallery"
                                                               href="assets/images/slider/img-slide-4.jpg">
                                                                <img class="img-fluid img-thumbnail" src="assets/images/slider/img-slide-4.jpg"
                                                                     alt="Card image">

                                                            </a>
                                                        </div>

                                                        <div class="col-sm-4 col-md-3 col-xl-2 m-b-20">
                                                            <a data-fslightbox="gallery"
                                                               href="assets/images/slider/img-slide-1.jpg">
                                                                <img class="img-fluid img-thumbnail" src="assets/images/slider/img-slide-1.jpg"
                                                                     alt="Card image">

                                                            </a>
                                                        </div>

                                                        <div class="col-sm-4 col-md-3 col-xl-2 m-b-20">
                                                            <a data-fslightbox="gallery"
                                                               href="assets/images/slider/img-slide-3.jpg">
                                                                <img class="img-fluid img-thumbnail" src="assets/images/slider/img-slide-3.jpg"
                                                                     alt="Card image">

                                                            </a>
                                                        </div>
                                                    </div>
                                                    <form class="form-material">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control"
                                                                   id="exampleInputEmail2"
                                                                   placeholder="Reply Your Thoughts"
                                                                   required="">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ email-right section ] start -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
