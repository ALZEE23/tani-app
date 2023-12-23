<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Budidaya;

class BudidayaController extends Controller
{
    //
     public function index(){
        return view('teknologi.budidaya.index');
    }



    public function hortikultura (){
        $budidayas = Budidaya::where('kategori', 'hortikultura')->get();
        return view('teknologi.budidaya.hortikultura',compact('budidayas'));
    }

    


    public function pangan(){
        $budidayas = Budidaya::where('kategori', 'Pangan')->get();
        return view('teknologi.budidaya.pangan',compact('budidayas'));
    }
    

    
    public function perkebunan(){
        $budidayas = Budidaya::where('kategori', 'Perkebunan')->get();
        return view('teknologi.budidaya.perkebunan', compact('budidayas'));
    }

    public function store(){
        return view('teknologi.budidaya.tambah');
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
    $budidaya = new Budidaya([
        'judul' => $request->judul,
        'cover' => $coverPath,
        'file' => $filePath,
        'kategori' => $request->kategori,
    ]);

    // Menyimpan Pupuk ke database
    $budidaya->save();

    // Redirect dengan pesan sukses
    $kategori = $request->kategori;

if ($kategori == 'Hortikultura') {
    $redirectRoute = 'hortikultura';
} elseif ($kategori == 'Pangan') {
    $redirectRoute = 'pangan';
} elseif ($kategori == 'Perkebunan') {
    $redirectRoute = 'perkebunan';
} else {
    // Default route jika kategori tidak sesuai dengan yang diharapkan
    $redirectRoute = 'home';
}

return redirect()->route($redirectRoute)->with('success', 'Pupuk berhasil ditambahkan.');
}
public function edit($id)
    {
        $budidaya = Budidaya::findOrFail($id);
        return view('teknologi.budidaya.edit', compact('budidaya'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'mimes:pdf,doc,docx,mp4,mov,avi|max:2048',
        ]);

        $budidaya = Budidaya::findOrFail($id);

        if ($request->hasFile('cover')) {
            Storage::disk('public')->delete($pencegahan->cover);
            $coverPath = $request->file('cover')->store('covers', 'public');
            $budidaya->cover = $coverPath;
        }

        if ($request->hasFile('file')) {

            Storage::disk('public')->delete($budidaya->file);
            $fileType = $request->file('file')->extension();
            $filePath = $request->file('file')->storeAs('files', "file_" . time() . "." . $fileType, 'public');
            $budidaya->file = $filePath;

        }

        $budidaya->judul = $request->judul;
        $budidaya>save();

        $kategori = $request->kategori;

if ($kategori == 'Hortikultura') {
    $redirectRoute = 'hortikultura';
} elseif ($kategori == 'Pangan') {
    $redirectRoute = 'pangan';
} elseif ($kategori == 'Perkebunan') {
    $redirectRoute = 'perkebunan';
} else {
    // Default route jika kategori tidak sesuai dengan yang diharapkan
    $redirectRoute = 'home';
}

return redirect()->route($redirectRoute)->with('success', 'Pupuk berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $budidaya = Budidaya::findOrFail($id);
        Storage::disk('public')->delete([$budidaya->cover, $budidaya->file]);
        $budidaya->delete();

        
    // Default route jika kategori tidak sesuai dengan yang diharapkan
    $redirectRoute = 'budidaya';

return redirect()->route($redirectRoute)->with('success', 'Pupuk berhasil ditambahkan.');
    }

    
}
