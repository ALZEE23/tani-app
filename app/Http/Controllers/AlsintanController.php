<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alsintan;
use App\Controllers\KecamatanController;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Exports\AlsintanExport;
use Maatwebsite\Excel\Facades\Excel;

class AlsintanController extends Controller
{
    //
      public function index(Request $request)
    {
        $kecamatans = Kecamatan::all();
        $subsektorFilter = $request->input('subsektor_filter', ''); // Memberikan nilai default berupa string kosong
        $kecamatanFilter = $request->input('kecamatan_filter', ''); // Memberikan nilai default berupa string kosong

        $alsintans = Alsintan::when($kecamatanFilter, function ($query) use ($kecamatanFilter) {
            return $query->where('kecamatan', $kecamatanFilter);
        })->when($subsektorFilter, function ($query) use ($subsektorFilter) {
            return $query->where('subsektor', $subsektorFilter);
        })->get();

        // Mendapatkan data subsektor untuk dropdown
        $subsektors = Alsintan::select('subsektor')->distinct()->get();

        return view('alsintan.index', compact('alsintans', 'kecamatans', 'kecamatanFilter', 'subsektors', 'subsektorFilter'));
    }   
    

    public function store()
    {
        $desa = Desa::all();
        $kecamatan = Kecamatan::all();
        return view('alsintan.tambah',compact('kecamatan','desa'));
    }

    public function filterByKecamatan(Request $request)
{
    $kecamatanFilter = $request->input('kecamatan_filter');

    $desaOptions = Desa::where('kecamatan', $kecamatanFilter)->pluck('desa');

    return response()->json($desaOptions);
}


    public function fetchDesaOptions(Request $request)
{
    $kecamatan = $request->input('kecamatan');
    $desaOptions = Desa::where('kecamatan', $kecamatan)->pluck('desa');

    return response()->json($desaOptions);
}
    public function tambah(Request $request)
    {
        // Validasi request
        $request->validate([
            'kecamatan' => 'required|string',
            'desa' => 'required|string',
            'subsektor' => 'required|string',
            'gapoktan' => 'required|string',
            'ketua_gapoktan' => 'required|string',
            'kontak' => 'required|string',
            'alat' => 'required|string',
            'jumlah_alat' => 'required|string',
            'tahun' => 'required|string',
            // Sesuaikan validasi dengan kolom lainnya
        ]);

        // Membuat instance Pestisida
        $alsintan = new Alsintan([
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'subsektor' => $request->subsektor,
            'gapoktan' => $request->gapoktan,
            'ketua_gapoktan' => $request->ketua_gapoktan,
            'kontak' => $request->kontak,
            'alat' => $request->alat,
            'jumlah_alat' => $request->jumlah_alat,
            'tahun' => $request->tahun,
            // Sesuaikan atribut dengan kolom lainnya
        ]);

        // Menyimpan Pestisida ke database
        $alsintan->save();

        
        // Redirect dengan pesan sukses
        return redirect()->route('alsintan')->with('success', 'Pestisida berhasil ditambahkan.');
    }

    public function exportToExcel()
{
    return Excel::download(new AlsintanExport, 'alsintan.xlsx');
}

//     public function backend(){
//          $kecamatans = Kecamatan::all();
//         $subsektorFilter = $request->input('subsektor_filter', ''); // Memberikan nilai default berupa string kosong
//         $kecamatanFilter = $request->input('kecamatan_filter', ''); // Memberikan nilai default berupa string kosong

//         $alsintans = Alsintan::when($kecamatanFilter, function ($query) use ($kecamatanFilter) {
//             return $query->where('kecamatan', $kecamatanFilter);
//         })->when($subsektorFilter, function ($query) use ($subsektorFilter) {
//             return $query->where('subsektor', $subsektorFilter);
//         })->get();

//         // Mendapatkan data subsektor untuk dropdown
//         $subsektors = Alsintan::select('subsektor')->distinct()->get();
//         return view('backend.alsintan.index', compact('alsintans', 'kecamatans', 'kecamatanFilter', 'subsektors', 'subsektorFilter'));
//     }

// public function storeBackend()
//     {
//         $desa = Desa::all();
//         $kecamatan = Kecamatan::all();
//         return view('alsintan.tambah',compact('kecamatan','desa'));
//     }

//     public function filterByKecamatanBackend(Request $request)
// {
//     $kecamatanFilter = $request->input('kecamatan_filter');

//     $desaOptions = Desa::where('kecamatan', $kecamatanFilter)->pluck('desa');

//     return response()->json($desaOptions);
// }
}
