<?php

namespace App\Http\Controllers;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Rencana;
use App\Models\Penyuluh;
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
    

    

    
    function update(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'wilayah' => 'required',
            'notelepon' => 'required|numeric',
            'file_rktp' => 'file|mimes:pdf', // Sesuaikan dengan jenis file yang diizinkan
            'file_program_daerah' => 'file|mimes:pdf', // Sesuaikan dengan jenis file yang diizinkan
        ]);

        // Simpan data menggunakan Eloquent pada model Penyuluh
        $penyuluh = Penyuluh::find($request->id);
        $penyuluh->nama = $request->nama;
        $penyuluh->jabatan = $request->jabatan;
        $penyuluh->wilayah = $request->wilayah;
        $penyuluh->no_telepon = $request->notelepon;

        // Simpan file jika ada yang diunggah
        if ($request->hasFile('file_rktp')) {
            $fileRktp = $request->file('file_rktp');
            $filenameRktp = time() . '_' . $fileRktp->getClientOriginalName();
            $fileRktp->storeAs('public/file_rktp', $filenameRktp);
            $penyuluh->file_rktp = $filenameRktp;
        }

        if ($request->hasFile('file_program_daerah')) {
            $fileProgramDaerah = $request->file('file_program_daerah');
            $filenameProgramDaerah = time() . '_' . $fileProgramDaerah->getClientOriginalName();
            $fileProgramDaerah->storeAs('public/file_program_daerah', $filenameProgramDaerah);
            $penyuluh->file_program_desa = $filenameProgramDaerah;
        }
        if ($request->hasFile('foto')) {
            $fileFoto = $request->file('file_program_daerah');
            $filenamefoto = time() . '_' . $fileProgramDaerah->getClientOriginalName();
            $fileFoto->storeAs('public/file_program_daerah', $filenameProgramDaerah);
            $penyuluh->file_program_desa = $filenamefoto;
        }

        $penyuluh->save();

        // Redirect atau respons sesuai kebutuhan Anda
        return redirect('kelembagaan-penyuluh')->with('success', 'Data berhasil disimpan.');
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
        return view('penyuluhan.dokumentasi.index');
    }
    
    function tambah_dokumentasi()
    {
        return view('penyuluhan.dokumentasi.tambah');
    }
}
