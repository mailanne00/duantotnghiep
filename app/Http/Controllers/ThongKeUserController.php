<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThongKeUserController extends Controller
{
    public function index()
    {
        $totalAccounts = User::count();
        $accountsThisMonth = User::whereMonth('created_at', Carbon::now()->month)
                                 ->whereYear('created_at', Carbon::now()->year)
                                 ->count();

        $accountsByDay = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                             ->groupBy('date')
                             ->get();

        // Tạo mảng dữ liệu cho biểu đồ
        $dates = $accountsByDay->pluck('date')->toArray();
        $counts = $accountsByDay->pluck('count')->toArray();

        return view('admin.tk-users.index', compact('totalAccounts', 'accountsThisMonth', 'dates', 'counts'));
    }
}
