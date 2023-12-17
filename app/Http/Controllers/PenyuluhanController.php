<?php

namespace App\Http\Controllers;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Rencana;
use App\Models\Penyuluh;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;

class PenyuluhanController extends Controller
{
    function index()
    {
        return view('penyuluhan.index');
    }

    function rencana()
    {
        $rencana = Rencana::all();
        $desa = Desa::all();
        $kecamatan = Kecamatan::all();
        $penyuluh = Penyuluh::pluck('nama');
        return view('penyuluhan.rencana.index', compact('rencana','kecamatan','desa','penyuluh'));
    }
    function tambah_rencana()
    {
        return view('penyuluhan.rencana.tambah');
    }

      
    public function store_rencana(Request $request)
    {
        // Validasi data yang dikirimkan oleh formulir
        $request->validate([
            'bulan' => 'required|string',
            'tahun' => 'required|int',
            'kecamatan' => 'required|string',
            'desa' => 'required|string',
            'penyuluh' => 'required|string',
            'tanggal' => 'required|date',
            'rencana_kegiatan' => 'required|string',
        ]);
    
        // Gunakan $request->penyuluh bukan $request->all()
        $data = [
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'penyuluh' => $request->penyuluh,
            'tanggal' => $request->tanggal,
            'rencana_kegiatan' => $request->rencana_kegiatan,
        ];
    
        // Simpan data ke database menggunakan model Rencana
        Rencana::create($data);
    
        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->route('penyuluhan-rencana')->with('success', 'Rencana kegiatan berhasil disimpan.');
    }
    
    function filter_rencana($key)
    {
        // Ganti bagian ini
        // $rencana = Rencana::Where('kecamatan','desa','penyuluh',$key)->get();
    
        // Menjadi
        $rencana = Rencana::where('kecamatan', $key)
            ->orWhere('desa', $key)
            ->orWhere('penyuluh', $key)
            ->get();
    
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $penyuluh = Penyuluh::pluck('nama');
        
        return view('penyuluhan.rencana.index', compact('rencana', 'key', 'kecamatan', 'desa', 'penyuluh'));
    }
    
    
    function dokumentasi()
    {
        {
            $dokumentasi = Dokumentasi::all();
            $desa = Desa::all();
            $kecamatan = Kecamatan::all();
            return view('penyuluhan.dokumentasi.index', compact('dokumentasi','kecamatan','desa'));
        }
    }
    
    function tambah_dokumentasi()
    {
        return view('penyuluhan.dokumentasi.tambah');
    }

    public function store_dokumentasi(Request $request)
    {
        // Validasi data yang dikirimkan oleh formulir
        $request->validate([
            'tahun' => 'required|int',
            'bulan' => 'required|string',
            'desa' => 'required|string',
            'kecamatan' => 'required|string',
            'tanggal' => 'required|date',
            'foto' => 'foto|mimes:pdf', // Sesuaikan dengan jenis file yang diizinkan
            'keterangan' => 'required|string',
        ]);
    
            // Simpan data menggunakan Eloquent pada model Penyuluh
            $penyuluh = Penyuluh::find($request->id);
            $penyuluh->tahun = $request->tahun;
            $penyuluh->bulan = $request->bulan;
            $penyuluh->desa = $request->desa;
            $penyuluh->kecamatan = $request->kecamatan;
            $penyuluh->tanggal = $request->tanggal;
            $penyuluh->keterangan = $request->keterangan;

         // Simpan file jika ada yang diunggah
         if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotofile = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/foto', $fotofile);
            $penyuluh->foto = $fotofile;
        }
        // Simpan data ke database menggunakan model Rencana
        $penyuluh->save();
    
        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->route('penyuluhan-dokumentasi')->with('success', 'Rencana kegiatan berhasil disimpan.');
    }
    function filter_dokumentasi($key)
    {
        // Ganti bagian ini
        // $rencana = Rencana::Where('kecamatan','desa','penyuluh',$key)->get();
    
        // Menjadi
        $dokumentasi = Dokumentasi::where('kecamatan', $key)
            ->orWhere('desa', $key)
            ->get();
    
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        
        return view('penyuluhan.dokumentasi.index', compact('dokumentasi', 'key', 'kecamatan', 'desa',));
    }
    

}
