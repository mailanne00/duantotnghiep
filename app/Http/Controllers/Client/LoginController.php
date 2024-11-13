<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {

        return view('client.login.index');
    }
}
