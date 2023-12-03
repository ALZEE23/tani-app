<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PupukController extends Controller
{
    //
    public function index(){
        return view('teknologi.pupuk.index');
    }



    public function padat(){
        return view('teknologi.pupuk.padat');
    }

    


    public function cair(){
        return view('teknologi.pupuk.cair');
    }
}
