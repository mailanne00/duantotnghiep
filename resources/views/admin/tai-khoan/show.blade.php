@extends('admin.layout.app')

@section('title', 'Chi tiết tài khoản')

@section('script-header')
<link rel="stylesheet" href="{{asset('assets-admin/plugins/ratting/css/bars-1to10.css')}}">
<style>
    /* Nút mặc định */
    .custom-btn {
        color: white;
        /* Chữ màu trắng */
        background-color: transparent;
        /* Nền trong suốt */
        border: 1px solid white;
        /* Viền màu trắng */
        transition: background-color 0.3s ease, border-color 0.3s ease;
        /* Hiệu ứng mượt */
    }

    /* Khi nút được chọn */
    .custom-btn.active {
        border-color: #F0564A;
        /* Viền màu #F0564A */
        background-color: transparent;
        /* Nền trong suốt */
        color: white;
        /* Chữ màu trắng */
    }

    /* Hiệu ứng hover */
    .custom-btn:hover {
        background-color: #F0564A;
        /* Nền màu #F0564A */
        border-color: #F0564A;
        /* Viền màu #F0564A */
        color: white;
        /* Chữ màu trắng */
    }
</style>
@endsection

@section('content')

<a href="{{route('admin.tai-khoans.index')}}" class="btn btn-primary mb-3">Quay trở lại</a>
<div class="row mb-n4">
    <div class="col-xl-6 col-md-6">
        <div class="card user-card user-card-1">
            <div class="card-header border-0 p-2 pb-0">
                <div class="cover-img-block">
                    <img src="{{asset('assets-admin/images/widget/slider5.jpg')}}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="user-about-block text-center">
                    <div class="row align-items-end">
                        <div class="col"></div>
                        <div class="col"><img class="img-radius img-fluid wid-80"
                                src="{{\Illuminate\Support\Facades\Storage::url($taiKhoan->anh_dai_dien)}}"
                                alt="User image"></div>
                        <div class="col"></div>
                    </div>
                </div>
                <div class="text-center">
                    <h6 class="mb-1 mt-3">{{$taiKhoan->ten}}</h6>
                    <span class="badge text-bg-{{$taiKhoan->mau}} mt-2 mb-2">{{$taiKhoan->trangThai2}}</span>
                </div>
                <div class="bg-c-blue counter-block m-t-10 p-20 rounded">
                    <div class="row">
                        <div class="col-4 text-center">
                            <i class="fas fa-calendar-check text-white f-20" data-bs-toggle="tooltip"
                                data-bs-placement="top" data-bs-title="Số đơn hoàn thành"></i>
                            <h6 class="text-white mt-2 mb-0">
                                {{ isset($taiKhoan->rent['1']) ? $taiKhoan->rent['1'] : 0 }}</h6>
                        </div>
                        <div class="col-4 text-center">
                            <i class="fas fa-user text-white f-20" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="Số người đánh giá"></i>
                            <h6 class="text-white mt-2 mb-0">{{$taiKhoan->count}}</h6>
                        </div>
                        <div class="col-4 text-center">
                            <i class="fas fa-clock text-white f-20" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="Số giờ được thuê"></i>
                            <h6 class="text-white mt-2 mb-0">189</h6>
                        </div>
                    </div>
                </div>
                @if($taiKhoan->biet_danh != null)
                    <div class="col mt-3">
                        <div class="row">
                            <div class="col-4">
                                <h6 style=" margin-left: 30px">Biệt danh</h6>
                            </div>
                            <div class="col">
                                <p>{{$taiKhoan->biet_danh}}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col mt-3">
                    <div class="row">
                        <div class="col-4">
                            <h6 style=" margin-left: 30px">Email</h6>
                        </div>
                        <div class="col">
                            <p>{{$taiKhoan->email}}</p>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="row">
                        <div class="col-4">
                            <h6 style=" margin-left: 30px">Giới tính</h6>
                        </div>
                        <div class="col">
                            <p><img style="width: 30px;"
                                    src="{{$taiKhoan->gioi_tinh == 'nam' ? 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Male_symbol_%28heavy_blue%29.svg/1200px-Male_symbol_%28heavy_blue%29.svg.png' : 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Venus_symbol_%28heavy_copper%29.svg/220px-Venus_symbol_%28heavy_copper%29.svg.png'}}"
                                    alt=""></p>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="row">
                        <div class="col-4">
                            <h6 style=" margin-left: 30px">Ngày sinh</h6>
                        </div>
                        <div class="col">
                            <p>{{$taiKhoan->ngay_sinh}}</p>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="row">
                        <div class="col-4">
                            <h6 style=" margin-left: 30px">Địa chỉ</h6>
                        </div>
                        <div class="col">
                            <p>{{$taiKhoan->dia_chi}}</p>
                        </div>
                    </div>
                </div>
                @if($taiKhoan->sdt != null)
                    <div class="col mt-3">
                        <div class="row">
                            <div class="col-4">
                                <h6 style=" margin-left: 30px">Số điện thoại</h6>
                            </div>
                            <div class="col">
                                <p>{{$taiKhoan->sdt}}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col mt-3">
                    <div class="row">
                        <div class="col-4">
                            <h6 style=" margin-left: 30px">Giá thuê 1 giờ</h6>
                        </div>
                        <div class="col">
                            <p>{{number_format($taiKhoan->gia_tien, 0, ',')}} VNĐ</p>
                        </div>
                    </div>
                </div>
                <hr class="wid-80 b-wid-3 my-4 m-auto">
                <div class="text-center">
                    <h6 class="mb-1">Thông tin client</h6>
                    <p class="mb-1">
                        anccdncdjcndjncjdncsjnckjnjnvdfnvxnvjvndfnvfdjnzvlvnlvnflvndjfvndkzjnvznvdjkvndznvdkz
                        fjdzjkvbzjkbdjvbdzjjhvbjdhvbhdj vh jdbjfhvbdfhvbhfbvjhfbvhjbdvhbvjbnckxjncjk
                        xvfjvhbx vhfbvxnvjfnvhbvjxnknjnvfvfvh jvnvnkjxfnvfk vnxfkvnxjkfvn vfjkvnfjvnfxlk
                        nvxfkjvnjxnv vjfvbfkdvnjfv vjfnvjnfjvnxf jfbvjxnvkxnfvkjv jkfvnxkvnx</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card user-card user-card-1">
            <div class="col mt-3">
                <div class="row">
                    <div class="col-11" style="margin-left: 30px;">
                        <div class="card seo-card">
                            <div class="card-body seo-statustic">
                                <i class="fas fa-money-bill-wave-alt text-c-blue f-16 mb-2"></i>
                                <h5 class="m-0">{{number_format($taiKhoan->so_du, 0, ',')}} VNĐ</h5>
                                <p class="m-0">Số dư</p>
                            </div>
                            <div class="process">
                                <div id="process2" style="height:87px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card user-list">
                <div class="card-header">
                    <h5>Đánh giá</h5>
                    <div class="card-header-right">
                        <div class="btn-group card-option">
                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="feather icon-more-horizontal"></i>
                            </button>
                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-end">
                                <li class="dropdown-item full-card">
                                    <a href="#!">
                                        <span><i class="feather icon-maximize"></i>maximize</span>
                                        <span style="display:none"><i class="feather icon-minimize"></i>Restore</span>
                                    </a>
                                </li>
                                <li class="dropdown-item minimize-card">
                                    <a href="#!">
                                        <span><i class="feather icon-minus"></i>collapse</span>
                                        <span style="display:none"><i class="feather icon-plus"></i>expand</span>
                                    </a>
                                </li>
                                <li class="dropdown-item reload-card">
                                    <a href="#!">
                                        <i class="feather icon-refresh-cw"></i>reload
                                    </a>
                                </li>
                                <li class="dropdown-item close-card">
                                    <a href="#!">
                                        <i class="feather icon-trash"></i> remove
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <div class="row align-items-center justify-content-center m-b-20">
                        <div class="col-6">
                            <h2 class="f-w-300 d-flex align-items-center float-start m-0">
                                {{$taiKhoan->countDanhGia}} <i class="fas fa-star f-10 m-l-10 text-c-yellow"></i>
                            </h2>
                        </div>
                        <div class="col-6"></div>
                    </div>

                    <div class="row">
                        @foreach([5, 4, 3, 2, 1] as $star)
                                                <div class="col-xl-12">
                                                    <h6 class="align-items-center float-start">
                                                        <i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>{{ $star }}
                                                    </h6>
                                                    <h6 class="align-items-center float-end rating-summary">
                                                        {{ $taiKhoan->raiting_count["{$star}_sao"] }}</h6>
                                                    <div class="progress m-t-30 m-b-20" style="height: 6px;">
                                                        @php
                                                            $totalRatings = array_sum($taiKhoan->raiting_count);
                                                            $percentage = $totalRatings > 0 ? ($taiKhoan->raiting_count["{$star}_sao"] / $totalRatings) * 100 : 0;
                                                        @endphp
                                                        <div class="progress-bar progress-primary" role="progressbar"
                                                            style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 p-r-0">
                            <span class="d-block mb-1"><i class="fas fa-circle f-10 m-r-5"
                                    style="color:#a367dc;"></i>Thành công
                                [{{ isset($taiKhoan->rent['1']) ? $taiKhoan->rent['1'] : 0 }}]</span>
                            <span class="d-block mb-1"><i class="fas fa-circle f-10 m-r-5"
                                    style="color:#67b7dc;"></i>Đang kiểm duyệt
                                [{{ isset($taiKhoan->rent['0']) ? $taiKhoan->rent['0'] : 0 }}]</span>
                            <span class="d-block"><i class="fas fa-circle f-10 m-r-5" style="color:#6771dc;"></i>Từ chối
                                [{{ isset($taiKhoan->rent['2']) ? $taiKhoan->rent['2'] : 0 }}]</span>
                        </div>
                        <div class="col-6">
                            <div id="device-chart" style="height:140px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-n4">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Tiêu đề biểu đồ doanh thu -->
        <h4 id="chartTitle" class="text-primary fw-bold">Doanh thu theo ngày</h4>
        <!-- Bộ chuyển đổi giữa Ngày và Tháng -->
        <div class="btn-group" role="group" aria-label="Doanh thu filter">
            <button type="button" class="btn btn-outline-primary active" id="filterDay">Ngày</button>
            <button type="button" class="btn btn-outline-primary" id="filterMonth">Tháng</button>
        </div>
    </div>
    <!-- Biểu đồ -->
    <canvas id="doanhThuChart" style="width: 100%; height: 400px;"></canvas>
