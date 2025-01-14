@extends('client.layouts.app')
@section('title', 'Thống kê tài khoản')
@section('css')
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }

        #body {
            margin-right: -300px;
            margin-left: 20px;
        }

        .nav-tabs .nav-link {
            color: #fff;
            background-color: #1e1e2d;
            border: none;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            text-align: left;
            font-size: 14px;
        }

        .nav-tabs .nav-item {
            background-color: #14141F;
        }

        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        .tab-content .sc-box-icon {
            text-align: center;
            padding: 20px;
            background-color: #1e1e2d;
            border-radius: 10px;
            color: #fff;
        }

        .tab-content .sc-box-icon img {
            margin-bottom: 15px;
            border-radius: 10%;
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #1D1E2D;
            border-radius: 20px;
            overflow: hidden;
        }

        .history-table th,
        .history-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #2c2f44;
            font-size: 14px;
            color: #fff;
        }

        .history-table tr,
        .history-table td {
            border: 1px solid #1D1E2D;
            line-height: 20px;
            border-bottom: 1px solid #2c2f44;
        }

        .history-table th {
            background-color: #2c2f44;
            font-weight: bold;
        }

        .history-table .status {
            font-weight: 600;
        }
    </style>
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
    <section class="flat-title-page inner">
        <div class="overlay"></div>
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading mg-bt-12">
                        <h1 class="heading text-center">Thống kê tài khoản</h1>
                    </div>
                    <div class="breadcrumbs style2">
                        <ul>
                            <li><a href="{{ route('client.index') }}">Trang chủ</a></li>
                            <li><a href="{{ route('client.thongtincanhan') }}">Thông tin cá nhân</a></li>
                            <li>Thống kê tài khoản</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<div class="tf-connect-wallet tf-section">
    <div class="themesflat-container" style="margin-top: -50px">
        <div class="row">
            <div class="col-md-3">
                <ul class="nav flex-column nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#doanhthu">Doanh thu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#theodoi">Danh sách theo dõi User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#khachhangthanthiet">Khách hàng thân thiết </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#naptien">Lịch sử nạp tiền</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#ruttien">Lịch sử rút tiền</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="doanhthu">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <!-- Bộ chuyển đổi giữa Ngày và Tháng -->
                            <h4 id="chartTitle" class="text-white">Doanh thu theo ngày</h4>
                            <div class="btn-group" role="group" aria-label="Doanh thu filter">
                                <button type="button" class="custom-btn btn active" id="filterDay">Ngày</button>
                                <button type="button" class="custom-btn btn" id="filterMonth">Tháng</button>
                            </div>
                        </div>
                        <canvas id="doanhThuChart" width="400" height="200"></canvas>
                    </div>
                    <div class="tab-pane fade" id="theodoi">
                            <div class="row"
                                style="display: flex; justify-content: center; align-items: flex-start; gap: 20px;">
                                <div class="col">
                                    <h3 class="text-center mb-5">Người theo dõi</h3>
                                    <div class="content-scroll"
                                        style="height: 400px;scrollbar-width: none; overflow-y: auto;">
                                        @foreach ($nguoiTheoDoi as $item)
                                            <div class="sc-author-box style-3"
                                                style="width: 350px; background-color: #3C3C56; border-radius: 40px ; justify-content: space-between; margin-left: 15%;">
                                                <div class="author-style2 flex">
                                                    <div class="author-avatar">
                                                        <a href="#">
                                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($item->nguoiTheoDoi->anh_dai_dien) }}"
                                                                alt="Image" class="avatar"
                                                                style="width: 50px; height: 50px">
                                                        </a>
                                                        <div class="badge"><i class="ripple"></i></div>
                                                    </div>
                                                    <div class="author-infor">
                                                        <h5><a href="#">{{ $item->nguoiTheoDoi->ten }}</a></h5>
                                                        <div class="tag">{{ $item->nguoiTheoDoi->email }}</div>
                                                        <span
                                                            class="price">{{ number_format($item->nguoiTheoDoi->gia_tien, 0, ',') }}
                                                            VND</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    @if (in_array($item->nguoi_theo_doi_id, $listNguoiDuocTheoDoiIds))
                                                        <form action="{{ route('client.huyTheoDoi.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="nguoi_duoc_theo_doi_id"
                                                                value="{{ $item->nguoiTheoDoi->id }}">
                                                            <div class="btn-follow"
                                                                style="width: 100px; margin-left: -5%; background-color: #0575D8">
                                                                <button style="all: unset; cursor: pointer;" type="submit">
                                                                    Đang theo dõi
                                                                </button>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('client.theoDoi.store') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="nguoi_duoc_theo_doi_id"
                                                                value="{{ $item->nguoiTheoDoi->id }}">
                                                            <div class="btn-follow"
                                                                style="width: 100px; margin-left: -5%; background-color: #3C3C56">
                                                                <button style="all: unset; cursor: pointer;">
                                                                    Theo dõi
                                                                </button>
                                                            </div>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col">
                                    <h3 class="text-center mb-5">Đang theo dõi</h3>
                                    <div class="content-scroll"
                                        style="height: 400px;scrollbar-width: none; overflow-y: auto;">
                                        @foreach ($nguoiDuocTheoDoi as $item)
                                            <div class="sc-author-box style-3"
                                                style="width: 350px; background-color: #3C3C56; border-radius: 40px ; justify-content: space-between; margin-left: 15%">
                                                <div class="author-style2 flex">
                                                    <div class="author-avatar">
                                                        <a href="#">
                                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($item->nguoiDuocTheoDoi->anh_dai_dien) }}"
                                                                alt="Image" class="avatar"
                                                                style="width: 50px; height: 50px">
                                                        </a>
                                                        <div class="badge"><i class="ripple"></i></div>
                                                    </div>
                                                    <div class="author-infor">
                                                        <h5><a href="#">{{ $item->nguoiDuocTheoDoi->ten }}</a></h5>
                                                        <div class="tag">{{ $item->nguoiDuocTheoDoi->email }}</div>
                                                        <span
                                                            class="price">{{ number_format($item->nguoiDuocTheoDoi->gia_tien, 0, ',') }}
                                                            VND</span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <form action="{{ route('client.huyTheoDoi.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="nguoi_duoc_theo_doi_id"
                                                            value="{{ $item->nguoiDuocTheoDoi->id }}">
                                                        <div class="btn-follow"
                                                            style="width: 100px; margin-left: -5%; background-color: #0575D8">
                                                            <button style="all: unset; cursor: pointer;" type="submit">
                                                                Đang theo dõi
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="khachhangthanthiet">
                        <div class="table-container">
                                <table class="history-table">
                                    <thead>
                                        <tr>
                                            <th>Top</th>
                                            <th colspan="2">Người thuê</th>
                                            <th>Số giờ thuê</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($khthanthiet as $item)
                                        <tr class="group">
                                            <td>Top {{$loop->iteration}}</td>
                                            <td>{{$item->nguoiThue->ten}}</td>
                                            <td><img src="{{Storage::url($item->nguoiThue->anh_dai_dien)}}" style="width:60px; height:60px; object-fit:cover; border-radius:10%" alt=""></td>
                                            <td><span class="text-succsess">{{$item->total_hour}} giờ</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="naptien">
                            <div class="table-container">
                                <table class="history-table">
                                    <thead>
                                        <tr>
                                            <th>Ngân hàng</th>
                                            <th>Trạng thái</th>
                                            <th>Số tiền</th>
                                            <th>Thời gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="group">
                                            <td>Vietcombank</td>
                                            <td><span class="status text-danger">Thất bại</span></td>
                                            <td>100.000 VND</td>
                                            <td>11/12/2024 - 02:26:25</td>
                                        </tr>
                                        <tr class="group">
                                            <td>TP bank</td>
                                            <td><span class="status text-success">Thành công</span>
                                            </td>
                                            <td>100.000 VND</td>
                                            <td>11/12/2024 - 02:26:25</td>
                                        </tr>
                                        <tr class="group">
                                            <td>MB bank</td>
                                            <td><span class="status text-warning">Chờ xử lý</span></td>
                                            <td>100.000 VND</td>
                                            <td>11/12/2024 - 02:26:25</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="ruttien">
                            <div class="table-container">
                                <table class="history-table">
                                    <thead>
                                        <tr>
                                            <th>Ngân hàng</th>
                                            <th>Trạng thái</th>
                                            <th>Số tiền</th>
                                            <th>Thời gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="group">
                                            <td>Vietcombank</td>
                                            <td><span class="status text-danger">Thất bại</span></td>
                                            <td>100.000 VND</td>
                                            <td>11/12/2024 - 02:26:25</td>
                                        </tr>
                                        <tr class="group">
                                            <td>TP bank</td>
                                            <td><span class="status text-success">Thành công</span>
                                            </td>
                                            <td>100.000 VND</td>
                                            <td>11/12/2024 - 02:26:25</td>
                                        </tr>
                                        <tr class="group">
                                            <td>MB bank</td>
                                            <td><span class="status text-warning">Chờ xử lý</span></td>
                                            <td>100.000 VND</td>
                                            <td>11/12/2024 - 02:26:25</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script_footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: false
                    }
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
                return {
                    labels: [],
                    data: []
                };
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

        // Sự kiện khi nhấn nút "Ngày"
        document.getElementById('filterDay').addEventListener('click', () => {
            updateChart('/doanh-thu/ngay', 'Doanh thu theo ngày');
            toggleActiveButton('filterDay', 'filterMonth'); // Thay đổi trạng thái nút
        });

        // Sự kiện khi nhấn nút "Tháng"
        document.getElementById('filterMonth').addEventListener('click', () => {
            updateChart('/doanh-thu/thang', 'Doanh thu theo tháng');
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
        updateChart('/doanh-thu/ngay', 'Doanh thu theo ngày');
    </script>
@endsection
