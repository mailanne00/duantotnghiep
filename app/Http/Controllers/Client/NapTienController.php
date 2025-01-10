<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NapTienController extends Controller
{
    public function index()
    {
        return view('client.nap-tien.index');
    }

    public function create()
    {
        return view('client.nap-tien.create');
    }
}
