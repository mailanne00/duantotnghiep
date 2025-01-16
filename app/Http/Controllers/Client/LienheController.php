<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\LienHeStoreRequest;
use App\Models\LienHe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LienheController extends Controller
{
    const PATH_UPLOAD = 'public/lienhe';
    public function index()
    {
        return view('client.lien-he.index');
    }

    public function create()
    {
        if (auth()->check()) {
            $taiKhoan = auth()->user();
        }else {
            $taiKhoan= null;
        }
        return view('client.lien-he.create', compact('taiKhoan'));
    }

    public function store(LienHeStoreRequest $request)
    {
        if (auth()->check()) {

            $validated = $request->validated();
            $data = $request->except('anh');

            $data['tai_khoan_id'] = \auth()->id();
            $data['ten'] = $request->ten;
            $data['email'] = $request->email;

            if($request->hasFile('anh')){
                $data['anh'] = Storage::put(self::PATH_UPLOAD,$request->file('anh'));
            }

            LienHe::create($data);
            return redirect()->route('client.lienhe.create')->with(['success' => 1]);

        }else {
            return redirect()->route('client.lienhe.create')->with(['error' => 2]);
        }

    }
}
