<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThongKeUserController extends Controller
{
    public function index()
    {
        $counts = [];
        $dates = [];
    
        // Giả sử bạn lấy số lượng tài khoản mới theo ngày trong tháng này
        for ($i = 1; $i <= date('t'); $i++) {
            $counts[$i] = User::whereDate('created_at', Carbon::now()->year . '-' . Carbon::now()->month . '-' . $i)->count();
            $dates[] = $i;
        }
    
        // Trả về view
        return view('admin.tk-users.index', compact('counts', 'dates'));
    }
    
    // Thêm một phương thức mới để trả về dữ liệu JSON cho biểu đồ
    public function getStatisticsData()
    {
        // Giả sử muốn thống kê số tài khoản thêm mới trong tháng hiện tại
        $dates = [];
        $counts = [];
    
        // Duyệt từng ngày trong tháng hiện tại
        for ($i = 1; $i <= date('t'); $i++) {
            $date = Carbon::create(Carbon::now()->year, Carbon::now()->month, $i)->toDateString();
    
            // Lấy số lượng tài khoản mới cho mỗi ngày
            $count = User::whereDate('created_at', $date)->count();
    
            $dates[] = $i;  // Số ngày
            $counts[] = $count; // Số lượng tài khoản mới trong ngày đó
        }
    
        return response()->json(['dates' => $dates, 'counts' => $counts]);
    }
}
