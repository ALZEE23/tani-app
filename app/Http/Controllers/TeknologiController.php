<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pupuk;
use App\Models\Pencegahan;
use App\Models\Pestisida;
use App\Models\Budidaya;
use Illuminate\Support\Facades\Storage;

class TeknologiController extends Controller
{
    //
    public function index(){
        return view('teknologi.index');
    }

   public function backend(Request $request)
{
    $selectedModel = $request->input('model', 'pupuk');
    $pupuks = Pupuk::all();
    $pestisidas = Pestisida::all();
    $budidayas = Budidaya::all();
    $pencegahans = Pencegahan::all();

    $data = [];

    // Pilih model yang sesuai berdasarkan dropdown
    switch ($selectedModel) {
        case 'pupuk':
            $data = $pupuks;
            break;
        case 'pestisida':
            $data = $pestisidas;
            break;
        case 'budidaya':
            $data = $budidayas;
            break;
        case 'pencegahan':
            $data = $pencegahans;
            break;
        default:
            $data = $pupuks;
            break;
    }

    return view('backend.teknologi.index', compact('data'));
}

public function store(){
    return view('backend.teknologi.create');
}

public function tambah(Request $request)
{
    // Validasi request sesuai kebutuhan

    $model = $request->input('model');

    switch ($model) {
        case 'pupuk':
            
            // Logika penyimpanan untuk model 'pupuk'
            $pupuk = new Pupuk([
                'judul' => $request->judul,
                'cover' => $request->file('cover')->store('covers', 'public'),
                'file' => $request->file('file')->storeAs('files', "file_".time().".".$request->file('file')->extension(), 'public'),
                'kategori' => $request->kategori,
            ]);

            $pupuk->save();

            return redirect()->route('nama_route_pupuk')->with('success', 'Pupuk berhasil ditambahkan.');

            break;
        case 'pestisida-organik':
            // Logika penyimpanan untuk model 'pestisida'
            // Implementasi serupa dengan 'pupuk'
             $organik = new Organik([
                'judul' => $request->judul,
                'cover' => $request->file('cover')->store('covers', 'public'),
                'file' => $request->file('file')->storeAs('files', "file_".time().".".$request->file('file')->extension(), 'public'),
            ]);

            $organik->save();

            return redirect()->route('nama_route_pupuk')->with('success', 'Pupuk berhasil ditambahkan.');

            break;

        case 'pestisida-kimia':
            // Logika penyimpanan untuk model 'pestisida'
            // Implementasi serupa dengan 'pupuk'
            $pestisida = new Pestisida([
            'opt' => $request->opt,
            'bahan_aktif' => $request->bahan_aktif,
            'produk' => $request->produk,
            // Sesuaikan atribut dengan kolom lainnya
            ]);

        // Menyimpan Pestisida ke database
            $pestisida->save();
            return redirect()->route('nama_route_pupuk')->with('success', 'Pupuk berhasil ditambahkan.');

            break;

        case 'budidaya':
    $request->validate([
        'judul' => 'required|string|max:255',
        'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:204800',
        'file' => 'required|mimes:pdf,doc,docx,mp4,mov,avi|max:20480000',
        'kategori' => 'required|string',
    ]);

    $coverPath = $request->file('cover')->store('covers', 'public');
    $fileType = $request->file('file')->extension();
    $filePath = $request->file('file')->storeAs('files', "file_".time().".".$fileType, 'public');

    $budidaya = new Budidaya([
        'judul' => $request->judul,
        'cover' => $coverPath,
        'file' => $filePath,
        'kategori' => $request->kategori,
    ]);

    $budidaya->save();
    return redirect()->route('teknologi.backend')->with('success', 'Budidaya berhasil ditambahkan.');
    break;


        case 'pencegahan':
            // Logika penyimpanan untuk model 'pencegahan'
            // Implementasi serupa dengan 'pupuk'
            $pencegahan = new Pencegahan([
                'judul' => $request->judul,
                'cover' => $request->file('cover')->store('covers', 'public'),
                'file' => $request->file('file')->storeAs('files', "file_".time().".".$request->file('file')->extension(), 'public'),
            ]);

            $pencegahan->save();

            return redirect()->route('nama_route_pupuk')->with('success', 'Pupuk berhasil ditambahkan.');

            break;

        default:
            // Tindakan default jika model tidak dikenali
            break;
    }

    // Redirect atau berikan respons sesuai kebutuhan
}


}