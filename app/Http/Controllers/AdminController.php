<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\User;
use App\Models\Pasar;
use App\Models\poktan;
use App\Models\Alsintan;
use App\Models\Kecamatan;
use App\Models\Gakpoktans;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dashboard(){
        $desa = Desa::count();
        $kecamatan = Kecamatan::count();
    $petani = User::where('role','petani')->count();
        $pasar = Pasar::count();
        $poktan = Poktan::count();
        $gakpoktan = Gakpoktans::count();
        $alsintan = Alsintan::count();

        if(auth()->user()->username == 'pip'){
            return redirect()->route('harga.index');
        }
        
        return view('backend.dashboard',compact('desa','kecamatan','petani','pasar','poktan','gakpoktan','alsintan'));
    }
}
