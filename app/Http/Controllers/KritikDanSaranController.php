<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\KritikDanSaran;

class KritikDanSaranController extends Controller
{
    function index()
    {
        if (auth()->user()->role == 'dinas' || auth()->user()->role == 'petugas') {
            $kritikdansaran = KritikDanSaran::all();
            $kecamatan = Kecamatan::all();
            return view('KritikDanSaran.index1',compact('kritikdansaran','kecamatan'));

        }
        $desa = Desa::all();
        return view('KritikDanSaran.index',compact('desa'));
    }

    public function store_KritikDanSaran(Request $request)
    {
        // Validate the request data
        $request->validate([
            'KritikDanSaran' => 'required',
        ]);

        // Create a new Saran record
        $desa = Desa::where('desa', $request->desa)->first();
        KritikDanSaran::create([
            'tanggal' => now(),
            'KritikDanSaran' => $request->input('KritikDanSaran'),
            'desa' => $request->desa,
            'kecamatan' => $desa->kecamatan,
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
