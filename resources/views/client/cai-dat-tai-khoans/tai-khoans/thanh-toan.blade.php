@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Thanh toán')

@section('content')
    <div class="col-lg-9 col-12">

        <div class="aside">

            <h3>Cài đặt thanh toán</h3>

            <form class="withdraw-form row">

                <div class="col-md-6"><label>Cổng thanh toán:</label><select name="bankName">
                        <option value="0" disabled="">--- Chọn ngân hàng ---</option>
                        <option value="Vietcombank">Vietcombank</option>
                        <option value="Vietinbank">Vietinbank</option>
                        <option value="BIDV">BIDV</option>
                        <option value="Sacombank">Sacombank</option>
                        <option value="Á Châu">Á Châu</option>
                        <option value="MBBank">MBBank</option>
                        <option value="Techcombank">Techcombank</option>
                        <option value="DongA">Đông Á</option>
                        <option value="VP bank">VP bank</option>
                        <option value="Eximbank">Eximbank</option>
                        <option value="TP bank">TP bank</option>
                        <option value="Ocean bank">Ocean bank</option>
                        <option value="OCB">OCB</option>
                        <option value="SHBank">SHBank</option>
                    </select>

                    <div class="fieldGroup ">

                        <p class="control-label">Chủ tài khoản:</p><input type="text" name="bankAccountName"
                            placeholder="Ví dụ: NGUYEN VAN A" maxlength="100" autocomplete="false" value="">
                    </div>

                    <div class="fieldGroup ">

                        <p class="control-label">Số tài khoản:</p><input type="text" name="bankAccountNumber"
                            placeholder="Ví dụ: 0123456789" maxlength="100" autocomplete="false" value="">
                    </div>

                    <hr><button type="submit" class="btn-update">Cập nhật</button>
                </div>

            </form>

        </div>

    </div>
@endsection
