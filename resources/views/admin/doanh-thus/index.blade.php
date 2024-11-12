@extends('admin.layouts.app')
@section('title' , 'Quản lí doanh thu')
@section('header')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Quản lí doanh thu</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <div style="max-width: 500px;">
                        <canvas id="myBarChart" width="200" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script để cấu hình và tạo biểu đồ -->
    <script>
        // Dữ liệu cho biểu đồ
        const data = {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: [{{$arr}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Cấu hình cho biểu đồ
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Khởi tạo biểu đồ
        const myBarChart = new Chart(
            document.getElementById('myBarChart'),
            config
        );
    </script>

@endsection
