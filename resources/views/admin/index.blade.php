@extends('admin.layout.app')

@section('script-header')
        <link rel="stylesheet" href="{{asset('assets-admin/plugins/chart-morris/css/morris.css')}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card prod-p-card bg-c-red">
                <div class="card-body">
                    <div class="row align-items-center m-b-25">
                        <div class="col">
                            <h6 class="m-b-5 text-white">Doanh thu</h6>
                            <h3 class="m-b-0 text-white">{{number_format($totalProfit, 0, ',')}}</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card prod-p-card bg-c-yellow">
                <div class="card-body">
                    <div class="row align-items-center m-b-25">
                        <div class="col">
                            <h6 class="m-b-5 text-white">Admin</h6>
                            <h3 class="m-b-0 text-white">{{$countPhanQuyen1}}</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user text-c-yellow f-18"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card prod-p-card bg-c-blue">
                <div class="card-body">
                    <div class="row align-items-center m-b-25">
                        <div class="col">
                            <h6 class="m-b-5 text-white">User</h6>
                            <h3 class="m-b-0 text-white">{{$countPhanQuyen2}}</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user text-c-blue f-18"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card prod-p-card bg-c-green">
                <div class="card-body">
                    <div class="row align-items-center m-b-25">
                        <div class="col">
                            <h6 class="m-b-5 text-white">Đơn thuê</h6>
                            <h3 class="m-b-0 text-white">{{$countRent}}</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign text-c-green f-18"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5>Lượng nguời tham gia website</h5>
                </div>
                <div class="card-body">
                    <div id="morris-bar-chart" style="height:300px"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5>Doanh thu</h5>
                </div>
                <div class="card-body">
                    <div id="morris-line-chart" class="ChartShadow" style="height:400px"></div>
                </div>
            </div>
        </div>
         <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Top 10 player được thuê nhiều nhất</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="">
                            <table class="table table-hover m-0">
                                <thead>
                                    <tr>
                                        <th>Ảnh đại diện</th>
                                        <th>Tên</th>
                                        <th>Doanh thu</th>
                                        <th>Ngày tạo tài khoản</th>
                                        <th>Số dư</th>
                                        <th>Trạng thái</th>
                                </thead>
                                <tbody>
                                    @foreach ($chartData as $item)
                                    <tr>
                                        <td><img class="rounded-circle" style="width:60px;height:60px; object-fit:cover"
                                                src="{{Storage::url($item['image'])}}"
                                                alt="activity-user"></td>
                                        <td>
                                            <h6 class="mb-1">{{$item['name']}}</h6>
                                            <p class="m-0">{{$item['name2']}}</p>
                                        </td>
                                        <td>
                                            <p class="mb-1">{{number_format($item['profit'],0 , '.')}}</p>
                                            <span class="text-c-green m-0">Tổng {{$item['count']}} đơn</span>
                                        </td>
                                        <td>{{$item['ngayTao']}}</td>
                                        <td>{{number_format($item['soDu'], 0 , '.')}}</td>
                                        <td><a class="badge badge-light-{{$item['statusColor']}} f-12"
                                                href="#!">{{$item['status']}}</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tình trạng đơn thuê</h5>
                </div>
                <div class="card-body">
                    <div id="morris-bar-stacked-chart" style="height:300px; width: 100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-footer')
    <script src="{{asset('assets-admin/plugins/chart-morris/js/raphael.min.js')}}"></script>
    <script src="{{asset('assets-admin/plugins/chart-morris/js/morris.min.js')}}"></script>

    <script>

        //sơ đồ tình trạng đơn thuê trong 1 năm
        var rentData = [
                @foreach ($rentData as $month => $status)
            {
                y: 'Tháng {{ $month }}',
                a: {{ $status[0] }},
                b: {{ $status[2] }},
                c: {{ $status[1] }},
            },
            @endforeach
        ];

        var chartData = @json($data);
        Morris.Bar({
            element: 'morris-bar-chart',
            data: chartData,
            xkey: 'y',
            barSizeRatio: 0.70,
            barGap: 3,
            resize: true,
            responsive: true,
            ykeys: ['b'],
            labels: ['Số lượng'],
            barColors: ["#463699"]
        });

        Morris.Bar({
            element: 'morris-bar-stacked-chart',
            data: rentData,
            xkey: 'y',
            stacked: true,
            ykeys: ['a', 'b', 'c'],
            labels: ['Kiểm duyệt', 'Từ chối', 'Thành công'],
            barColors: ["#FF9764", "#FF425C", "#19BCBF"]
        });

        //sơ đồ doanh thu của website

        Morris.Line({
            element: 'morris-line-chart',
            data:   <?php echo $dataForChart ?>,
            xkey: 'y',
            redraw: true,
            resize: true,
            smooth: false,
            ykeys: ['a'],
            hideHover: 'auto',
            responsive: true,
            labels: ['Doanh thu',],
            lineColors: ['#463699', '#19BCBF']
        });

    </script>
@endsection

