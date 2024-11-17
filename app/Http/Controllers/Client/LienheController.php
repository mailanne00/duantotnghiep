<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class LienheController extends Controller
{
    public function index()
    {
        return view('client.lien-he.index');
    }
}
