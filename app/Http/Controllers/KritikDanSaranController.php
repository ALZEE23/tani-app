<?php

namespace App\Http\Controllers;
use App\Models\KritikDanSaran;
use Illuminate\Http\Request;

class KritikDanSaranController extends Controller
{
    function index()
    {
        return view('KritikDanSaran.index');
    }

    public function store_KritikDanSaran(Request $request)
    {
        // Validate the request data
        $request->validate([
            'KritikDanSaran' => 'required',
        ]);

        // Create a new Saran record
        KritikDanSaran::create([
            'tanggal' => now(),
            'KritikDanSaran' => $request->input('KritikDanSaran'),
        ]);

        // You can add additional logic or redirect here
        return redirect('KritikDanSaran')->with('success', 'Data berhasil disimpan.');
    }

}
