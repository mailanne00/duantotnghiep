@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Thống kê số giờ được thuê theo tháng</h5>
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
        };
    </script>
@endsection
