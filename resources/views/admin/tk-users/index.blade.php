<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê Tài Khoản</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Thống Kê Tài Khoản</h1>
    
    <div style="width: 50%; height: 400px; margin: auto;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('admin.statistics.data') }}",
                method: "GET",
                success: function(response) {
                    const labels = response.dates; // Ngày thêm tài khoản
                    const data = response.counts; // Số lượng tài khoản

                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Số lượng tài khoản mới',
                                data: data,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
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
