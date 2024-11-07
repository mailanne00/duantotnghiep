@extends('admin.layouts.app')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Thống kê player</h5>
        </div>

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="card-body">
            <canvas id="playerChart"></canvas>
            <script>
                var ctx = document.getElementById('playerChart').getContext('2d');
                var playerChart = new Chart(ctx, {
                    type: 'bar', // Loại biểu đồ (có thể là 'line', 'bar', 'pie', v.v.)
                    data: {
                        labels: @json($players->pluck('taiKhoan.ten')),
                        datasets: [{
                            label: 'Số lượt theo dõi',
                            data: @json($players->pluck('followers_count')),
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }, {
                            label: 'Số lần thuê',
                            data: @json($players->pluck('hire_logs_count')),
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
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
        </div>
    </div>
</div>
@endsection
