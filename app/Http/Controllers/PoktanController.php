<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\User;
use App\Models\poktan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PoktanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poktans = poktan::all();
        return view('backend.poktan.index', compact('poktans'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desa = Desa::all();
        return view('backend.poktan.create', compact('desa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Simpan data menggunakan Eloquent pada model Penyuluh
        $poktan = new Poktan();
        $poktan->desa = $request->desa;
        $poktan->nama_poktan = $request->nama_poktan;
        $poktan->ketua_poktan = $request->nama_ketua_poktan;
        $poktan->nomor_telepon_ketua_poktan = $request->no_telepon_ketua_poktan;
        $poktan->nama_sekretaris_poktan = $request->nama_sektretaris_poktan;
        $poktan->nomor_telepon_sekretaris_poktan = $request->no_telepon_sekretaris_poktan;
        $poktan->nama_bendahara_poktan = $request->nama_bendahara_poktan;
        $poktan->nomor_telepon_bendahara_poktan = $request->no_telepon_bendahara_poktan;
        $poktan->titik_koordinat = $request->koordinat;
        $poktan->jumlah_anggota = $request->jumlah_anggota;
        $poktan->nilai_kelas_poktan = $request->nilai;
        $poktan->ad_art = $request->adart;
        $poktan->kelas_poktan = $request->kelas;
        $desa = Desa::where('desa', $request->desa)->first();
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->username;
        $user->poktan = $request->nama_poktan;
        $user->password = Hash::make($request->password);
        $user->kecamatan = $desa->kecamatan;
        $user->role = 'petugas_poktan';
        $user->save();

        // Simpan file jika ada yang diunggah
        if ($request->hasFile('skpp')) {
            $file_sk_pembentukan = $request->file('skpp');
            $filename_sk_pembentukan = time() . '_' . $file_sk_pembentukan->getClientOriginalName();
            $file_sk_pembentukan->storeAs('public/sk_pembentukan_poktan', $filename_sk_pembentukan);
            $poktan->sk_pembentukan_poktan = $filename_sk_pembentukan;
        }

        if ($request->hasFile('skpp2')) {
            $filesk_pengukuhan_poktan = $request->file('skpp2');
            $filenamesk_pengukuhan_poktan = time() . '_' . $filesk_pengukuhan_poktan->getClientOriginalName();
            $filesk_pengukuhan_poktan->storeAs('public/sk_pengukuhan_poktan', $filenamesk_pengukuhan_poktan);
            $poktan->sk_pengukuhan_poktan = $filenamesk_pengukuhan_poktan;
        }

        if ($request->hasFile('bpp')) {
            $fileberkas_penilaian_poktan = $request->file('bpp');
            $filenameberkas_penilaian_poktan = time() . '_' . $fileberkas_penilaian_poktan->getClientOriginalName();
            $fileberkas_penilaian_poktan->storeAs('public/berkas_penilaian_poktan', $filenameberkas_penilaian_poktan);
            $poktan->berkas_penilaian = $filenameberkas_penilaian_poktan;
        }

        if ($request->hasFile('rdk')) {
            $rdk = $request->file('rdk');
            $filenamerdk = time() . '_' . $rdk->getClientOriginalName();
            $rdk->storeAs('public/rdk', $filenamerdk);
            $poktan->rdk = $filenamerdk;
        }
        if ($request->hasFile('rdkk')) {
            $rdkk = $request->file('rdkk');
            $filenamerdkk = time() . '_' . $rdkk->getClientOriginalName();
            $rdkk->storeAs('public/rdkk', $filenamerdkk);
            $poktan->rdkk = $filenamerdkk;
        }
        if ($request->hasFile('sppr')) {
            $surat_pendamping = $request->file('sppr');
            $filenamesurat_pendamping = time() . '_' . $surat_pendamping->getClientOriginalName();
            $surat_pendamping->storeAs('public/surat_pendamping', $filenamesurat_pendamping);
            $poktan->surat_permohonan_pendampingan = $filenamesurat_pendamping;
        }

        $poktan->save();
        return redirect()->route('poktan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $desa = Desa::all();
        $poktan = Poktan::find($id);
        return view('backend.poktan.edit', compact('poktan', 'desa'));
        
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $poktan = Poktan::find($id);
        $poktan->desa = $request->desa;
        $poktan->nama_poktan = $request->nama_poktan;
        $poktan->ketua_poktan = $request->nama_ketua_poktan;
        $poktan->nomor_telepon_ketua_poktan = $request->no_telepon_ketua_poktan;
        $poktan->nama_sekretaris_poktan = $request->nama_sektretaris_poktan;
        $poktan->nomor_telepon_sekretaris_poktan = $request->no_telepon_sekretaris_poktan;
        $poktan->nama_bendahara_poktan = $request->nama_bendahara_poktan;
        $poktan->nomor_telepon_bendahara_poktan = $request->no_telepon_bendahara_poktan;
        $poktan->titik_koordinat = $request->koordinat;
        $poktan->jumlah_anggota = $request->jumlah_anggota;
        $poktan->nilai_kelas_poktan = $request->nilai;
        $poktan->ad_art = $request->adart;
        $poktan->kelas_poktan = $request->kelas;

        // Simpan file jika ada yang diunggah
        if ($request->hasFile('skpp')) {
            $file_sk_pembentukan = $request->file('skpp');
            $filename_sk_pembentukan = time() . '_' . $file_sk_pembentukan->getClientOriginalName();
            $file_sk_pembentukan->storeAs('public/sk_pembentukan_poktan', $filename_sk_pembentukan);
            $poktan->sk_pembentukan_poktan = $filename_sk_pembentukan;
        }

        if ($request->hasFile('skpp2')) {
            $filesk_pengukuhan_poktan = $request->file('skpp2');
            $filenamesk_pengukuhan_poktan = time() . '_' . $filesk_pengukuhan_poktan->getClientOriginalName();
            $filesk_pengukuhan_poktan->storeAs('public/sk_pengukuhan_poktan', $filenamesk_pengukuhan_poktan);
            $poktan->sk_pengukuhan_poktan = $filenamesk_pengukuhan_poktan;
        }

        if ($request->hasFile('bpp')) {
            $fileberkas_penilaian_poktan = $request->file('bpp');
            $filenameberkas_penilaian_poktan = time() . '_' . $fileberkas_penilaian_poktan->getClientOriginalName();
            $fileberkas_penilaian_poktan->storeAs('public/berkas_penilaian_poktan', $filenameberkas_penilaian_poktan);
            $poktan->berkas_penilaian = $filenameberkas_penilaian_poktan;
        }

        if ($request->hasFile('rdk')) {
            $rdk = $request->file('rdk');
            $filenamerdk = time() . '_' . $rdk->getClientOriginalName();
            $rdk->storeAs('public/rdk', $filenamerdk);
            $poktan->rdk = $filenamerdk;
        }
        if ($request->hasFile('rdkk')) {
            $rdkk = $request->file('rdkk');
            $filenamerdkk = time() . '_' . $rdkk->getClientOriginalName();
            $rdkk->storeAs('public/rdkk', $filenamerdkk);
            $poktan->rdkk = $filenamerdkk;
        }
        if ($request->hasFile('sppr')) {
            $surat_pendamping = $request->file('sppr');
            $filenamesurat_pendamping = time() . '_' . $surat_pendamping->getClientOriginalName();
            $surat_pendamping->storeAs('public/surat_pendamping', $filenamesurat_pendamping);
            $poktan->surat_permohonan_pendampingan = $filenamesurat_pendamping;
        }

        $poktan->save();

        return redirect()->route('poktan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poktan = poktan::findOrFail($id);
        $poktan->delete();
        return redirect()->route('poktan.index');
    }
}
