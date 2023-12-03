<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BudidayaController extends Controller
{
    //
     public function index(){
        return view('teknologi.budidaya.index');
    }



    public function hortikultura (){
        return view('teknologi.budidaya.hortikultura');
    }

    


    public function pangan(){
        return view('teknologi.budidaya.pangan');
    }
    

    
    public function perkebunan(){
        return view('teknologi.budidaya.perkebunan');
    }
}
