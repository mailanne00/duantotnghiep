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
        $counts = [];
        $dates = [];
    
        for ($i = 1; $i <= date('t'); $i++) {
            $counts[$i] = User::whereDate('created_at', Carbon::now()->year . '-' . Carbon::now()->month . '-' . $i)->count();
            $dates[] = $i;
        }
    
        return response()->json(['dates' => $dates, 'counts' => $counts]);
    }
}
