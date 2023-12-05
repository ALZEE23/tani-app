<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Gakpoktans;
use Illuminate\Http\Request;

class GakpoktansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desa = Desa::all();
        $gakpoktans = Gakpoktans::all();
        return view('backend.gakpoktan.index', compact('desa', 'gakpoktans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desa = Desa::all();
        return view('backend.gakpoktan.create', compact('desa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'desa' => 'required',
            'nama_gakpoktan' => 'required',
            'nama_ketua' => 'required',
            'pangan' => 'required|numeric',
            'berkebunan' => 'required|numeric',
            'holtikultura' => 'required|numeric',
            'peternakan' => 'required|numeric',
            'perikanan' => 'required|numeric',
            'kwt' => 'required|numeric',
            'notelepon' => 'required|numeric',
        ]);

        // Simpan data ke dalam model Gapoktan
        $gapoktan = new Gakpoktans();
        $gapoktan->desa = $validatedData['desa'];
        $gapoktan->nama_gakpoktan = $validatedData['nama_gakpoktan'];
        $gapoktan->nama_ketua = $validatedData['nama_ketua'];
        $gapoktan->pangan = $validatedData['pangan'];
        $gapoktan->berkebunan = $validatedData['berkebunan'];
        $gapoktan->hortikultura = $validatedData['holtikultura'];
        $gapoktan->peternakan = $validatedData['peternakan'];
        $gapoktan->perikanan = $validatedData['perikanan'];
        $gapoktan->kwt = $validatedData['kwt'];
        $gapoktan->no_telepopn = $validatedData['notelepon'];

        // Simpan data ke dalam database
        $gapoktan->save();

        // Redirect atau respons sesuai kebutuhan Anda
        return redirect('admin/gakpoktan')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gakpoktans $gakpoktans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gakpoktans $gakpoktan)
    {
        $desa = Desa::all();
        return view('backend.gakpoktan.edit', compact('desa', 'gakpoktan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gakpoktans $gakpoktan)
    {
        $validatedData = $request->validate([
            'desa' => 'required',
            'nama_gakpoktan' => 'required',
            'nama_ketua' => 'required',
            'pangan' => 'required|numeric',
            'berkebunan' => 'required|numeric',
            'holtikultura' => 'required|numeric',
            'peternakan' => 'required|numeric',
            'perikanan' => 'required|numeric',
            'kwt' => 'required|numeric',
            'notelepon' => 'required|numeric',
        ]);

        // Simpan data ke dalam model Gapoktan
        $gakpoktan->desa = $validatedData['desa'];
        $gakpoktan->nama_gakpoktan = $validatedData['nama_gakpoktan'];
        $gakpoktan->nama_ketua = $validatedData['nama_ketua'];
        $gakpoktan->pangan = $validatedData['pangan'];
        $gakpoktan->berkebunan = $validatedData['berkebunan'];
        $gakpoktan->hortikultura = $validatedData['holtikultura'];
        $gakpoktan->peternakan = $validatedData['peternakan'];
        $gakpoktan->perikanan = $validatedData['perikanan'];
        $gakpoktan->kwt = $validatedData['kwt'];
        $gakpoktan->no_telepopn = $validatedData['notelepon'];

        // Simpan data ke dalam database
        $gakpoktan->save();

        return redirect('admin/gakpoktan')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($gakpoktans)
    {
        $gakpoktans = Gakpoktans::findOrFail($gakpoktans);
        try {
            $gakpoktans->delete();
            return redirect()->route('gakpoktan.index')->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('gakpoktan.index')->with('error', 'Gagal menghapus data. Silakan coba lagi.');
        }
    }
}
