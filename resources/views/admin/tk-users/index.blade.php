<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê tài khoản</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Thống kê tài khoản</h1>

    <p>Tổng số tài khoản: {{ $totalAccounts }}</p>
    <p>Số tài khoản tạo mới trong tháng: {{ $accountsThisMonth }}</p>

    <h2>Số tài khoản mới theo ngày:</h2>
    <canvas id="accountsChart"></canvas>

    <script>
        const ctx = document.getElementById('accountsChart').getContext('2d');
        const accountsChart = new Chart(ctx, {
            type: 'line', // Bạn có thể đổi sang 'bar' nếu muốn dạng biểu đồ cột
            data: {
                labels: @json($dates),
                datasets: [{
                    label: 'Số lượng tài khoản',
                    data: @json($counts),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</html>
