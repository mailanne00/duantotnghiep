@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Ví')

@section('content')
    <div class="col-lg-9 col-12">

        <div class="aside">

            <h3>Ví</h3>

            <div class="row">

                <div class="wallet col-sm-6">

                    <div class="row">

                        <div class="col-sm-6 view"><label>Số dư hiện tại</label><br><span>0 đ</span></div>

                        <div class="col-sm-3 view-btn"><button type="button"><label><i
                                        class="fas fa-wallet"></i></label><br><span>Nạp thêm</span></button></div>

                        <div class="col-sm-3 view-btn"><button type="button"><label><i
                                        class="fas fa-money-bill-alt"></i></label><br><span>Rút tiền</span></button></div>

                    </div>

                </div>

            </div>

            <h3>LỊCH SỬ RÚT TIỀN</h3>

            <div class="history">

                <p>* Các lệnh rút tiền sẽ được chốt lúc 9:00 và duyệt từ 9:00 đến 17:00 hàng ngày. Trừ thứ 7, Chủ Nhật và
                    các ngày lễ.</p>

                <div class="table-responsive">

                    <table class="table table-striped table-bordered table-condensed table-hover">

                        <thead>

                            <tr>

                                <th>Thời gian</th>

                                <th>Rút về</th>

                                <th>Tài khoản</th>

                                <th>Số tiền</th>

                                <th>Tình trạng</th>

                                <th>chú thích</th>

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
