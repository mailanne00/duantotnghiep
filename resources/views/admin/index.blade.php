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
                    <h5>Top 10 User được thuê nhiều nhất</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div id="am-pie-2" style="height: 300px"></div>
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

        //sơ đồ top 10 user được thuê nhiều nhất
        $(function () {
            var chart = am4core.create("am-pie-2", am4charts.PieChart);
            chart.data = {!! json_encode($chartData) !!};
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "count";
            pieSeries.dataFields.category = "name";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeWidth = 2;
            pieSeries.slices.template.strokeOpacity = 1;
            chart.legend = new am4charts.Legend();
        });

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

