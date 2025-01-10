<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\LichSuNap;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class VNPayController extends Controller
{
    public function createPayment(Request $request)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/payment/vnpay-return";
        $vnp_TmnCode = "3IUNM2HN";//Mã website tại VNPAY 
        $vnp_HashSecret = "DX201U9LELI35TB4G647D36B9WPG2OU7"; //Chuỗi bí mật
        $napTien = LichSuNap::create([
            'tai_khoan_id' => auth()->id(),
            'so_tien' => $request->amount,
            'trang_thai' => 'Đang chờ xử lý',
        ]);

        $vnp_TxnRef = $napTien->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này 
        $vnp_OrderInfo = "Nạp tiền cho user";
        $vnp_OrderType = "PLayer Duo";
        $vnp_Amount = $request->amount * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = "";
        $vnp_IpAddr = $request->ip();
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        
        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        
        return redirect($vnp_Url);
    }

    public function paymentReturn(Request $request)
    {
       $thanhToan = LichSuNap::find($request->vnp_TxnRef);
       $taiKhoan = TaiKhoan::find($thanhToan->tai_khoan_id);
       $taiKhoan->update([
           'so_du' => $taiKhoan->so_du + $thanhToan->so_tien,
       ]);
       $thanhToan->update([
           'trang_thai' => 'Đã thanh toán',
       ]);

       return redirect()->route('client.index')->with('success', 'Nạp tiền thành công');
    }
}
