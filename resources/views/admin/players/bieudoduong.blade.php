@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Thống kê số giờ được thuê theo tháng</h5>
                </div>

                <div class="col-md-12">
                    <h2>Biểu đồ Tổng Giờ Thuê Theo Giờ</h2>
                    <canvas id="chartHours"></canvas>

                    <h2>Danh sách người thuê theo giờ</h2>
                    <div id="renterNames"></div>
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
    </div>

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

            console.log(chartDataDay);

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
                    }
                }
            });

            // Hiển thị tên người thuê theo giờ
            const renterNamesDiv = document.getElementById('renterNames');
            chartDataDay.forEach(item => {
                const hourDiv = document.createElement('div');
                hourDiv.innerHTML =
                    `<strong>${item.hour}:00</strong>: ${item.renter_names.join(', ') || 'Không có người thuê'}`;
                renterNamesDiv.appendChild(hourDiv);
            });


        };
    </script>
@endsection
