@extends('admin.layouts.app')
@section('header')
    <link rel="stylesheet" href="{{ asset('assets/plugins/ratting/css/bars-1to10.css') }}">
@endsection
@section('content')
<<<<<<< HEAD
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
                                            src="{{ Storage::url($player->taiKhoan->anh_dai_dien) }}" alt="Profile-user">
=======

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
                                        <h4>{{$player->taiKhoan->que_quan}}</h4>
                                        <span>Quê Quán</span>
                                    </div>
                                    <div class="col">
                                        <h4>@php
                                            $tuoi = \Carbon\Carbon::parse($player->taiKhoan->ngay_sinh)->age;
                                            @endphp
                                            {{$tuoi}}
                                        </h4>
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
                                <div class="row">
                                    <div class="col mb-3">
                                        <label class="form-label" for="">Email</label>
                                        <input type="email" class="form-control" value="{{ $player -> taiKhoan -> email }}">
                                    </div>
                                    <div class="col mb-3">
                                        <label class="form-label" for="">Số dư</label>
                                        <input type="text" class="form-control" value="{!! $player -> taiKhoan -> so_du == null ? "0" : number_format($player -> taiKhoan -> so_du, 0, ',', '.' ) !!} VNĐ">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label class="form-label" for="">Giá tiền</label>
                                        <input type="number" class="form-control" value="{{ $player -> gia_tien }}">
                                    </div>
                                    <div class="col mb-3">
                                        <label class="form-label" for="">Số điện thoại</label>
                                        <input type="text" class="form-control" value="{{ $player -> taiKhoan -> sdt }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label class="form-label" for="">Ngày sinh</label>
                                        <input type="datetime" class="form-control" value="{{ $player -> taiKhoan -> ngay_sinh }}">
                                    </div>
                                    <div class="col mb-3">
                                        <label class="form-label" for="">Số tài khoản</label>
                                        <input type="number" class="form-control" value="{{ $player -> so_tai_khoan }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="">Căn cước công dân</label>
                                        <img src="{{Storage::url($player -> taiKhoan -> cccd)}}" alt="" width="100px">
                                    </div>
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
        <!-- <div class="row mt-3">
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
>>>>>>> 5afc1b509a6547a168f575aff41bb0ef4107761f
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <h3>{{ $player->taiKhoan->ten }}</h3>
                                    <p>{{ $player->taiKhoan->biet_danh }}</p>
                                    <p>{{ $player->trang_thai_player }}</p>
                                </div>
                                <div class="card-footer bg-inverse">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h4>400</h4>
                                            <span>Quê Quán</span>
                                        </div>
                                        <div class="col">
                                            <h4>90</h4>
                                            <span>Tuổi</span>
                                        </div>
                                        <div class="col">
                                            <h4>{{ $player->taiKhoan->gioi_tinh }}</h4>
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
                                        <img src="{{ Storage::url($player->anh) }}" alt="Ảnh" width="100">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">Email</label>
                                        <input type="email" class="form-control" value="{{ $player->taiKhoan->email }}">
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="">Số dư</label>
                                            <input type="number" class="form-control"
                                                value="{{ $player->taiKhoan->so_du }}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="">Giá tiền</label>
                                            <input type="number" class="form-control" value="{{ $player->gia_tien }}">
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-5">
                                                <label class="form-label" for="">Ngày sinh</label>
                                                <input type="datetime" class="form-control"
                                                    value="{{ $player->taiKhoan->ngay_sinh }}">
                                            </div>
                                            <div class="mb-3 col-md-5">
                                                <label class="form-label" for="">Số điện thoại</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $player->taiKhoan->sdt }}">
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="">Căn cước công dân</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $player->taiKhoan->cccd }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="">Số tài khoản</label>
                                                <input type="number" class="form-control"
                                                    value="{{ $player->so_tai_khoan }}">
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
                        {{ $player->thong_tin }}
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
                                            <h4 class="m-b-0 text-white">{{ number_format($tongDoanhThu, 0, ',', '.') }}
                                                VND</h4>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                                        </div>
                                    </div>
                                    <p class="m-b-0 text-white"><span class="label label-danger m-r-10">+11%</span>From
                                        Previous Month</p>
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
                                    <p class="m-b-0 text-white"><span class="label label-primary m-r-10">+12%</span>From
                                        Previous Month</p>
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
                                    <p class="m-b-0 text-white"><span class="label label-success m-r-10">+52%</span>From
                                        Previous Month</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card bg-c-yellow">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-25">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Số người theo dõi</h6>
                                            <h4 class="m-b-0 text-white">{{ $soNguoiTheoDoi }}</h4>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user text-c-yellow f-18"></i>
                                        </div>
                                    </div>
                                    <p class="m-b-0 text-white"><span class="label label-warning m-r-10">+52%</span>From
                                        Previous Month</p>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Thống kê số giờ được thuê theo tháng</h5>
                            </div>

                            <div class="col-md-12">
                                <div class="card seo-card">
                                    <div class="card-body seo-statustic">
                                        <i class="fas fa-chart-line text-c-green f-16 mb-2"></i>
                                        <h5 class="m-0">Thống kê người thuê 1 ngày</h5>
                                        <p class="m-0">Số giờ được thuê theo giờ</p>
                                    </div>
                                    <div class="process">
                                        <canvas id="chartHours" height="100"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card seo-card">
                                    <div class="card-body seo-statustic">
                                        <i class="fas fa-chart-line text-c-green f-16 mb-2"></i>
                                        <h5 class="m-0">Thống kê số giờ được thuê theo ngày</h5>
                                        <p class="m-0">Số giờ được thuê theo ngày</p>
                                    </div>
                                    <div class="process">
                                        <canvas id="processChart" height="100"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card seo-card">
                                    <div class="card-body seo-statustic">
                                        <i class="fas fa-database text-c-green f-16 mb-2"></i>
                                        <h5 class="m-0">Thống kê tổng số tiền theo ngày</h5>
                                        <p class="m-0">Tổng số tiền theo ngày</p>
                                    </div>
                                    <div class="process">
                                        <canvas id="processChartTongTien" height="100"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="d-flex flex-row">
                        <div class="col-xl-12">
                            <div class="container">
                                <h3 class="text-left mb-4 ">Đánh giá player</h3>

                                <div class="row">
                                    @foreach ($binhLuans->groupBy('player_id') as $playerId => $binhLuansForPlayer)
                                        <div class="col-md-4 mb-4">
                                            <div class="player-rating border rounded shadow-sm bg-light p-3">

                                                <!-- Phần Tỷ Lệ Đánh Giá -->
                                                <div class="average-rating mb-2">
                                                    <h5 class="font-weight-bold">Tỷ lệ đánh giá</h5>
                                                    <div class="star-rating">
                                                        @php
                                                            // Tính tổng số đánh giá và số sao
                                                            $totalReviews = $binhLuansForPlayer->count();
                                                            $starCounts = [
                                                                1 => $binhLuansForPlayer->where('danh_gia', 1)->count(),
                                                                2 => $binhLuansForPlayer->where('danh_gia', 2)->count(),
                                                                3 => $binhLuansForPlayer->where('danh_gia', 3)->count(),
                                                                4 => $binhLuansForPlayer->where('danh_gia', 4)->count(),
                                                                5 => $binhLuansForPlayer->where('danh_gia', 5)->count(),
                                                            ];
                                                        @endphp

                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <div class="star-count">
                                                                <div class="star-label">{{ $i }} <span
                                                                        class="star filled">★</span>:</div>
                                                                <div class="bar">
                                                                    <div class="percentage-bar"
                                                                        style="width: {{ $totalReviews > 0 ? ($starCounts[$i] / $totalReviews) * 100 : 0 }}%;">
                                                                    </div>
                                                                </div>
                                                                <div class="percentage">
                                                                    {{ $totalReviews > 0 ? number_format(($starCounts[$i] / $totalReviews) * 100, 1) : 0 }}%
                                                                </div>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            <div class="comments-section mt-4 bg-light p-3">
                                <h5 class="font-weight-bold">Bình luận ({{ $binhLuans->count() }})</h5>

                                <!-- Lọc theo số sao -->
                                <div class="filter-rating mb-3">
                                    <label for="filter-stars" class="mr-2">Lọc theo số sao:</label>
                                    <select id="filter-stars" class="form-control" onchange="filterComments(this.value)">
                                        <option value="">Tất cả</option>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}">{{ $i }} sao</option>
                                        @endfor
                                    </select>
                                </div>

                                @foreach ($binhLuans as $binhLuan)
                                    <div class="comment-item p-3 mb-3 border rounded comment"
                                        data-rating="{{ $binhLuan->danh_gia }}">
                                        <div class="comment-header d-flex justify-content-between">
                                            <span
                                                class="comment-author font-weight-bold">{{ $binhLuan->taiKhoan->ten }}</span>
                                            <span
                                                class="timestamp">{{ $binhLuan->created_at ? $binhLuan->created_at->format('d/m/Y H:i:s') : 'Chưa có thời gian' }}</span>
                                        </div>
                                        <div class="rating-stars mb-2">
                                            @for ($j = 1; $j <= 5; $j++)
                                                <span
                                                    class="star {{ $j <= $binhLuan->danh_gia ? 'filled' : '' }}">★</span>
                                            @endfor
                                        </div>
                                        <p class="comment-content mt-2">{{ $binhLuan->noi_dung }}</p>
                                    </div>
                                @endforeach

                                <div class="pagination-wrapper">
                                    {{ $binhLuans->links() }}
                                </div>
                            </div>

                        </div>
                        {{-- Biểu đồ --}}

                        <a href="{{ route('admin.players.index') }}"><button type=""
                                class="btn btn-primary mb-4 mt-3 text-center">Trở về</button></a>
                    </div>
                </div>
