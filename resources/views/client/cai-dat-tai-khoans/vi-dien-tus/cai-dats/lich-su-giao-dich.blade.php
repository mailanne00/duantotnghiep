@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Lịch sử giao dịch')

@section('content')
<div class="col-lg-9 col-12">

    <div class="aside">

        <div class=" tabs">

            <ul id="pills-tab1" role="tablist" class="nav nav-tabs">

                <li role="presentation"><a class="active" id="pills-home-tab1" data-bs-toggle="pill"
                        data-bs-target="#pills-home1" role="tab" aria-controls="pills-home1" aria-selected="true"
                        href="#">LỊCH SỬ CHUYỂN TIỀN</a></li>

                <li role="presentation" class=""><a id="pills-home-tab2" data-bs-toggle="pill"
                        data-bs-target="#pills-home2" role="tab" aria-controls="pills-home2" aria-selected="true"
                        href="#">LỊCH SỬ NHẬN TIỀN</a></li>

            </ul>

            <div class="tab-content">

                <div id="pills-home1" role="tabpanel" aria-labelledby="pills-home-tab1"
                    class="fade show tab-pane active in">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-condensed table-hover">

                            <thead>

                                <tr>

                                    <th>Thời gian</th>

                                    <th>Người nhận</th>

                                    <th>Đối tuợng</th>

                                    <th>Số tiền</th>

                                    <th>Nội dung</th>

                                </tr>

                            </thead>

                            <tbody></tbody>

                        </table>

                    </div>

                </div>

                <div id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab2" class="fade tab-pane">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-condensed table-hover">

                            <thead>

                                <tr>

                                    <th>Thời gian</th>

                                    <th>Người gửi</th>

                                    <th>Số tiền</th>

                                    <th>Nội dung</th>

                                    <th></th>

                                </tr>

                            </thead>

                            <tbody></tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        <div class="text-center mt-20 col-md-12"><span>Không có dữ liệu</span></div>

    </div>

</div>
@endsection