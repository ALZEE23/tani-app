<?php

namespace App\Http\Controllers;

use App\Models\desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desa = Desa::all();
        return view('backend.desa.index', compact('desa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.desa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $desa = new Desa();
        $desa->desa = $request->desa;
        $desa->save();
        return redirect()->route('desa.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Desa $desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Desa $desa)
    {
        return view('backend.desa.edit', compact('desa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Desa $desa)
    {
        $desa->desa = $request->desa;
        $desa->save();
        return redirect()->route('desa.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desa $desa)
    {
        try {
            $desa->delete();
            return redirect()->route('desa.index')->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('desa.index')->with('error', 'Gagal menghapus data. Silakan coba lagi.');
        }
    }
}
