<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class ChiTietPlayerController extends Controller
{
    public function index()
    {
        return view('client.players.index');
    }
}
