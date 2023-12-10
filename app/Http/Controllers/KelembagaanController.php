<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Desa;
use App\Models\Penyuluh;
use App\Models\Kecamatan;
use App\Models\poktan;
use App\Models\Gakpoktans;
use Illuminate\Http\Request;
use App\Exports\GakpotansExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\View;
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
        $kecamatan = Kecamatan::all();
        return view('kelembagaan.penyuluh.tambah', compact('kecamatan'));
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
    
    function gakpoktan()
    {
        $desa = Desa::all();
        $gakpoktans = Gakpoktans::all();
        return view('kelembagaan.petani.gakpoktan', compact('desa', 'gakpoktans'));
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
        $desa = Desa::all();
        return view('kelembagaan.petani.tambah-gakpoktan', compact('desa'));
    }
    function tambah_poktan()
    {
        $desa = Desa::all();
        return view('kelembagaan.petani.tambah_poktan', compact('desa'));
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
            'notelepon' => 'required|numeric',
        ]);

        // Simpan data ke dalam model Gapoktan
        $gapoktan = new Gakpoktans();
        $gapoktan->desa = $validatedData['desa'];
        $gapoktan->nama_gakpoktan = $validatedData['nama_gakpoktan'];
        $gapoktan->nama_ketua = $validatedData['nama_ketua'];
        $gapoktan->pangan = $validatedData['pangan'];
        $gapoktan->berkebunan = $validatedData['berkebunan'];
        $gapoktan->hortikultura = $validatedData['holtikultura'];
        $gapoktan->peternakan = $validatedData['peternakan'];
        $gapoktan->perikanan = $validatedData['perikanan'];
        $gapoktan->kwt = $validatedData['kwt'];
        $gapoktan->no_telepopn = $validatedData['notelepon'];

        // Simpan data ke dalam database
        $gapoktan->save();

        // Redirect atau respons sesuai kebutuhan Anda setelah menyimpan data
        return redirect()->route('kelembagaan-gakpoktan');
    }

    public function export_excel_gakpoktans()
    {
        return Excel::download(new GakpotansExport, 'gakpoktan.xlsx');
    }

    public function export_pdf_gakpoktans()
    {
        $gakpoktans = Gakpoktans::all();


        $pdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $pdf->setOptions($options);

        // Load Bootstrap CSS locally
        $bootstrapCSS = file_get_contents(public_path('css/bootstrap.min.css')); // Ganti path sesuai dengan lokasi CSS Bootstrap Anda
        $html = View::make('pdf.gakpoktans', compact('gakpoktans'))->render();

        // Combine Bootstrap CSS with your HTML
        $combinedHtml = '<style>' . $bootstrapCSS . '</style>' . $html;

        $pdf->loadHtml($combinedHtml);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();


        return $pdf->stream('gakpoktans.pdf');
    }

    function filter_gakpoktan($key)
    {
        $desa = Desa::all();
        $gakpoktans = Gakpoktans::where('desa', $key)->get();
        return view('kelembagaan.petani.gakpoktan', compact('gakpoktans', 'desa', 'key'));
    }

    function poktan(){
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $poktans = poktan::all();
        return view('kelembagaan.petani.poktan', compact('kecamatan', 'poktans','desa'));
    }
}
