@extends('admin.layout.app')

@section('title', 'Chi tiết tài khoản')

@section('content')
    <div class="row mb-n4">
        <div class="col-xl-6 col-md-6">
            <div class="card user-card user-card-1">
                <div class="card-header border-0 p-2 pb-0">
                    <div class="cover-img-block">
                        <img src="{{asset('assets/images/widget/slider5.jpg')}}" alt=""
                             class="img-fluid">
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="user-about-block text-center">
                        <div class="row align-items-end">
                            <div class="col"></div>
                            <div class="col"><img
                                    class="img-radius img-fluid wid-80"
                                    src="{{\Illuminate\Support\Facades\Storage::url($taiKhoan->anh_dai_dien)}}"
                                    alt="User image"></div>
                            <div class="col"></div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h6 class="mb-1 mt-3">{{$taiKhoan->ten}}</h6>
                        <p class="mb-3 text-muted">VIP 1</p>
                    </div>
                    <hr class="wid-80 b-wid-3 my-4 m-auto">
                    <div class="bg-c-blue counter-block m-t-10 p-20 rounded">
                        <div class="row">
                            <div class="col-4 text-center">
                                <i class="fas fa-calendar-check text-white f-20"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Số đơn hoàn thành"></i>
                                <h6 class="text-white mt-2 mb-0">56</h6>
                            </div>
                            <div class="col-4 text-center">
                                <i class="fas fa-star text-white f-20" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Đánh giá"></i>
                                <h6 class="text-white mt-2 mb-0">4.8</h6>
                            </div>
                            <div class="col-4 text-center">
                                <i class="fas fa-clock text-white f-20" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Số giờ được thuê"></i>
                                <h6 class="text-white mt-2 mb-0">189</h6>
                            </div>
                        </div>
                    </div>
                    <hr class="wid-80 b-wid-3 my-4 m-auto">
                    <div class="text-center">
                        <h6 class="mb-1">Thông tin client</h6>
                        <p class="mb-1">
                            anccdncdjcndjncjdncsjnckjnjnvdfnvxnvjvndfnvfdjnzvlvnlvnflvndjfvndkzjnvznvdjkvndznvdkz
                            fjdzjkvbzjkbdjvbdzjjhvbjdhvbhdj vh jdbjfhvbdfhvbhfbvjhfbvhjbdvhbvjbnckxjncjk
                            xvfjvhbx vhfbvxnvjfnvhbvjxnknjnvfvfvh jvnvnkjxfnvfk vnxfkvnxjkfvn vfjkvnfjvnfxlk
                            nvxfkjvnjxnv vjfvbfkdvnjfv vjfnvjnfjvnxf jfbvjxnvkxnfvkjv jkfvnxkvnx</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card user-card user-card-1">
                <div class="col mt-4">
                    <div class="row">
                        <div class="col-4">
                            <h6 style=" margin-left: 30px">Biệt danh</h6>
                        </div>
                        <div class="col">
                            <p >{{$taiKhoan->email}}</p>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="row">
                        <div class="col-4">
                            <h6 style=" margin-left: 30px">Email</h6>
                        </div>
                        <div class="col">
                            <p >{{$taiKhoan->email}}</p>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="row">
                        <div class="col-4">
                            <h6 style=" margin-left: 30px">Giới tính</h6>
                        </div>
                        <div class="col">
                            <p><img style="width: 30px;" src="{{$taiKhoan->gioi_tinh =='nam' ? 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Male_symbol_%28heavy_blue%29.svg/1200px-Male_symbol_%28heavy_blue%29.svg.png' : 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Venus_symbol_%28heavy_copper%29.svg/220px-Venus_symbol_%28heavy_copper%29.svg.png'}}" alt=""></p>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="row">
                        <div class="col-4">
                            <h6 style=" margin-left: 30px">Ngày sinh</h6>
                        </div>
                        <div class="col">
                            <p >{{$taiKhoan->ngay_sinh}}</p>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="row">
                        <div class="col-4">
                            <h6 style=" margin-left: 30px">Địa chỉ</h6>
                        </div>
                        <div class="col">
                            <p >{{$taiKhoan->dia_chi}}</p>
                        </div>
                    </div>
                </div>
                @if($taiKhoan->sdt != null)
                    <div class="col mt-3">
                        <div class="row">
                            <div class="col-4">
                                <h6 style=" margin-left: 30px">Số điện thoại</h6>
                            </div>
                            <div class="col">
                                <p >{{$taiKhoan->sdt}}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col mt-3">
                    <div class="row">
                        <div class="col-4">
                            <h6 style=" margin-left: 30px">Giá thuê 1 giờ</h6>
                        </div>
                        <div class="col">
                            <p>{{number_format($taiKhoan->so_du,0,',')}} VNĐ</p>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="row">
                        <div class="col-5" style="margin-left: 30px;">
                            <div class="card seo-card">
                                <div class="card-body seo-statustic">
                                    <i class="fas fa-money-bill-wave-alt text-c-blue f-16 mb-2"></i>
                                    <h5 class="m-0">{{number_format($taiKhoan->so_du, 0, ',')}} VNĐ</h5>
                                    <p class="m-0">Số dư</p>
                                </div>
                                <div class="process">
                                    <div id="process2" style="height:87px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="card seo-card">
                                <div class="card-body seo-statustic">
                                    <i class="fas fa-user text-c-red f-16 mb-2"></i>
                                    <h5 class="m-0">187</h5>
                                    <p class="m-0">Người theo dõi</p>
                                </div>
                                <div class="process">
                                    <div id="process3" style="height:87px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-footer')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        $(document).ready(function() {

            $(function() {
                // Themes begin
                am4core.useTheme(am4themes_animated);
                // Themes end

                // Create chart instance
                var chart = am4core.create("process2", am4charts.XYChart);
                // Add data
                chart.data = [{
                    "date": "2018-01-6",
                    "price": 168
                }, {
                    "date": "2018-01-7",
                    "price": 200
                }, {
                    "date": "2018-01-8",
                    "price": 170
                }, {
                    "date": "2018-01-9",
                    "price": 243
                }, {
                    "date": "2018-01-10",
                    "price": 210
                }, {
                    "date": "2018-01-11",
                    "price": 228
                }, {
                    "date": "2018-01-12",
                    "price": 180
                }, {
                    "date": "2018-01-13",
                    "price": 158
                }, {
                    "date": "2018-01-14",
                    "price": 200
                }, {
                    "date": "2018-01-15",
                    "price": 90
                }, {
                    "date": "2018-01-16",
                    "price": 175
                }];

                // Create axes
                var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                dateAxis.renderer.grid.template.location = 0;
                dateAxis.renderer.grid.template.disabled = true;
                dateAxis.startLocation = 0.6;
                dateAxis.endLocation = 0.4;
                dateAxis.renderer.labels.template.disabled = true;
                dateAxis.renderer.inside = true;

                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                valueAxis.logarithmic = false;
                valueAxis.renderer.minGridDistance = 1;
                valueAxis.renderer.grid.template.disabled = true;
                valueAxis.renderer.inside = true;
                valueAxis.renderer.labels.template.disabled = true;

                // Create series
                var series = chart.series.push(new am4charts.LineSeries());
                series.dataFields.valueY = "price";
                series.dataFields.dateX = "date";
                series.strokeWidth = 3;
                series.fillOpacity = 0.1;
                series.tensionX = 0.77;
                series.tooltipText = "{valueY.value}";
                series.fill = am4core.color("#19BCBF");
                series.stroke = am4core.color("#19BCBF");
                series.strokeWidth = 3;

                // Add cursor
                chart.cursor = new am4charts.XYCursor();
                chart.cursor.fullWidthLineX = true;
                chart.cursor.lineX.strokeWidth = 0;
                chart.cursor.lineX.fill = am4core.color("#fff");
                chart.cursor.lineX.fillOpacity = 0;
                chart.padding(0, 0, 0, 0);
            });

            $(function() {
                // Themes begin
                am4core.useTheme(am4themes_animated);
                // Themes end

                // Create chart instance
                var chart = am4core.create("process3", am4charts.XYChart);
                // Add data
                chart.data = [{
                    "date": "2018-01-6",
                    "price": 190
                }, {
                    "date": "2018-01-7",
                    "price": 158
                }, {
                    "date": "2018-01-8",
                    "price": 200
                }, {
                    "date": "2018-01-9",
                    "price": 90
                }, {
                    "date": "2018-01-10",
                    "price": 175
                }, {
                    "date": "2018-01-11",
                    "price": 228
                }, {
                    "date": "2018-01-12",
                    "price": 168
                }, {
                    "date": "2018-01-13",
                    "price": 200
                }, {
                    "date": "2018-01-14",
                    "price": 187
                }, {
                    "date": "2018-01-15",
                    "price": 243
                }, {
                    "date": "2018-01-16",
                    "price": 222
                }];

                // Create axes
                var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                dateAxis.renderer.grid.template.location = 0;
                dateAxis.renderer.grid.template.disabled = true;
                dateAxis.startLocation = 0.6;
                dateAxis.endLocation = 0.4;
                dateAxis.renderer.labels.template.disabled = true;
                dateAxis.renderer.inside = true;

                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                valueAxis.logarithmic = false;
                valueAxis.renderer.minGridDistance = 1;
                valueAxis.renderer.grid.template.disabled = true;
                valueAxis.renderer.inside = true;
                valueAxis.renderer.labels.template.disabled = true;

                // Create series
                var series = chart.series.push(new am4charts.LineSeries());
                series.dataFields.valueY = "price";
                series.dataFields.dateX = "date";
                series.strokeWidth = 3;
                series.fillOpacity = 0.1;
                series.tensionX = 0.77;
                series.tooltipText = "{valueY.value}";
                series.fill = am4core.color("#FF425C");
                series.stroke = am4core.color("#FF425C");
                series.strokeWidth = 3;

                // Add cursor
                chart.cursor = new am4charts.XYCursor();
                chart.cursor.fullWidthLineX = true;
                chart.cursor.lineX.strokeWidth = 0;
                chart.cursor.lineX.fill = am4core.color("#fff");
                chart.cursor.lineX.fillOpacity = 0;
                chart.padding(0, 0, 0, 0);
            });

        });
    </script>
@endsection
