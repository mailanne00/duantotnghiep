<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThongKeUserController extends Controller
{
    public function index()
{
    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;

    $dates = [];
    $currentMonthCounts = [];
    $previousMonthCounts = [];

    // Lấy số lượng tài khoản mới cho từng ngày trong tháng hiện tại
    for ($i = 1; $i <= date('t'); $i++) {
        $date = Carbon::create($currentYear, $currentMonth, $i)->toDateString();
        $currentMonthCounts[$i] = User::whereDate('created_at', $date)->count();
        $dates[] = $i;
    }

    // Lấy số lượng tài khoản mới cho từng ngày trong tháng trước
    $previousMonth = Carbon::now()->subMonth()->month;
    $previousYear = Carbon::now()->subMonth()->year;

    for ($i = 1; $i <= date('t', strtotime("-1 month")); $i++) {
        $date = Carbon::create($previousYear, $previousMonth, $i)->toDateString();
        $previousMonthCounts[$i] = User::whereDate('created_at', $date)->count();
    }

    // Tổng số lượng tài khoản mới mỗi tháng
    $currentMonthTotal = array_sum($currentMonthCounts);
    $previousMonthTotal = array_sum($previousMonthCounts);

    // Trả về view với dữ liệu thống kê
    return view('admin.tk-users.index', compact('dates', 'currentMonthCounts', 'previousMonthCounts', 'currentMonthTotal', 'previousMonthTotal'));
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
