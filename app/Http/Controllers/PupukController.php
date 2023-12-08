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
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
            'kategori' => 'required|string',
        ]);

        // Menyimpan file cover dan file
        $coverPath = $request->file('cover')->store('covers', 'public');
        $filePath = $request->file('file')->store('files', 'public');

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
        return redirect()->route('padat')->with('success', 'Pupuk berhasil ditambahkan.');
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