</div>


@endsection

@section('script-footer')
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    $(document).ready(function () {

        $(function () {
            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("process2", am4charts.XYChart);
            // Add data
            chart.data = [{
                "date": "2018-01-6",
                "price": 168
            }, {
                "date": "2018-01-7",
                "price": 200
            }, {
                "date": "2018-01-8",
                "price": 170
            }, {
                "date": "2018-01-9",
                "price": 243
            }, {
                "date": "2018-01-10",
                "price": 210
            }, {
                "date": "2018-01-11",
                "price": 228
            }, {
                "date": "2018-01-12",
                "price": 180
            }, {
                "date": "2018-01-13",
                "price": 158
            }, {
                "date": "2018-01-14",
                "price": 200
            }, {
                "date": "2018-01-15",
                "price": 90
            }, {
                "date": "2018-01-16",
                "price": 175
            }];

            // Create axes
            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.grid.template.location = 0;
            dateAxis.renderer.grid.template.disabled = true;
            dateAxis.startLocation = 0.6;
            dateAxis.endLocation = 0.4;
            dateAxis.renderer.labels.template.disabled = true;
            dateAxis.renderer.inside = true;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.logarithmic = false;
            valueAxis.renderer.minGridDistance = 1;
            valueAxis.renderer.grid.template.disabled = true;
            valueAxis.renderer.inside = true;
            valueAxis.renderer.labels.template.disabled = true;

            // Create series
            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.valueY = "price";
            series.dataFields.dateX = "date";
            series.strokeWidth = 3;
            series.fillOpacity = 0.1;
            series.tensionX = 0.77;
            series.tooltipText = "{valueY.value}";
            series.fill = am4core.color("#19BCBF");
            series.stroke = am4core.color("#19BCBF");
            series.strokeWidth = 3;

            // Add cursor
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.fullWidthLineX = true;
            chart.cursor.lineX.strokeWidth = 0;
            chart.cursor.lineX.fill = am4core.color("#fff");
            chart.cursor.lineX.fillOpacity = 0;
            chart.padding(0, 0, 0, 0);
        });

        $(function () {
            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("process3", am4charts.XYChart);
            // Add data
            chart.data = <?php echo $a; ?>;

            // Create axes
            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.grid.template.location = 0;
            dateAxis.renderer.grid.template.disabled = true;
            dateAxis.startLocation = 0.6;
            dateAxis.endLocation = 0.4;
            dateAxis.renderer.labels.template.disabled = true;
            dateAxis.renderer.inside = true;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.logarithmic = false;
            valueAxis.renderer.minGridDistance = 1;
            valueAxis.renderer.grid.template.disabled = true;
            valueAxis.renderer.inside = true;
            valueAxis.renderer.labels.template.disabled = true;

            // Create series
            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.valueY = "follower";
            series.dataFields.dateX = "date";
            series.strokeWidth = 3;
            series.fillOpacity = 0.1;
            series.tensionX = 0.77;
            series.tooltipText = "{valueY.value}";
            series.fill = am4core.color("#FF425C");
            series.stroke = am4core.color("#FF425C");
            series.strokeWidth = 3;

            // Add cursor
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.fullWidthLineX = true;
            chart.cursor.lineX.strokeWidth = 0;
            chart.cursor.lineX.fill = am4core.color("#fff");
            chart.cursor.lineX.fillOpacity = 0;
            chart.padding(0, 0, 0, 0);
        });


        $(function () {
            // Themes begin am4core.useTheme(am4themes_animated);
            // Themes end
            // Create chart instance
            var chart = am4core.create("device-chart", am4charts.PieChart);
            // Add data
            var rentData = [
                {
                    "sector": "Thành công",
                    "size": <?php echo isset($taiKhoan->rent['1']) ? ($taiKhoan->rent['1']) : 0; ?>
                },
                {
                    "sector": "Từ chối",
                    "size": <?php echo isset($taiKhoan->rent['2']) ? ($taiKhoan->rent['2']) : 0; ?>
                },
                {
                    "sector": "Đang kiểm duyệt",
                    "size": <?php echo isset($taiKhoan->rent['0']) ? ($taiKhoan->rent['0']) : 0; ?>
                }
            ];
            chart.data = rentData;
            // Add label
            chart.innerRadius = 30;

            // Add and configure Series
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "size";
            pieSeries.dataFields.category = "sector";
            pieSeries.labels.template.disabled = true;
            pieSeries.ticks.template.disabled = true;
            pieSeries.colors.step = 2;
        });

    });
