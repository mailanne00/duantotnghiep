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
                            <!-- [ inbox-left section ] start -->
                            <div class="col-xl-2 col-md-3">
                                <ul class="mb-2 nav nav-tab flex-column nav-pills" id="v-pills-tab"
                                    role="tablist" aria-orientation="vertical">
                                    <li class="nav-item mail-section">
                                        <a class="nav-link text-start active" id="v-pills-home-tab"
                                           data-bs-toggle="pill" href="#v-pills-home" role="tab"
                                           aria-controls="v-pills-home" aria-selected="false">
                                            <span><i class="feather icon-inbox"></i> Inbox</span>
                                            <span class="float-end">6</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mail-section">
                                        <a class="nav-link text-start" id="v-pills-starred-tab"
                                           data-bs-toggle="pill" href="#v-pills-starred"
                                           role="tab">
                                                                <span><i class="feather icon-star-on"></i>
                                                                    Starred</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mail-section">
                                        <a class="nav-link text-start" id="v-pills-messages-tab"
                                           data-bs-toggle="pill" href="#v-pills-draft" role="tab">
                                                                <span><i class="feather icon-file-text"></i>
                                                                    Drafts</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mail-section">
                                        <a class="nav-link text-start" id="v-pills-settings-tab"
                                           data-bs-toggle="pill" href="#v-pills-mail" role="tab">
                                                                <span><i class="feather icon-navigation"></i> Sent
                                                                    Mail</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mail-section">
                                        <a class="nav-link text-start" id="v-pills-Trash-tab"
                                           data-bs-toggle="pill" href="#v-pills-Trash" role="tab">
                                            <span><i class="feather icon-trash-2"></i> Trash</span>
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
                            <!-- [ inbox-left section ] end -->
                            <!-- [ inbox-right section ] start -->
                            <div class="col-xl-10 col-md-9 inbox-right">
                                <div class="tab-content p-0" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home"
                                         role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <div class="tab-content p-0" id="pills-tabContent">
                                            <div class="tab-pane fade show active"
                                                 id="pills-primary" role="tabpanel"
                                                 aria-labelledby="pills-primary-tab">
                                                <div class="mail-body-content table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                        @foreach($lienHes as $lienHe)
                                                            <tr class="unread">
                                                                <td>
                                                                    <div class="check-star">
                                                                        <div
                                                                            class="form-group d-inline">
                                                                            <div
                                                                                class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                                <input
                                                                                    type="checkbox"
                                                                                    name="checkbox-s-in-1"
                                                                                    id="checkbox-s-infill-1">
                                                                                <label
                                                                                    for="checkbox-s-infill-1"
                                                                                    class="cr"></label>
                                                                            </div>
                                                                        </div>
                                                                        <a href="#"><i
                                                                                class="feather icon-star ms-2"></i></a>
                                                                    </div>
                                                                </td>
                                                                <td><a href="{{route('admin.lien-he.show', $lienHe -> id)}}"
                                                                       class="email-name waves-effect">{{$lienHe->ten}}</a></td>
                                                                <td><a href="{{route('admin.lien-he.show', $lienHe -> id)}}"
                                                                       class="email-name waves-effect">{{$lienHe->noi_dung}}</a></td>
                                                                <td class="email-time">
                                                                    @if (\Carbon\Carbon::parse($lienHe->created_at)->diffInHours(\Carbon\Carbon::now()) < 24)
                                                                        {{ \Carbon\Carbon::parse($lienHe->created_at)->format('h:i A') }}
                                                                    @else
                                                                        {{ \Carbon\Carbon::parse($lienHe->created_at)->format('j M') }}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <tr class="unread">
                                                            <td>
                                                                <div class="check-star">
                                                                    <div
                                                                        class="form-group d-inline">
                                                                        <div
                                                                            class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                            <input
                                                                                type="checkbox"
                                                                                name="checkbox-s-in-1"
                                                                                id="checkbox-s-infill-1">
                                                                            <label
                                                                                for="checkbox-s-infill-1"
                                                                                class="cr"></label>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#"><i
                                                                            class="feather icon-star ms-2"></i></a>
                                                                </div>
                                                            </td>
                                                            <td><a href="#"
                                                                   class="email-name waves-effect">John
                                                                    Doe</a></td>
                                                            <td><a href="#"
                                                                   class="email-name waves-effect">Coming
                                                                    Up Next Week</a></td>
                                                            <td class="email-time">13:02 PM</td>
                                                        </tr>
                                                        <tr class="read">
                                                            <td>
                                                                <div class="check-star">
                                                                    <div
                                                                        class="form-group d-inline">
                                                                        <div
                                                                            class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                            <input
                                                                                type="checkbox"
                                                                                name="checkbox-s-in-5"
                                                                                id="checkbox-s-infill-5">
                                                                            <label
                                                                                for="checkbox-s-infill-5"
                                                                                class="cr"></label>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#"><i
                                                                            class="feather icon-star-on text-c-yellow ms-2"></i></a>
                                                                </div>
                                                            </td>
                                                            <td><a href="#"
                                                                   class="email-name waves-effect">Harry
                                                                    John</a></td>
                                                            <td><a href="#"
                                                                   class="email-name waves-effect">New
                                                                    upcoming data available</a>
                                                            </td>
                                                            <td class="email-time">11:01 AM</td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ inbox-right section ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
