@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Lịch sử nhận Duo')

@section('content')
<div class="col-lg-9 col-12">

    <div class="aside">

        <h3>Lịch sử nhận Duo</h3>

        <div class="playerhistory-table">

            <div class="table-responsive">

                <table class="table table-striped table-bordered table-condensed table-hover">

                    <thead>

                        <tr>

                            <th>Mã Duo</th>

                            <th>Tạo lúc</th>

                            <th>Khách hàng</th>

                            <th>Thời gian thuê</th>

                            <th>Số tiền</th>

                            <th>Tình trạng</th>

                        </tr>

                    </thead>

                    <tbody></tbody>

                </table>

            </div>

        </div>

        <div class="text-center mt-20 col-md-12"><span>Không có dữ liệu</span></div>

    </div>

</div>
@endsection