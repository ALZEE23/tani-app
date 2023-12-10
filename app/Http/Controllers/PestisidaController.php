<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pestisida;
use App\Models\Organik;
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
    public function organik()
    {
        $organiks = Organik::all();
        return view('teknologi.pestisida.organik', compact('organiks'));
    }

    public function store_organik(){
        $organiks = Organik::all();
        return view('teknologi.pestisida.tambah_organik', compact('organiks'));
    }

    public function tambah_organik(Request $request){
        $request->validate([
        'judul' => 'required|string|max:255',
        'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'file' => 'required|mimes:pdf,doc,docx,mp4,mov,avi|max:2048', // Menambahkan tipe file video
    ]);

    // Menyimpan file cover dan file
    $coverPath = $request->file('cover')->store('covers', 'public');
    $fileType = $request->file('file')->extension(); // Mendapatkan ekstensi file

    // Menyimpan file sesuai jenisnya
    $filePath = $request->file('file')->storeAs('files', "file_".time().".".$fileType, 'public');

    // Membuat instance Pupuk
    $organik = new Organik([
        'judul' => $request->judul,
        'cover' => $coverPath,
        'file' => $filePath,
    ]);

    // Menyimpan Pupuk ke database
    $organik->save();

    // Redirect dengan pesan sukses
    return redirect()->route('pestisida.organik')->with('success', 'Pupuk berhasil ditambahkan.');
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
        return redirect()->route('pestisida.kimia')->with('success', 'Pestisida berhasil ditambahkan.');
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
