<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use App\Models\Blog;
use App\Models\TaiKhoan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BaiVietController extends Controller
{
    const PATH_UPLOAD = 'public/blogs';
    public function index()
    {
        if (auth()->check()) {
            $taiKhoan = auth()->user();
        }else {
            $taiKhoan= null;
        }

        $baiViet = Blog::with(['binhLuans.taiKhoan'])
                ->orderBy('created_at', 'desc')
                ->get();

        foreach ($baiViet as $post) {
            $createdAt = Carbon::parse($post->created_at);
            $now = Carbon::now();

            $diffInMinutes = $createdAt->diffInMinutes($now);
            $diffInHours = $createdAt->diffInHours($now);
            $diffInDays = $createdAt->diffInDays($now);

            if ($diffInMinutes < 60) {
                $post->timeAgo = $diffInMinutes . ' phút trước';
            } elseif ($diffInHours < 24) {
                $post->timeAgo = $diffInHours . ' giờ trước';
            } elseif ($diffInDays < 2) {
                $post->timeAgo = '1 ngày trước';
            } else {
                $post->timeAgo = $diffInDays . ' ngày trước';
            }
        }

        return view('client.bai-viet.index', compact('taiKhoan', 'baiViet'));
    }

    public function create()
    {}

    public function store(Request $request)
    {
        if (auth()->check()) {

            $data = $request->except('anh');

            $data['tai_khoan_id'] = \auth()->id();

            if($request->hasFile('anh')){
                $data['anh'] = Storage::put(self::PATH_UPLOAD,$request->file('anh'));
            }

            Blog::create($data);
            return redirect()->route('client.baiViet')->with(['success' => 1]);

        }else {
            return redirect()->route('client.baiViet')->with(['error' => 2]);
        }
    }

    public function storeBinhLuan(Request $request)
    {
        if (auth()->check()) {

            BinhLuan::create([
                'noi_dung' => $request->noi_dung,
                'tai_khoan_id' => auth()->id(),
                'blog_id' => $request->blog_id,
            ]);

            return redirect()->back()->with('success', 'Thêm bình luận thành công.');
        } else {
            return redirect()->route('client.baiViet')->with(['error' => 2]);
        }
    }
}
