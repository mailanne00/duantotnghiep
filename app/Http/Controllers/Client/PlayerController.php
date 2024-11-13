<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index(){
        return view('client.players.index');
    }
    public function show(){
        return view('client.players.show');
    }
}