</script>
<!-- Thêm link Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Cấu hình biểu đồ ban đầu
    const ctx = document.getElementById('doanhThuChart').getContext('2d');
    let doanhThuChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [], // Ban đầu để trống
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: [],
                backgroundColor: 'rgba(0,191,255)',
                borderColor: 'rgba(0,191,255)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Hàm lấy dữ liệu từ route
    async function fetchData(url) {
        try {
            const response = await fetch(url);
            const result = await response.json();
            return result; // Trả về dữ liệu JSON
        } catch (error) {
            console.error("Lỗi khi lấy dữ liệu:", error);
            return { labels: [], data: [] };
        }
    }

    // Cập nhật biểu đồ
    async function updateChart(url, title) {
        const data = await fetchData(url);
        doanhThuChart.data.labels = data.labels;
        doanhThuChart.data.datasets[0].data = data.data;
        doanhThuChart.update();

        document.getElementById('chartTitle').innerText = title;
    }

    var userId = @json($taiKhoan->id);
    // console.log(userId);

    // Sự kiện khi nhấn nút "Ngày"
    document.getElementById('filterDay').addEventListener('click', () => {
        updateChart(userId + '/doanh-thu/ngay', 'Doanh thu theo ngày');
        toggleActiveButton('filterDay', 'filterMonth'); // Thay đổi trạng thái nút
    });

    // Sự kiện khi nhấn nút "Tháng"
    document.getElementById('filterMonth').addEventListener('click', () => {
        updateChart(userId + '/doanh-thu/thang', 'Doanh thu theo tháng');
        toggleActiveButton('filterMonth', 'filterDay'); // Thay đổi trạng thái nút
    });

    // Hàm thay đổi trạng thái nút
    function toggleActiveButton(activeId, inactiveId) {
        const activeBtn = document.getElementById(activeId);
        const inactiveBtn = document.getElementById(inactiveId);

        // Gán class 'active' cho nút được chọn
        activeBtn.classList.add('active');

        // Loại bỏ class 'active' khỏi nút không được chọn
        inactiveBtn.classList.remove('active');
    }

    // Tải dữ liệu ban đầu (mặc định là doanh thu theo ngày)
    updateChart(userId + '/doanh-thu/ngay', 'Doanh thu theo ngày');
</script>
@endsection