<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        return view('backend.harga.index', compact('kecamatan'));
    }    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.harga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Harga::create([
            'komoditas' => $request->komoditas,
            'produk' => $request->produk,
            'harga' => $request->harga,
            'kecamatan' => $request->kecamatan,
        ]);
        return redirect()->route('harga.show', $request->kecamatan);
    }

    /**
     * Display the specified resource.
     */
    public function show($kecamatan)
    {
        session(['kecamatan' => $kecamatan]);
        $hargas = Harga::where('kecamatan', $kecamatan)->get();
        return view('backend.harga.show', compact('hargas','kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Harga $harga)
    {
        return view('backend.harga.edit', compact('harga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Harga $harga)
    {
        $harga->update([
            'komoditas' => $request->komoditas,
            'produk' => $request->produk,
            'harga' => $request->harga,
            'kecamatan' => $request->kecamatan,
        ]);
        return redirect()->route('harga.show', $request->kecamatan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Harga $harga)
    {
        // dd($harga);
        $harga->delete();
        return redirect()->route('harga.show', session('kecamatan'));
    }
}
