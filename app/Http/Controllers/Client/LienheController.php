<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LienheController extends Controller
{
    public function index()
    {
        return view('client.lien-he.index');
    }

    public function create()
    {
        return view('client.lien-he.create');
    }

    public function store(Request $request)
    {
        $this->create($request->all());

        return redirect()->route('client.lienhe')->with(['success' => 1]);
    }
}