<<<<<<< HEAD
            </div>

        </div>
    @endsection
=======
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
>>>>>>> 5afc1b509a6547a168f575aff41bb0ef4107761f

    @section('script')
        <!-- am chart js -->
        <script src="{{ asset('assets/plugins/chart-am4/js/core.js') }}"></script>
        <script src="{{ asset('assets/plugins/chart-am4/js/charts.js') }}"></script>
        <script src="{{ asset('assets/plugins/chart-am4/js/animated.js') }}"></script>
        <script src="{{ asset('assets/plugins/chart-am4/js/maps.js') }}"></script>
        <script src="{{ asset('assets/plugins/chart-am4/js/worldLow.js') }}"></script>
        <script src="{{ asset('assets/plugins/chart-am4/js/continentsLow.js') }}"></script>

        <!-- custom-chart js -->
        <script src="{{ asset('assets/js/pages/chart.js') }}"></script>
        @stack('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            window.onload = function() {
                const labels = @json($labels);
                const dataPoints = @json($data);

                const ctx = document.getElementById('processChart').getContext('2d');
                const lineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Số giờ thuê',
                            data: dataPoints,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                            }
                        },
                        scales: {
                            x: {
                                beginAtZero: true
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

<<<<<<< HEAD
                // Initialize second chart
                const labelsTongTien = @json($labelsTongTien);
                const dataTongTien = @json($dataTongTien);

                const ctxTongTien = document.getElementById('processChartTongTien').getContext('2d');
                const lineChartTongTien = new Chart(ctxTongTien, {
                    type: 'line',
                    data: {
                        labels: labelsTongTien,
                        datasets: [{
                            label: 'Tổng số tiền',
                            data: dataTongTien,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                            }
                        },
                        scales: {
                            x: {
                                beginAtZero: true
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });


                const chartDataDay = @json($chartDataDay);
                const labelsHours = chartDataDay.map(item => `${item.hour}:00`);
                const dataHours = chartDataDay.map(item => item.total_hour);
                const renterNames = chartDataDay.map(item => item.renter_names.join(', ') || 'Không có người thuê');

                const ctxHours = document.getElementById('chartHours').getContext('2d');
                new Chart(ctxHours, {
                    type: 'bar',
                    data: {
                        labels: labelsHours,
                        datasets: [{
                            label: 'Tổng Giờ Thuê',
                            data: dataHours,
                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            fill: true,
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    title: function(tooltipItems) {
                                        return tooltipItems[0].label; // Giữ nguyên label (giờ)
                                    },
                                    label: function(tooltipItem) {
                                        return `Tên người thuê: ${renterNames[tooltipItem.dataIndex]}`; // Hiển thị tên người thuê
                                    }
                                }
                            }
                        }
                    }
                });


            };
        </script>


        <script>
            // [ traffic-chart ] start
            $(function() {
                // Themes begin
                am4core.useTheme(am4themes_animated);
                // Themes end
                var chart = am4core.create("traffic-chart", am4charts.XYChart);
                chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                chart.data = [{
                    "date": "2018-01-04",
                    "steps": 4878
                }];

                chart.dateFormatter.inputDateFormat = "YYYY-MM-dd";
                chart.zoomOutButton.disabled = true;

                var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                dateAxis.renderer.grid.template.strokeOpacity = 0;
                dateAxis.renderer.minGridDistance = 10;
                dateAxis.dateFormats.setKey("day", "d");
                dateAxis.tooltip.hiddenState.properties.opacity = 1;
                dateAxis.tooltip.hiddenState.properties.visible = true;

                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                valueAxis.renderer.inside = true;
                valueAxis.renderer.labels.template.fillOpacity = 0.3;
                valueAxis.renderer.grid.template.strokeOpacity = 0;
                valueAxis.min = 0;

                // goal guides
                var axisRange = valueAxis.axisRanges.create();
                axisRange.value = 6000;
                axisRange.grid.strokeOpacity = 0.1;
                axisRange.label.text = "Session";
                axisRange.label.align = "right";
                axisRange.label.verticalCenter = "bottom";
                axisRange.label.fillOpacity = 0.8;

                valueAxis.renderer.gridContainer.zIndex = 1;

                var axisRange2 = valueAxis.axisRanges.create();
                axisRange2.value = 12000;
                axisRange2.grid.strokeOpacity = 0.1;
                axisRange2.label.text = "2x Session";
                axisRange2.label.align = "right";
                axisRange2.label.verticalCenter = "bottom";
                axisRange2.label.fillOpacity = 0.8;

                var series = chart.series.push(new am4charts.ColumnSeries);
                series.dataFields.valueY = "steps";
                series.dataFields.dateX = "date";
                series.tooltipText = "{valueY.value}";

                var columnTemplate = series.columns.template;
                columnTemplate.width = am4core.percent(50);
                columnTemplate.strokeOpacity = 0;


                var gradient = new am4core.LinearGradient();
                gradient.addColor(am4core.color("#19BCBF"), 1);
                gradient.addColor(am4core.color("#149698"), 1);
                gradient.rotation = -45;

                var gradient1 = new am4core.LinearGradient();
                gradient1.addColor(am4core.color("#13bd8a"), 1);
                gradient1.addColor(am4core.color("#30a262"), 1);
                gradient1.rotation = -45;


                columnTemplate.adapter.add("fill", function(fill, target) {
                    var dataItem = target.dataItem;
                    if (dataItem.valueY > 6000) {
                        return gradient;
                    } else {
                        return gradient1;
                    }
                })

                var cursor = new am4charts.XYCursor();
                cursor.behavior = "panX";
                chart.cursor = cursor;

                chart.events.on("datavalidated", function() {
                    dateAxis.zoomToDates(new Date(2018, 0, 11), new Date(2018, 1, 1), false, true);
                });

                chart.scrollbarX = new am4core.Scrollbar();
                chart.scrollbarX.parent = chart.bottomAxesContainer;
            });
            // [ traffic-chart ] end
        </script>
        <style>
            .comments-section {
                background-color: #f9f9f9;
                border-radius: 8px;
                padding: 20px;
            }

            .comment-item {
                background-color: #fff;
                border: 1px solid #e0e0e0;
                border-radius: 8px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            }

            .comment-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .comment-author {
                font-size: 16px;
                color: #333;
            }

            .rating-stars {
                font-size: 18px;
                color: #ffd700;
                /* Màu vàng cho sao */
            }

            .star {
                color: #ddd;
            }

            .star.filled {
                color: #ffd700;
            }

            .timestamp {
                font-size: 12px;
                color: #888;
            }

            .comment-content {
                margin: 10px 0;
                font-size: 14px;
                color: #333;
            }

            .pagination-wrapper {
                margin-top: 15px;
            }

            .average-rating {
                text-align: left;
            }

            .star-rating {
                display: flex;
                flex-direction: column;
            }

            .star-count {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 10px;
            }

            .bar {
                background-color: #e0e0e0;
                border-radius: 5px;
                height: 20px;
                flex: 1;
                margin: 0 10px;
                position: relative;
            }

            .percentage-bar {
                background-color: #28a745;
                height: 100%;
                border-radius: 5px;
                position: absolute;
                top: 0;
                left: 0;
            }

            .player-rating {
                background-color: #f9f9f9;
                padding: 20px;
                margin-bottom: 20px;
            }
        </style>

        <script>
            function filterComments(stars) {
                const comments = document.querySelectorAll('.comment-item');
                comments.forEach(comment => {
                    const rating = comment.getAttribute('data-rating');
                    if (stars === "" || rating == stars) {
                        comment.style.display = "block";
                    } else {
                        comment.style.display = "none";
                    }
                });
            }
        </script>
    @endsection
=======
<!-- custom-chart js -->
<script src="{{asset('assets/js/pages/chart.js')}}"></script>
<script>
    // [ traffic-chart ] start
    $(function() {
        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end
        var chart = am4core.create("traffic-chart", am4charts.XYChart);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart.data = [{
            "date": "2018-01-04",
            "steps": 4878
        }];

        chart.dateFormatter.inputDateFormat = "YYYY-MM-dd";
        chart.zoomOutButton.disabled = true;

        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
        dateAxis.renderer.grid.template.strokeOpacity = 0;
        dateAxis.renderer.minGridDistance = 10;
        dateAxis.dateFormats.setKey("day", "d");
        dateAxis.tooltip.hiddenState.properties.opacity = 1;
        dateAxis.tooltip.hiddenState.properties.visible = true;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.inside = true;
        valueAxis.renderer.labels.template.fillOpacity = 0.3;
        valueAxis.renderer.grid.template.strokeOpacity = 0;
        valueAxis.min = 0;

        // goal guides
        var axisRange = valueAxis.axisRanges.create();
        axisRange.value = 6000;
        axisRange.grid.strokeOpacity = 0.1;
        axisRange.label.text = "Session";
        axisRange.label.align = "right";
        axisRange.label.verticalCenter = "bottom";
        axisRange.label.fillOpacity = 0.8;

        valueAxis.renderer.gridContainer.zIndex = 1;

        var axisRange2 = valueAxis.axisRanges.create();
        axisRange2.value = 12000;
        axisRange2.grid.strokeOpacity = 0.1;
        axisRange2.label.text = "2x Session";
        axisRange2.label.align = "right";
        axisRange2.label.verticalCenter = "bottom";
        axisRange2.label.fillOpacity = 0.8;

        var series = chart.series.push(new am4charts.ColumnSeries);
        series.dataFields.valueY = "steps";
        series.dataFields.dateX = "date";
        series.tooltipText = "{valueY.value}";

        var columnTemplate = series.columns.template;
        columnTemplate.width = am4core.percent(50);
        columnTemplate.strokeOpacity = 0;


        var gradient = new am4core.LinearGradient();
        gradient.addColor(am4core.color("#19BCBF"), 1);
        gradient.addColor(am4core.color("#149698"), 1);
        gradient.rotation = -45;

        var gradient1 = new am4core.LinearGradient();
        gradient1.addColor(am4core.color("#13bd8a"), 1);
        gradient1.addColor(am4core.color("#30a262"), 1);
        gradient1.rotation = -45;


        columnTemplate.adapter.add("fill", function(fill, target) {
            var dataItem = target.dataItem;
            if (dataItem.valueY > 6000) {
                return gradient;
            } else {
                return gradient1;
            }
        })

        var cursor = new am4charts.XYCursor();
        cursor.behavior = "panX";
        chart.cursor = cursor;

        chart.events.on("datavalidated", function() {
            dateAxis.zoomToDates(new Date(2018, 0, 11), new Date(2018, 1, 1), false, true);
        });

        chart.scrollbarX = new am4core.Scrollbar();
        chart.scrollbarX.parent = chart.bottomAxesContainer;
    });
    // [ traffic-chart ] end
</script>
@endsection
>>>>>>> 5afc1b509a6547a168f575aff41bb0ef4107761f
