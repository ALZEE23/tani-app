<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pupuk;

class PupukController extends Controller
{
    //
    public function index(){
        $pupuks = Pupuk::all();
        return view('teknologi.pupuk.index', compact('pupuks'));
    }



    public function padat(){
        return view('teknologi.pupuk.padat');
    }

    public function cair(){
        return view('teknologi.pupuk.cair');
    }

    public function tambah(){
        return view('teknologi.pupuk.tambah');
    }

    public function productCart(){
        $pupuk = Pupuk::findOrFail($id);
        $cart = session()->get('pupuks', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "judul" => $pupuk->judul,
                "quantity" => 1,
                "cover" => $pupuk->cover,
                "file" => $pupuk->file
            ];
        }

        session()->put('pupuks', $cart);
        return redirect()->back()->with('succes', 'product has been added to cart');
        
    }
    

}
