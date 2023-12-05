<?php

namespace App\Http\Controllers;

use App\Models\Penyuluh;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Gapoktans; // Sesuaikan dengan nama model dan namespace Anda

class KelembagaanController extends Controller
{
    function index()
    {
        return view('kelembagaan.index');
    }

    function penyuluh()
    {
        $kecamatan = Kecamatan::all();
        $penyuluhs = Penyuluh::all();

        if(Auth::user()->role == 'petani'){
            $penyuluhs = Penyuluh::where('wilayah', Auth::user()->kecamatan)->get();
        }
        return view('kelembagaan.penyuluh.index', compact('penyuluhs','kecamatan'));
    }
    function filter_penyuluh($key)
    {
        $kecamatan = Kecamatan::all();
        $penyuluhs = Penyuluh::where('wilayah', $key)->get();
        return view('kelembagaan.penyuluh.index', compact('penyuluhs','kecamatan','key'));
    }
    function petani()
    {
        return view('kelembagaan.petani.index');
    }

    function tambah_penyuluh()
    {
        return view('kelembagaan.penyuluh.tambah');
    }

    public function store(Request $request)
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
        $penyuluh = new Penyuluh();
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
            $penyuluh->foto = $request->foto;

        }

        if ($request->hasFile('file_program_daerah')) {
            $fileProgramDaerah = $request->file('file_program_daerah');
            $filenameProgramDaerah = time() . '_' . $fileProgramDaerah->getClientOriginalName();
            $fileProgramDaerah->storeAs('public/file_program_daerah', $filenameProgramDaerah);
            $penyuluh->file_program_desa = $filenameProgramDaerah;
        }
        if ($request->hasFile('foto')) {
            $filename = $request->file('foto');
            $filenamefoto = time() . '_' . $filename->getClientOriginalName();
            $filename->storeAs('public/foto', $filenamefoto);
            $penyuluh->foto = $filenamefoto;
        }

        $penyuluh->save();

        // Redirect atau respons sesuai kebutuhan Anda
        return redirect('kelembagaan-penyuluh')->with('success', 'Data berhasil disimpan.');
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
    //
    function gakpoktan()
    {
        return view('kelembagaan.petani.gakpoktan');
    }

    function edit_penyuluh($id){
        $penyuluh = Penyuluh::find($id);
        return view('kelembagaan.penyuluh.edit', compact('penyuluh'));
    }

    function delete_penyuluh($id){
        $penyuluh = Penyuluh::find($id);
        $penyuluh->delete();
        return redirect('kelembagaan-penyuluh')->with('success', 'Data berhasil dihapus.');
    }

    function tambah_gakpoktan()
    {
        return view('kelembagaan.petani.tambah-gakpoktan');
    }


    public function store_gakpoktan(Request $request)
    {
        $validatedData = $request->validate([
            'desa' => 'required',
            'nama_gakpoktan' => 'required',
            'nama_ketua' => 'required',
            'pangan' => 'required|numeric',
            'berkebunan' => 'required|numeric',
            'holtikultura' => 'required|numeric',
            'peternakan' => 'required|numeric',
            'perikanan' => 'required|numeric',
            'kwt' => 'required|numeric',
        ]);

        // Simpan data ke dalam model Gapoktan
        $gapoktan = new Gapoktan();
        $gapoktan->desa = $validatedData['desa'];
        $gapoktan->nama_gakpoktan = $validatedData['nama_gakpoktan'];
        $gapoktan->nama_ketua = $validatedData['nama_ketua'];
        $gapoktan->pangan = $validatedData['pangan'];
        $gapoktan->berkebunan = $validatedData['berkebunan'];
        $gapoktan->holtikultura = $validatedData['holtikultura'];
        $gapoktan->peternakan = $validatedData['peternakan'];
        $gapoktan->perikanan = $validatedData['perikanan'];
        $gapoktan->kwt = $validatedData['kwt'];

        // Simpan data ke dalam database
        $gapoktan->save();

        // Redirect atau respons sesuai kebutuhan Anda setelah menyimpan data
        return redirect()->route('nama_route_yang_diinginkan');
    }

    
}
