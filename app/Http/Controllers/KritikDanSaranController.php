<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\KritikDanSaran;
use Illuminate\Http\Request;

class KritikDanSaranController extends Controller
{
    function index()
    {
        if (auth()->user()->role == 'dinas' || auth()->user()->role == 'petugas') {
            $kritikdansaran = KritikDanSaran::all();
            $kecamatan = Kecamatan::all();
            return view('KritikDanSaran.index1',compact('kritikdansaran','kecamatan'));

        }
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
            'kecamatan' => auth()->user()->kecamatan,
        ]);

        // You can add additional logic or redirect here
        return redirect('home')->with('success', 'Data berhasil disimpan.');
    }

    function filter(Request $request)
    {
        $data = KritikDanSaran::query();

        // Lakukan filter berdasarkan permintaan
        if ($request->desa) {
            $data->where('kecamatan', $request->desa);
        }

        if ($request->tahun) {
            $data->whereYear('tanggal', $request->tahun);
        }

        $filteredData = $data->get();

        return response()->json(['data_sekarang' => $filteredData]);
    }
}
