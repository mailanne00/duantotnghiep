@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Lịch sử tạo code')

@section('content')
<div class="col-lg-9 col-12">

    <div class="aside">

        <h3>Lịch sử tạo Code</h3>

        <div class="transaction-table">

            <div class="table-responsive">

                <table class="table table-striped table-bordered table-condensed table-hover">

                    <thead>

                        <tr>

                            <th>Thời gian tạo code</th>

                            <th>Mệnh giá</th>

                            <th>Số seri</th>

                            <th>Mã code</th>

                            <th>Thời gian sử dụng</th>

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