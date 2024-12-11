<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\LienHeStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LienheController extends Controller
{
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
        $validated = $request->validated();
        $this->create($validated);

        return redirect()->route('client.lienhe.create')->with(['success' => 1]);
    }
}
