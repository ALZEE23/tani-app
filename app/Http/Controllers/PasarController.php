<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\Pasar;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        $pasars = Pasar::where('kecamatan',Auth::user()->kecamatan)->get();
        return view('pasar.index', compact('pasars','kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('pasar.tambah',compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pasar = new Pasar();
        $pasar->nama_pemilik = $request->nama;
        $pasar->alamat_lokasi = $request->alamat;
        $pasar->link_gmap = $request->link_gmap;
        $pasar->kontak_pemilik = $request->kontak_pemilik;
        $pasar->sub_sektor = $request->sub_sektor;
        $pasar->komoditas = $request->komoditas;
        $pasar->kecamatan = $request->kecamatan;
        if ($request->hasFile('foto')) {
            $filename = $request->file('foto');
            $filenamefoto = time() . '_' . $filename->getClientOriginalName();
            $filename->storeAs('public/foto', $filenamefoto);
            $pasar->foto = $filenamefoto;

        $pasar->save();
        return redirect()->route('pasar.index');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Pasar $pasar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasar $pasar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasar $pasar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
     function delete_pasar($id){
        $pasar = Pasar::find($id);
        $pasar->delete();
        return redirect('pasar.index')->with('success', 'Data berhasil dihapus.');
    }

    public function filter($id)
    {
        $kecamatan = Kecamatan::all();
        $pasars = Pasar::where('kecamatan', $id)->get();
        $harga = Harga::where('kecamatan', $id)->get();
        $pasars = Pasar::where('kecamatan', Auth::user()->kecamatan)->get();
        return view('pasar.index2', compact('pasars', 'kecamatan','id','harga'));
    }
}
