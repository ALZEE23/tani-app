<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pestisida;
use DataTables;

class PestisidaController extends Controller
{
    public function index()
    {
        $pestisidas = Pestisida::all();
        return view('teknologi.pestisida.index', compact('pestisidas'));
    }

    public function kimia()
    {
        $pestisidas = Pestisida::all();
        return view('teknologi.pestisida.kimia', compact('pestisidas'));
    }

    public function store()
    {
        return view('teknologi.pestisida.tambah');
    }

    public function tambah(Request $request)
    {
        // Validasi request
        $request->validate([
            'opt' => 'required|string',
            'bahan_aktif' => 'required|string',
            'produk' => 'required|string',
            // Sesuaikan validasi dengan kolom lainnya
        ]);

        // Membuat instance Pestisida
        $pestisida = new Pestisida([
            'opt' => $request->opt,
            'bahan_aktif' => $request->bahan_aktif,
            'produk' => $request->produk,
            // Sesuaikan atribut dengan kolom lainnya
        ]);

        // Menyimpan Pestisida ke database
        $pestisida->save();

        // Redirect dengan pesan sukses
        return redirect()->route('teknologi.pestisida.kimia')->with('success', 'Pestisida berhasil ditambahkan.');
    }

    public function search(Request $request)
    {
        $pestisidas = Pestisida::where('opt', 'like', '%' . $request->search . '%')
            ->orWhere('bahan_aktif', 'like', '%' . $request->search . '%')
            ->orWhere('produk', 'like', '%' . $request->search . '%')
            ->get();

        return view('teknologi.pestisida.kimia', compact('pestisidas'));
    }
}
