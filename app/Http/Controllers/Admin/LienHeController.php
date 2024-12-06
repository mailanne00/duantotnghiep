<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LienHe;
use Illuminate\Http\Request;

class LienHeController extends Controller
{
    public function index()
    {
        $lienHes = LienHe::all();
        return view('admin.lien-he.index', compact('lienHes'));
    }

    public function create()
    {
        return view('admin.lien-he.create');
    }

    public function store(Request $request)
    {
        $this->create($request->all());

        return redirect()->route('client.lienhe.index')->with(['success' => 1]);
    }

    public function show($id)
    {
        $lienHe = LienHe::query()->findOrFail($id);

        return view('admin.lien-he.show', compact('lienHe'));
    }
}
