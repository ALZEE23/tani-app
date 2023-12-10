<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pestisida;
use App\Models\Pencegahan;
use DataTables;

class PencegahanController extends Controller
{
    public function index()
    {
        $pencegahans = Pencegahan::all();
        return view('teknologi.pencegahan.index', compact('pencegahans'));
    }

    public function store(){
        $pencegahans = Pencegahan::all();
        return view('teknologi.pencegahan.tambah', compact('pencegahans'));
    }

    public function tambah(Request $request){
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
    $pencegahan = new Pencegahan([
        'judul' => $request->judul,
        'cover' => $coverPath,
        'file' => $filePath,
    ]);

    // Menyimpan Pupuk ke database
    $pencegahan->save();

    // Redirect dengan pesan sukses
    return redirect()->route('pencegahan')->with('success', 'Pupuk berhasil ditambahkan.');
    }

    

    
}
