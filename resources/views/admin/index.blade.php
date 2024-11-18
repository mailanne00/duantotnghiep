@extends('admin.layout.app')

@section('header')
    <link rel="stylesheet" href="{{asset('assets-admin/plugins/chart-nvd3/css/nv.d3.min.css')}}">

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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Discrete Bar Chart</h5>
                </div>
                <div class="card-body">
                    <div id="nvd3-bar-1" class="nvd-chart" style="height: 300px"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-footer')
    <script src="assets/plugins/chart-nvd3/js/d3.min.js"></script>
    <script src="assets/plugins/chart-nvd3/js/nv.d3.min.js"></script>
    <script src="assets/plugins/chart-nvd3/js/stream_layers.js"></script>
    <script src="assets/js/pages/chart-nvd3-custom.js"></script>
@endsection

