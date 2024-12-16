<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VNPayController extends Controller
{
    public function createPayment(Request $request)
    {
        $vnp_TmnCode = env('VNP_TMN_CODE'); // Mã website tại VNPAY
        $vnp_HashSecret = env('VNP_HASH_SECRET'); // Chuỗi bí mật
        $vnp_Url = env('VNP_URL');
        $vnp_Returnurl = env('VNP_RETURN_URL');

        $vnp_TxnRef = uniqid(); // Mã giao dịch
        $vnp_OrderInfo = "Thanh toán hóa đơn";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $request->amount * 100; // Số tiền thanh toán (VND)
        $vnp_Locale = "vn"; // Ngôn ngữ
        $vnp_BankCode = $request->bank_code; // Mã ngân hàng (nếu có)
        $vnp_IpAddr = request()->ip(); // IP người dùng

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => now()->format('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        // Sắp xếp dữ liệu theo key
        ksort($inputData);
        $query = "";
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            $hashdata .= $key . "=" . $value . "&";
            $query .= urlencode($key) . "=" . urlencode($value) . "&";
        }

        $vnp_Url .= "?" . $query;
        $vnp_Url = rtrim($vnp_Url, "&");

        // Ký dữ liệu bằng HashSecret
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', rtrim($hashdata, "&"), $vnp_HashSecret);
            $vnp_Url .= "&vnp_SecureHash=" . $vnpSecureHash;
        }

        return redirect($vnp_Url);
    }

    public function paymentReturn(Request $request)
    {
        $vnp_HashSecret = env('VNP_HASH_SECRET'); // Chuỗi bí mật

        $inputData = $request->all();
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);
        unset($inputData['vnp_SecureHashType']);

        // Sắp xếp dữ liệu
        ksort($inputData);
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= $key . "=" . $value . "&";
        }
        $hashData = rtrim($hashData, "&");

        // Xác thực chữ ký
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash === $vnp_SecureHash) {
            if ($inputData['vnp_ResponseCode'] == '00') {
                return "Giao dịch thành công!";
            } else {
                return "Giao dịch thất bại!";
            }
        } else {
            return "Chữ ký không hợp lệ!";
        }
    }
}
