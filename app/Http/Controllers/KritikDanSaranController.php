<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KritikDanSaranController extends Controller
{
    function index()
    {
        return view('KritikDanSaran.index');
        Auth::user();
    }
}
