<?php

namespace App\Http\Controllers;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\penyuluhan;
use Illuminate\Http\Request;

class PenyuluhanController extends Controller
{
    function index()
    {
        return view('penyuluhan.index');
    }

    function rencana()
    {
        $penyuluhan = penyuluhan::all();
        $kecamatan = Kecamatan::all();
        return view('penyuluhan.rencana.index', compact('penyuluhan','kecamatan'));
    }
    function tambah_rencana()
    {
        return view('penyuluhan.rencana.tambah');
    }

      
    public function store_rencana(Request $request)
    {
        // Rencana Kegiatan
        $request->validate([
            'tanggal' => 'required|date',
            'rencana_kegiatan' => 'required|string',
        ]);

        // Simpan data ke database
        penyuluhan::create([
            'tanggal' => $request->input('tanggal'),
            'rencana_kegiatan' => $request->input('rencana_kegiatan'),
        ]);

        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->route('penyuluhan.rencana.index')->with('success', 'Rencana kegiatan berhasil disimpan.');
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

    function filter_penyuluhan($key)
     {
        $penyuluhan = Penyuluhan::Where('kecamatan', $key)->get();
        $kecamatan = Kecamatan::all();
        return view ('penyuluhan.rencana.index', compact('penyuluhan','key','kecamatan'));
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
