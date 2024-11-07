@extends('admin.layouts.app')
@section('header')
<link rel="stylesheet" href="{{asset('assets/plugins/ratting/css/bars-1to10.css')}}">

@endsection
@section('content')

<div class="row custom-color">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Chi tiết player</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="card">
                            <div class="widget-profile-card-1">
                                <img class="img-fluid" src="{{ asset('assets/images/widget/slider7.jpg') }}"
                                    alt="card-style-1">
                                <div class="middle-user">
                                    <img class="img-fluid img-thumbnail"
                                        src="{{ Storage::url($player -> taiKhoan -> anh_dai_dien) }}" alt="Profile-user">
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h3>{{ $player -> taiKhoan -> ten }}</h3>
                                <p>{{ $player -> taiKhoan -> biet_danh }}</p>
                                <p>{{ $player -> trang_thai_player }}</p>
                            </div>
                            <div class="card-footer bg-inverse">
                                <div class="row text-center">
                                    <div class="col">
                                        <h4>{{ $player -> taiKhoan -> que_quan }}</h4>
                                        <span>Quê Quán</span>
                                    </div>
                                    <div class="col">
                                        <h4>20</h4>
                                        <span>Tuổi</span>
                                    </div>
                                    <div class="col">
                                        <h4>{{ $player -> taiKhoan -> gioi_tinh }}</h4>
                                        <span>Giới tính</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form method="GET" enctype="multipart/form-data">
                            <fieldset disabled>
                            <div class="mb-3">
                                <label class="form-label" for="">Ảnh</label>
                                <img src="{{ Storage::url($player -> anh) }}" alt="Ảnh" width="100">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">Email</label>
                                <input type="email" class="form-control" value="{{ $player -> taiKhoan -> email }}">
                            </div>
                            <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="">Số dư</label>
                                <input type="number" class="form-control" value="{{ $player -> taiKhoan -> so_du }}">
                            </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="">Giá tiền</label>
                                    <input type="number" class="form-control" value="{{ $player -> gia_tien }}">
                                </div>
                            <div class="row">
                                <div class="mb-3 col-md-5">
                                    <label class="form-label" for="">Ngày sinh</label>
                                    <input type="datetime" class="form-control" value="{{ $player -> taiKhoan -> ngay_sinh }}">
                                </div>
                                <div class="mb-3 col-md-5">
                                    <label class="form-label" for="">Số điện thoại</label>
                                    <input type="text" class="form-control" value="{{ $player -> taiKhoan -> sdt }}">
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="">Căn cước công dân</label>
                                    <input type="text" class="form-control" value="{{ $player -> taiKhoan -> cccd }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="">Số tài khoản</label>
                                    <input type="number" class="form-control" value="{{ $player -> so_tai_khoan }}">
                                </div>
                            </div>
                            
                            </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <fieldset disabled>
                    <label class="form-label">Thông tin</label>
                    <textarea class="form-control" rows="8">
                        {{ $player -> thong_tin }}
                    </textarea>
                    </fieldset>
                </div>
                <div class="row mt-3">
                    <div class="col-xl-3 col-md-6">
                        <div class="card prod-p-card bg-c-red">
                            <div class="card-body">
                                <div class="row align-items-center m-b-25">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Tổng doanh thu</h6>
                                        <h4 class="m-b-0 text-white">{{ number_format($tongDoanhThu, 0, ',', '.') }} VND</h4>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                                    </div>
                                </div>
                                <p class="m-b-0 text-white"><span
                                        class="label label-danger m-r-10">+11%</span>From Previous Month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card prod-p-card bg-c-blue">
                            <div class="card-body">
                                <div class="row align-items-center m-b-25">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Số lượng đơn thuê</h6>
                                        <h4 class="m-b-0 text-white">{{ $soDonThue }}</h4>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-shopping-cart text-c-blue f-18 analytic-icon"></i>
                                    </div>
                                </div>
                                <p class="m-b-0 text-white"><span
                                        class="label label-primary m-r-10">+12%</span>From Previous Month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card prod-p-card bg-c-green">
                            <div class="card-body">
                                <div class="row align-items-center m-b-25">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Số giờ được thuê</h6>
                                        <h4 class="m-b-0 text-white">{{ $tongGioThue }}</h4>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clock text-c-green f-18"></i>
                                    </div>
                                </div>
                                <p class="m-b-0 text-white"><span
                                        class="label label-success m-r-10">+52%</span>From Previous Month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card prod-p-card bg-c-yellow">
                            <div class="card-body">
                                <div class="row align-items-center m-b-25">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Số người theo dõi</h6>
                                        <h4 class="m-b-0 text-white">{{ $soNguoiTheoDoi  }}</h4>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user text-c-yellow f-18"></i>
                                    </div>
                                </div>
                                <p class="m-b-0 text-white"><span
                                        class="label label-warning m-r-10">+52%</span>From Previous Month</p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xl-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-auto">
                                                <h6>Page view by device</h6>
                                            </div>
                                            <div class="col">
                                                <div class="dropdown float-end">
                                                    <a class="dropdown-toggle text-c-blue" href="#"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">Last 30 days</a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">1 week</a>
                                                        <a class="dropdown-item" href="#">2 year</a>
                                                        <a class="dropdown-item" href="#">3 month</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 p-r-0">
                                                <h6 class="my-3"><i class="feather icon-monitor f-20 me-2"
                                                        style="color:#dc67ce"></i><span
                                                        class="text-c-green ms-2 f-14"><i
                                                            class="feather icon-arrow-up"></i>2%</span></h6>
                                                <h6 class="my-3"><i class="feather icon-tablet f-20 me-2"
                                                        style="color:#8067dc"></i>29.7%<span
                                                        class="text-c-red ms-2 f-14"><i
                                                            class="feather icon-arrow-down"></i>3%</span></h6>
                                                <h6 class="my-3"><i class="feather icon-smartphone f-20 me-2"
                                                        style="color:#67b7dc"></i>Doanh thu trung bình<span
                                                        class="text-c-green ms-2 f-14"><i
                                                            class="feather icon-arrow-up"></i>8%</span></h6>
                                            </div>
                                            <div class="col-6">
                                                <div id="chart-percent" class="chart-percent" style="height:135px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="col-xl-12">
                                <div class="card table-card">
                                    <div class="card-header">
                                        <h5>Biểu đồ doanh thu</h5>
                                    </div>
                                    <div class="card-body px-0 py-0">
                                        <div id="traffic-chart" style="height:400px;"></div>
                                        <div class="table-responsive">
                                            <div class="session-scroll" style="height:380px;position:relative;">
                                                <table class="table table-hover m-b-0">
                                                    <thead>
                                                        <tr>
                                                            <th><span>Campaign date</span></th>
                                                            <th><span>Click <a class="help" data-bs-toggle="popover"
                                                                        title="Popover title"
                                                                        data-bs-content="And here's some amazing content. It's very engaging. Right?"><i
                                                                            class="feather icon-help-circle f-16"></i></a></span>
                                                            </th>
                                                            <th><span>Cost <a class="help" data-bs-toggle="popover"
                                                                        title="Popover title"
                                                                        data-bs-content="And here's some amazing content. It's very engaging. Right?"><i
                                                                            class="feather icon-help-circle f-16"></i></a></span>
                                                            </th>
                                                            <th><span>CTR <a class="help" data-bs-toggle="popover"
                                                                        title="Popover title"
                                                                        data-bs-content="And here's some amazing content. It's very engaging. Right?"><i
                                                                            class="feather icon-help-circle f-16"></i></a></span>
                                                            </th>
                                                            <th><span>ARPU <a class="help" data-bs-toggle="popover"
                                                                        title="Popover title"
                                                                        data-bs-content="And here's some amazing content. It's very engaging. Right?"><i
                                                                            class="feather icon-help-circle f-16"></i></a></span>
                                                            </th>
                                                            <th><span>ECPI <a class="help" data-bs-toggle="popover"
                                                                        title="Popover title"
                                                                        data-bs-content="And here's some amazing content. It's very engaging. Right?"><i
                                                                            class="feather icon-help-circle f-16"></i></a></span>
                                                            </th>
                                                            <th><span>ROI <a class="help" data-bs-toggle="popover"
                                                                        title="Popover title"
                                                                        data-bs-content="And here's some amazing content. It's very engaging. Right?"><i
                                                                            class="feather icon-help-circle f-16"></i></a></span>
                                                            </th>
                                                            <th><span>Revenue <a class="help" data-bs-toggle="popover"
                                                                        title="Popover title"
                                                                        data-bs-content="And here's some amazing content. It's very engaging. Right?"><i
                                                                            class="feather icon-help-circle f-16"></i></a></span>
                                                            </th>
                                                            <th><span>Conversions <a class="help"
                                                                        data-bs-toggle="popover" title="Popover title"
                                                                        data-bs-content="And here's some amazing content. It's very engaging. Right?"><i
                                                                            class="feather icon-help-circle f-16"></i></a></span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Total and average</td>
                                                            <td>1300</td>
                                                            <td>1025</td>
                                                            <td>14005</td>
                                                            <td>95,3%</td>
                                                            <td>29,7%</td>
                                                            <td>3,25</td>
                                                            <td>2:30</td>
                                                            <td>45.5%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>8-11-2016</td>
                                                            <td>786</td>
                                                            <td>485</td>
                                                            <td>769</td>
                                                            <td>45,3%</td>
                                                            <td>6,7%</td>
                                                            <td>8,56</td>
                                                            <td>10:55</td>
                                                            <td>33.8%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>15-10-2016</td>
                                                            <td>786</td>
                                                            <td>523</td>
                                                            <td>736</td>
                                                            <td>78,3%</td>
                                                            <td>6,6%</td>
                                                            <td>7,56</td>
                                                            <td>4:30</td>
                                                            <td>76.8%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>8-8-2017</td>
                                                            <td>624</td>
                                                            <td>436</td>
                                                            <td>756</td>
                                                            <td>78,3%</td>
                                                            <td>6,4%</td>
                                                            <td>9,45</td>
                                                            <td>9:05</td>
                                                            <td>8.63%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>11-12-2017</td>
                                                            <td>423</td>
                                                            <td>123</td>
                                                            <td>756</td>
                                                            <td>78,6%</td>
                                                            <td>45,6%</td>
                                                            <td>6,85</td>
                                                            <td>7:45</td>
                                                            <td>33.8%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>1-6-2015</td>
                                                            <td>465</td>
                                                            <td>463</td>
                                                            <td>456</td>
                                                            <td>68,6%</td>
                                                            <td>76,6%</td>
                                                            <td>7,56</td>
                                                            <td>8:45</td>
                                                            <td>39.8%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>8-11-2016</td>
                                                            <td>786</td>
                                                            <td>485</td>
                                                            <td>769</td>
                                                            <td>45,3%</td>
                                                            <td>6,7%</td>
                                                            <td>8,56</td>
                                                            <td>10:55</td>
                                                            <td>33.8%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>15-10-2016</td>
                                                            <td>786</td>
                                                            <td>523</td>
                                                            <td>736</td>
                                                            <td>78,3%</td>
                                                            <td>6,6%</td>
                                                            <td>7,56</td>
                                                            <td>4:30</td>
                                                            <td>76.8%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>8-8-2017</td>
                                                            <td>624</td>
                                                            <td>436</td>
                                                            <td>756</td>
                                                            <td>78,3%</td>
                                                            <td>6,4%</td>
                                                            <td>9,45</td>
                                                            <td>9:05</td>
                                                            <td>8.63%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>11-12-2017</td>
                                                            <td>423</td>
                                                            <td>123</td>
                                                            <td>756</td>
                                                            <td>78,6%</td>
                                                            <td>45,6%</td>
                                                            <td>6,85</td>
                                                            <td>7:45</td>
                                                            <td>33.8%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>1-6-2015</td>
                                                            <td>465</td>
                                                            <td>463</td>
                                                            <td>456</td>
                                                            <td>68,6%</td>
                                                            <td>76,6%</td>
                                                            <td>7,56</td>
                                                            <td>8:45</td>
                                                            <td>39.8%</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                <a href="{{ route('admin.players.index') }}"><button type="" class="btn btn-primary mb-4 mt-3 text-center">Trở về</button></a>
            </div>
        </div>
    </div>
    
</div>

@endsection

@section('script')

<!-- am chart js -->
<script src="{{asset('assets/plugins/chart-am4/js/core.js')}}"></script>
<script src="{{asset('assets/plugins/chart-am4/js/charts.js')}}"></script>
<script src="{{asset('assets/plugins/chart-am4/js/animated.js')}}"></script>
<script src="{{asset('assets/plugins/chart-am4/js/maps.js')}}"></script>
<script src="{{asset('assets/plugins/chart-am4/js/worldLow.js')}}"></script>
<script src="{{asset('assets/plugins/chart-am4/js/continentsLow.js')}}"></script>

<!-- custom-chart js -->
<script src="{{asset('assets/js/pages/chart.js')}}"></script>
@endsection