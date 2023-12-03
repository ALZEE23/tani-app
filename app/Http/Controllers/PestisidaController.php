<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PestisidaController extends Controller
{
    //
     public function index(){
        return view('teknologi.pestisida.index');
    }



    public function organik(){
        return view('teknologi.pestisida.organik');
    }

    


    public function kimia(){
        return view('teknologi.pestisida.kimia');
    }
}
