<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Organik;
use App\Models\Pestisida;
use Illuminate\Http\Request;
use App\Imports\TanamanImport;
use App\Imports\PestisidaImport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class PestisidaController extends Controller
{
    public function index()
    {
        $pestisidas = Pestisida::all();
        return view('teknologi.pestisida.index', compact('pestisidas'));
    }

    public function kimia()
    {
        $pestisidas = Pestisida::paginate(10);
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

    public function edit($id)
    {
        $organik = Organik::findOrFail($id);
        return view('teknologi.pestisida.edit', compact('organik'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'mimes:pdf,doc,docx,mp4,mov,avi|max:2048',
        ]);

        $organik= Organik::findOrFail($id);

        if ($request->hasFile('cover')) {
            Storage::disk('public')->delete($organik->cover);
            $coverPath = $request->file('cover')->store('covers', 'public');
            $organik->cover = $coverPath;
        }

        if ($request->hasFile('file')) {

            Storage::disk('public')->delete($organik->file);
            $fileType = $request->file('file')->extension();
            $filePath = $request->file('file')->storeAs('files', "file_" . time() . "." . $fileType, 'public');
            $organik->file = $filePath;

        }

        $organik->judul = $request->judul;
        $organik->save();

        return redirect()->route('pestisida.organik')->with('success', 'Pupuk berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $organik = Organik::findOrFail($id);
        Storage::disk('public')->delete([$organik->cover, $organik->file]);
        $organik->delete();

        return redirect()->route('pestisida.organik')->with('success', 'Pupuk berhasil dihapus.');
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
            'kelompok' => $request->kelompok,
            'komoditas' => $request->komoditas,
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
            ->orWhere('komoditas', 'like', '%' . $request->search . '%')
            ->orWhere('kelompok', 'like', '%' . $request->search . '%')
            ->paginate(10);

        return view('teknologi.pestisida.kimia', compact('pestisidas'));
    }

    public function import(Request $request)
    {
        try {
            // Validate the request to ensure it contains a valid Excel file
            $file = $request->file('pestisida');

            // Use the Excel facade to import data from the file using the TanamanImport class
            Excel::import(new PestisidaImport, $file);

            // Redirect back to the previous page with a success message
            return redirect()->back()->with('success', 'Data berhasil diimpor!');
        } catch (\Exception $e) {
            // Handle any exception that might occur during the import process
            return $e->getMessage();
        }
    }

  public function formexcel(){
    return view('teknologi.pestisida.import');
  }
    
}
