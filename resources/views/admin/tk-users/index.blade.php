@extends('admin.layouts.app')

<title>@yield('title' , 'Thống kê tài khoản')</title>
@section('content')

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1> Số lượng tài khoản </h1>
    
    <div style="width: 50%; height: 400px; margin: auto;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('admin.tkuser.data') }}",
            method: "GET",
            success: function(response) {
                const labels = response.dates; // Chỉ lấy ngày tháng
                const data = response.counts; // Chỉ lấy số lượng tài khoản

                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'line', // Giữ nguyên là line
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Số lượng tài khoản mới',
                            data: data,
                            backgroundColor: 'rgba(75, 192, 192, 0.4)', // Màu nền để tạo hiệu ứng sóng
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1,
                            fill: true, // Để lấp đầy dưới đường biểu đồ
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Ngày tháng' // Nhãn cho trục X
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Số lượng tài khoản' // Nhãn cho trục Y
                                }
                            }
                        }
                    }
                });
            },
            error: function(xhr) {
                console.log('Error:', xhr);
            }
        });
    });
    </script>
</body>
</html>
@endsection
