<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pupuk;

class PupukController extends Controller
{
    public function index()
    {
        $pupuks = Pupuk::all();
        return view('teknologi.pupuk.index', compact('pupuks'));
    }

    public function padat()
    {
        $pupuks = Pupuk::where('kategori', 'padat')->get();
        return view('teknologi.pupuk.padat', compact('pupuks'));
    }

    public function cair()
    {
        $pupuks = Pupuk::where('kategori', 'cair')->get();
        return view('teknologi.pupuk.cair', compact('pupuks'));
    }

    public function store(){
        return view('teknologi.pupuk.tambah');
    }
   public function tambah(Request $request)
{
    // Validasi request
    $request->validate([
        'judul' => 'required|string|max:255',
        'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'file' => 'required|mimes:pdf,doc,docx,mp4,mov,avi|max:2048', // Menambahkan tipe file video
        'kategori' => 'required|string',
    ]);

    // Menyimpan file cover dan file
    $coverPath = $request->file('cover')->store('covers', 'public');
    $fileType = $request->file('file')->extension(); // Mendapatkan ekstensi file

    // Menyimpan file sesuai jenisnya
    $filePath = $request->file('file')->storeAs('files', "file_".time().".".$fileType, 'public');

    // Membuat instance Pupuk
    $pupuk = new Pupuk([
        'judul' => $request->judul,
        'cover' => $coverPath,
        'file' => $filePath,
        'kategori' => $request->kategori,
    ]);

    // Menyimpan Pupuk ke database
    $pupuk->save();

    // Redirect dengan pesan sukses
    $redirectRoute = ($request->kategori == 'Cair') ? 'cair' : 'padat';
    return redirect()->route($redirectRoute)->with('success', 'Pupuk berhasil ditambahkan.');
}


    public function productCart($id)
    {
        $pupuk = Pupuk::findOrFail($id);
        $cart = session()->get('pupuks', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "judul" => $pupuk->judul,
                "quantity" => 1,
                "cover" => $pupuk->cover,
                "file" => $pupuk->file
            ];
        }

        session()->put('pupuks', $cart);

        return redirect()->back()->with('success', 'Product has been added to cart');
    }
}
