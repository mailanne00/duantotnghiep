<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DangTin;
use Illuminate\Support\Facades\Auth;
class DangTinController extends Controller
{

    public function index(){
        $baiDang = DangTin::with('taiKhoan')
        ->orderBy('created_at', 'desc')
        ->limit(100) 
        ->get();
    
        return view('client.dang-tin.index', ['baiDang' => $baiDang]);
    }
    
    public function create(Request $request){
        if (!Auth::check()) {
            return redirect()->route('client.login')->with('error', 'Bạn cần đăng nhập để đăng tin.');
        }
        $request->validate([
            'video' => 'required|file|mimes:mp4,avi,mkv|max:10240',
            'noi_dung' => 'required',
        ]);
    

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public'); 
        } else {
            return back()->with('error', 'Video không thể tải lên.');
        }
    
        $tai_khoan_id = Auth::user()->id;
        DangTin::create([
            'tai_khoan_id' => $tai_khoan_id,
            'video' => $videoPath, 
            'noi_dung' => $request->noi_dung,
        ]);
    
        return redirect()->route('client.index')->with('success', 'Đăng tin thành công!');
    }
    
}
