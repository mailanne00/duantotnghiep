@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Trang chủ player')

@section('content')
<div class="col-lg-9 col-12">

    <div class="aside">

        <h3>Tổng quan</h3>

        <div class="row overview">

            <div class="col-lg-4 col-12">

                <div class="hotplayer">

                    <div class="card-item">

                        <div class="card-header"><i class="fas fa-fire"></i>

                            <p>Bạn Đang là<strong> Player</strong></p>

                        </div>

                        <div class="card-body">

                            <canvas id="playerChart" width="400" height="250"></canvas>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-8 col-12">

                <div class="row">

                    <div class="col-lg-4 col-12">

                        <div class="flowplayer">

                            <div class="card-item">

                                <div class="card-header">

                                    <p>DOANH THU 7 NGÀY</p>

                                </div>

                                <div class="card-body">0 đ

                                    <div class="progress">

                                        <div role="progressbar" class="progress-bar" aria-valuenow="[object Object]"
                                            aria-valuemin="0" aria-valuemax="200000"></div>

                                    </div>

                                </div>

                                <div class="card-footer">

                                    <p>Bạn cần <strong>200,000 đ</strong> nữa để trở thành <strong>Hot Player</strong>
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4 col-12">

                        <div class="flowplayer">

                            <div class="card-item">

                                <div class="card-header">

                                    <p>TOP DOANH THU 30 NGÀY</p>

                                </div>

                                <div class="card-body">Hạng 10354

                                    <div class="progress">

                                        <div role="progressbar" class="progress-bar" aria-valuenow="Hạng 10354"
                                            aria-valuemin="0" aria-valuemax="10354"></div>

                                    </div>

                                </div>

                                <div class="card-footer">

                                    <p><strong></strong></p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4 col-12">

                        <div class="flowplayer">

                            <div class="card-item">

                                <div class="card-header">

                                    <p>TỶ LỆ HOÀN THÀNH</p>

                                </div>

                                <div class="card-body">0 %

                                    <div class="progress">

                                        <div role="progressbar" class="progress-bar" aria-valuenow="0 %"
                                            aria-valuemin="0" aria-valuemax="50"></div>

                                    </div>

                                </div>

                                <div class="card-footer">

                                    <p>Bạn cần đạt <strong>80%</strong> để trở thành <strong>Hot Player</strong></p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4 col-12">

                        <div class="flowplayer">

                            <div class="card-item">

                                <div class="card-header">

                                    <p>LƯỢT ĐÁNH GIÁ</p>

                                </div>

                                <div class="card-body">0.00

                                    <div class="progress">

                                        <div role="progressbar" class="progress-bar" aria-valuenow="0.00"
                                            aria-valuemin="0" aria-valuemax="5" style="width: 0%;"></div>

                                    </div>

                                </div>

                                <div class="card-footer">

                                    <p>Bạn cần <strong>5</strong> để trở thành <strong>Hot Player</strong></p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4 col-12">

                        <div class="flowplayer">

                            <div class="card-item">

                                <div class="card-header">

                                    <p>ĐÁNH GIÁ TRUNG BÌNH</p>

                                </div>

                                <div class="card-body">0.00

                                    <div class="progress">

                                        <div role="progressbar" class="progress-bar" aria-valuenow="0.00"
                                            aria-valuemin="0" aria-valuemax="4" style="width: 0%;"></div>

                                    </div>

                                </div>

                                <div class="card-footer">

                                    <p>Bạn cần <strong>4</strong> để trở thành <strong>Hot Player</strong></p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <h3>Thống kê</h3>

        <div class="d-flex statistical">

            <div class="btn-group" role="group" aria-label="Basic example"><button type="button"
                    class="btn btn-secondary btn-danger">Ngày</button><button type="button"
                    class="btn btn-secondary false">Tháng</button></div>

        </div>

        <div class="chart">

            <canvas id="myChart" width="400" height="250"></canvas>

        </div>

    </div>

</div>
@endsection