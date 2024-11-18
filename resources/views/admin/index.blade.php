@extends('admin.layout.app')

@section('header')
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
                    <p class="m-b-0 text-white"><span
                            class="label label-danger m-r-10">+11%</span>From Previous Month</p>
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
                    <p class="m-b-0 text-white"><span
                            class="label label-warning m-r-10">+52%</span>From Previous Month</p>
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
                    <p class="m-b-0 text-white"><span
                            class="label label-primary m-r-10">+12%</span>From Previous Month</p>
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
                    <p class="m-b-0 text-white"><span
                            class="label label-success m-r-10">+52%</span>From Previous Month</p>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5>Doanh thu</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="site-visitor-chart" style="height:250px;width:100%;"></div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script-footer')
    <script src="{{asset('assets-admin/plugins/chart-morris/js/raphael.min.js')}}"></script>
    <script src="{{asset('assets-admin/plugins/chart-morris/js/morris.min.js')}}"></script>

    <script>
        // [ site-visitor-chart ] start
        $(function() {
            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            var chart = am4core.create("site-visitor-chart", am4charts.XYChart);
            chart.hiddenState.properties.opacity = 0;

            chart.padding(0, 0, 0, 0);

            chart.zoomOutButton.disabled = true;

            var data = [];
            var visits = 10;
            var i = 0;

            for (i = 0; i <= 30; i++) {
                visits -= Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
                data.push({
                    date: new Date().setSeconds(i - 30),
                    value: Math.abs(visits)
                });
            }

            chart.data = data;

            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.grid.template.location = 0;
            dateAxis.renderer.minGridDistance = 30;
            dateAxis.dateFormats.setKey("second", "ss");
            dateAxis.periodChangeDateFormats.setKey("second", "[bold]h:mm a");
            dateAxis.periodChangeDateFormats.setKey("minute", "[bold]h:mm a");
            dateAxis.periodChangeDateFormats.setKey("hour", "[bold]h:mm a");
            dateAxis.renderer.inside = true;
            dateAxis.renderer.axisFills.template.disabled = true;
            dateAxis.renderer.ticks.template.disabled = true;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.tooltip.disabled = true;
            valueAxis.interpolationDuration = 500;
            valueAxis.rangeChangeDuration = 500;
            valueAxis.renderer.inside = true;
            valueAxis.renderer.minLabelPosition = 0.05;
            valueAxis.renderer.maxLabelPosition = 0.95;
            valueAxis.renderer.axisFills.template.disabled = true;
            valueAxis.renderer.ticks.template.disabled = true;

            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.dateX = "date";
            series.dataFields.valueY = "value";
            series.interpolationDuration = 500;
            series.defaultState.transitionDuration = 0;
            series.tensionX = 0.8;
            series.stroke = am4core.color("#FF425C");
            series.strokeWidth = 2;

            chart.events.on("datavalidated", function() {
                dateAxis.zoom({
                    start: 1 / 15,
                    end: 1.2
                }, false, true);
            });

            dateAxis.interpolationDuration = 500;
            dateAxis.rangeChangeDuration = 500;

            document.addEventListener("visibilitychange", function() {
                if (document.hidden) {
                    if (interval) {
                        clearInterval(interval);
                    }
                } else {
                    startInterval();
                }
            }, false);

            // add data
            var interval;

            function startInterval() {
                interval = setInterval(function() {
                    visits =
                        visits + Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 5);
                    var lastdataItem = series.dataItems.getIndex(series.dataItems.length - 1);
                    chart.addData({
                        date: new Date(lastdataItem.dateX.getTime() + 1000),
                        value: Math.abs(visits)
                    }, 1);
                }, 1000);
            }

            setTimeout(function() {
                startInterval();
            }, 100);

            // all the below is optional, makes some fancy effects
            // gradient fill of the series
            series.fillOpacity = 1;
            var gradient = new am4core.LinearGradient();
            gradient.addColor(am4core.color("#FF425C"), 0.2);
            gradient.addColor(am4core.color("#FF425C"), 0);
            series.fill = gradient;

            // this makes date axis labels to fade out  FF9764
            dateAxis.renderer.labels.template.adapter.add("fillOpacity", function(fillOpacity, target) {
                var dataItem = target.dataItem;
                return dataItem.position;
            })

            // need to set this, otherwise fillOpacity is not changed and not set
            dateAxis.events.on("datarangechanged", function() {
                am4core.iter.each(dateAxis.renderer.labels.iterator(), function(label) {
                    label.fillOpacity = label.fillOpacity;
                })
            })

            // this makes date axis labels which are at equal minutes to be rotated
            dateAxis.renderer.labels.template.adapter.add("rotation", function(rotation, target) {
                var dataItem = target.dataItem;
                if (dataItem.date && dataItem.date.getTime() == am4core.time.round(new Date(dataItem.date.getTime()), "minute").getTime()) {
                    target.verticalCenter = "middle";
                    target.horizontalCenter = "left";
                    return -90;
                } else {
                    target.verticalCenter = "bottom";
                    target.horizontalCenter = "middle";
                    return 0;
                }
            })

            // bullet at the front of the line
            var bullet = series.createChild(am4charts.CircleBullet);
            bullet.circle.radius = 5;
            bullet.fillOpacity = 1;
            bullet.fill = am4core.color("#FF425C");
            bullet.isMeasured = false;

            series.events.on("validated", function() {
                bullet.moveTo(series.dataItems.last.point);
                bullet.validatePosition();
            });
        });
        // [ site-visitor-chart ] end

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

        var rentData = [
                @foreach ($rentData as $month => $status)
            {
                y: 'Tháng {{ $month }}',
                a: {{ $status[0] }},
                b: {{ $status[1] }},
                c: {{ $status[2] }},
            },
            @endforeach
        ];
        Morris.Bar({
            element: 'morris-bar-chart',
            data:rentData,
            xkey: 'y',
            barSizeRatio: 0.70,
            barGap: 3,
            resize: true,
            responsive: true,
            ykeys: ['a', 'b', 'c'],
            labels: ['Kiểm duyệt', 'Thành công', 'Từ chối'],
            barColors: ["#19BCBF", "#463699", "#13bd8a"]
        });

    </script>
@endsection

