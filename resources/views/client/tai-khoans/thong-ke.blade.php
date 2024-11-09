@extends('client.layouts.cai-dat')

@section('title', 'Thống kê')

@section('content')
<div class="col-lg-9 col-12">

    <div class="aside">

        <h3>Thống kê</h3>

        <div class="d-flex statistical">

            <div class="btn-group" role="group" aria-label="Basic example"><button type="button"
                    class="btn btn-secondary undefined">Ngày</button><button type="button"
                    class="btn btn-secondary btn-danger">Tháng</button></div>

        </div>

        <div class="chart">

            <canvas id="myChart" width="400" height="250"></canvas>

            <!-- <div class="chartjs-size-monitor">

                            <div class="chartjs-size-monitor-expand">

                                <div class=""></div>

                            </div>

                            <div class="chartjs-size-monitor-shrink">

                                <div class=""></div>

                            </div>

                        </div>

                        <canvas height="1092" width="1311" style="display: block; height: 874px; width: 1049px;" class="chartjs-render-monitor"></canvas> -->

        </div>

    </div>

</div>
@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script>
    const ctx = document.getElementById('myChart');

    const myChart = new Chart(ctx, {

        type: 'bar',

        height: 250,

        label: "Doanh thu theo ngày",

        data: {

            labels: ['22/3/2022', '23/3/2022', '24/3/2022', '25/3/2022', '26/3/2022', '27/3/2022', '28/3/2022'],

            datasets: [{

                label: 'Donate',

                data: [12, 19, 3, 5, 2, 3, 2],

                backgroundColor: 'rgba(47, 159, 176, 0.71)',

                stack: 1

            }, {

                label: 'Mở khoá bài viết',

                data: [12, 19, 3, 5, 2, 3, 4],

                backgroundColor: 'rgba(255, 0, 0, 0.73)',

                stack: 1

            }, {

                label: 'Tip',

                data: [12, 19, 3, 5, 2, 3, 6],

                backgroundColor: 'rgba(255, 165, 52, 0.73)',

                stack: 1

            }, {

                label: 'VIP Member',

                data: [12, 19, 3, 5, 2, 3, 7],

                backgroundColor: 'rgba(46, 139, 87, 0.73)',

                stack: 1

            },]

        },

        options: {

            scales: {

                x: {

                    stacked: true,

                },

                y: {

                    stacked: true

                }

            },

            plugins: {

                title: {

                    display: true,

                    fontFamily: "Arial",

                    fontSize: 30,

                    padding: 30,

                    text: "Doanh thu theo ngày"

                }

            },



        }

    });
</script>
@endsection