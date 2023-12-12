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
use App\Models\DaftarAnggotaPoktan;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\View;

use function PHPUnit\Framework\returnValue;

class KelembagaanController extends Controller
{
    function index()
    {
        return view('kelembagaan.index');
    }
    function poktan_register()
    {
        $desa = Desa::all();
        if(session('desa') == null){
            $desaPertama = $desa->first();
            $poktan = Poktan::where('desa', $desaPertama->desa)->get();
            return view('kelembagaan.petani.poktan_register', compact('desa', 'poktan'));
        }
        else{
            $poktan = Poktan::where('desa', session('desa'))->get();
            return view('kelembagaan.petani.poktan_register', compact('desa', 'poktan'));
        }
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
    function edit_poktan($id)
    {
        $poktan = Poktan::find($id);
        $desa = Desa::all();
        return view('kelembagaan.petani.edit_poktan', compact('poktan','desa'));
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

    function poktan()
    {
        $kecamatan = Kecamatan::all();
        if (session('kecamatan') == null) {
            $kecamatanPertama = $kecamatan->first();
            session()->put('kecamatan', $kecamatanPertama->kecamatan);
        }

        $desa = Desa::where('kecamatan', session('kecamatan'))->get();
        // dd(session('desa'));
        if (session('desa') == null) {
            $desaPertama = $desa->first();
            session()->put('desa', $desaPertama->desa);
        }

        $poktans = poktan::where('desa', session('desa'))->get();

        return view('kelembagaan.petani.poktan', compact('kecamatan', 'poktans', 'desa'));
    }
    function daftar_poktan()
    {

        $desa = Desa::all();
        // dd(session('desa'));
        if (session('desa') == null) {
            $desaPertama = $desa->first();
            session()->put('desa', $desaPertama->desa);
        }

        $daftarpoktans = DaftarAnggotaPoktan::where('desa', session('desa'))->where('user_id',auth()->user()->id)->get();

        return view('kelembagaan.petani.daftar', compact('daftarpoktans', 'desa'));
    }

    public function store_poktan(Request $request)
    {
        // Simpan data menggunakan Eloquent pada model Penyuluh
        $poktan = new Poktan();
        $poktan->desa = $request->desa;
        $poktan->nama_poktan = $request->nama_poktan;
        $poktan->ketua_poktan = $request->nama_ketua_poktan;
        $poktan->nomor_telepon_ketua_poktan = $request->no_telepon_ketua;
        $poktan->nama_sekretaris_poktan = $request->nama_sekretaris_poktan;
        $poktan->nomor_telepon_sekretaris_poktan = $request->no_telepon_sekretaris;
        $poktan->nama_bendahara_poktan = $request->nama_bendahara_poktan;
        $poktan->nomor_telepon_bendahara_poktan = $request->no_telepon_bendahara;
        $poktan->titik_koordinat = $request->titik_koordinat;
        $poktan->jumlah_anggota = $request->jumlah_anggota_poktan;
        $poktan->nilai_kelas_poktan = $request->nilai_kelas_poktan;
        $poktan->ad_art = $request->ad_art;
        $poktan->kelas_poktan = $request->kelas_poktan;
        $poktan->username = $request->username;
        $poktan->password = $request->password;

        // Simpan file jika ada yang diunggah
        if ($request->hasFile('sk_pembentukan_poktan')) {
            $file_sk_pembentukan = $request->file('sk_pembentukan_poktan');
            $filename_sk_pembentukan = time() . '_' . $file_sk_pembentukan->getClientOriginalName();
            $file_sk_pembentukan->storeAs('public/sk_pembentukan_poktan', $filename_sk_pembentukan);
            $poktan->sk_pembentukan_poktan = $filename_sk_pembentukan;
        }

        if ($request->hasFile('sk_pengukuhan_poktan')) {
            $filesk_pengukuhan_poktan = $request->file('sk_pengukuhan_poktan');
            $filenamesk_pengukuhan_poktan = time() . '_' . $filesk_pengukuhan_poktan->getClientOriginalName();
            $filesk_pengukuhan_poktan->storeAs('public/sk_pengukuhan_poktan', $filenamesk_pengukuhan_poktan);
            $poktan->sk_pengukuhan_poktan = $filenamesk_pengukuhan_poktan;
        }

        if ($request->hasFile('berkas_penilaian_poktan')) {
            $fileberkas_penilaian_poktan = $request->file('berkas_penilaian_poktan');
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
        if ($request->hasFile('surat_pendamping')) {
            $surat_pendamping = $request->file('surat_pendamping');
            $filenamesurat_pendamping = time() . '_' . $surat_pendamping->getClientOriginalName();
            $surat_pendamping->storeAs('public/surat_pendamping', $filenamesurat_pendamping);
            $poktan->surat_permohonan_pendampingan = $filenamesurat_pendamping;
        }

        $poktan->save();
        // Redirect user dan menampilkan pesan sesuai status
        return redirect()->route('kelembagaan-poktan')->with('success', 'Data penyuluh berhasil ditambahkan');
    }
    public function update_poktan(Request $request)
    {
        // Simpan data menggunakan Eloquent pada model Penyuluh
        $poktan = Poktan::find($request->id);
        $poktan->desa = $request->desa;
        $poktan->nama_poktan = $request->nama_poktan;
        $poktan->ketua_poktan = $request->nama_ketua_poktan;
        $poktan->nomor_telepon_ketua_poktan = $request->no_telepon_ketua;
        $poktan->nama_sekretaris_poktan = $request->nama_sekretaris_poktan;
        $poktan->nomor_telepon_sekretaris_poktan = $request->no_telepon_sekretaris;
        $poktan->nama_bendahara_poktan = $request->nama_bendahara_poktan;
        $poktan->nomor_telepon_bendahara_poktan = $request->no_telepon_bendahara;
        $poktan->titik_koordinat = $request->titik_koordinat;
        $poktan->jumlah_anggota = $request->jumlah_anggota_poktan;
        $poktan->nilai_kelas_poktan = $request->nilai_kelas_poktan;
        $poktan->ad_art = $request->ad_art;
        $poktan->kelas_poktan = $request->kelas_poktan;
        $poktan->username = $request->username;
        $poktan->password = $request->password;

        // Simpan file jika ada yang diunggah
        if ($request->hasFile('sk_pembentukan_poktan')) {
            $file_sk_pembentukan = $request->file('sk_pembentukan_poktan');
            $filename_sk_pembentukan = time() . '_' . $file_sk_pembentukan->getClientOriginalName();
            $file_sk_pembentukan->storeAs('public/sk_pembentukan_poktan', $filename_sk_pembentukan);
            $poktan->sk_pembentukan_poktan = $filename_sk_pembentukan;
        }

        if ($request->hasFile('sk_pengukuhan_poktan')) {
            $filesk_pengukuhan_poktan = $request->file('sk_pengukuhan_poktan');
            $filenamesk_pengukuhan_poktan = time() . '_' . $filesk_pengukuhan_poktan->getClientOriginalName();
            $filesk_pengukuhan_poktan->storeAs('public/sk_pengukuhan_poktan', $filenamesk_pengukuhan_poktan);
            $poktan->sk_pengukuhan_poktan = $filenamesk_pengukuhan_poktan;
        }

        if ($request->hasFile('berkas_penilaian_poktan')) {
            $fileberkas_penilaian_poktan = $request->file('berkas_penilaian_poktan');
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
        if ($request->hasFile('surat_pendamping')) {
            $surat_pendamping = $request->file('surat_pendamping');
            $filenamesurat_pendamping = time() . '_' . $surat_pendamping->getClientOriginalName();
            $surat_pendamping->storeAs('public/surat_pendamping', $filenamesurat_pendamping);
            $poktan->surat_permohonan_pendampingan = $filenamesurat_pendamping;
        }

        $poktan->save();
        // Redirect user dan menampilkan pesan sesuai status
        return redirect()->route('kelembagaan-poktan')->with('success', 'Data penyuluh berhasil ditambahkan');
    }

    function detail_poktan($id){
        $poktan = Poktan::find($id);
        return view('kelembagaan.petani.detail_poktan', compact('poktan'));
    }
    

    function desa(){
        $desa = Kecamatan::all();
        return $desa;
    }

    function cskecamatan($kecamatan){
        session()->put('kecamatan', $kecamatan);
        return back();
    }
    function csdesa($desa){
        session()->put('desa', $desa);
        return back();
    }


    public function store_poktan_register(Request $request)
    {
        // Simpan data menggunakan Eloquent pada model Penyuluh
        $poktan = new DaftarAnggotaPoktan();
        $poktan->desa = $request->desa;
        $poktan->poktan = $request->poktan;
        $poktan->nik = $request->nik;
        $poktan->nama = $request->nama;
        $poktan->status = "Pending";
        $poktan->user_id = auth()->user()->id;

        // Simpan file jika ada yang diunggah
        if ($request->hasFile('foto_ktp')) {
            $file_foto_ktp = $request->file('foto_ktp');
            $filename_sk_pembentukan = time() . '_' . $file_foto_ktp->getClientOriginalName();
            $file_foto_ktp->storeAs('public/foto_ktp', $filename_sk_pembentukan);
            $poktan->foto_ktp = $filename_sk_pembentukan;
        }

        if ($request->hasFile('foto_kk')) {
            $filefoto_kk = $request->file('foto_kk');
            $filenamefoto_kk = time() . '_' . $filefoto_kk->getClientOriginalName();
            $filefoto_kk->storeAs('public/foto_kk', $filenamefoto_kk);
            $poktan->foto_kk = $filenamefoto_kk;
        }

        if ($request->hasFile('foto_sppt')) {
            $filefoto_sppt = $request->file('foto_sppt');
            $filenamefoto_sppt = time() . '_' . $filefoto_sppt->getClientOriginalName();
            $filefoto_sppt->storeAs('public/foto_sppt', $filenamefoto_sppt);
            $poktan->foto_sppt = $filenamefoto_sppt;
        }

        if ($request->hasFile('foto_surat_lahan_desa')) {
            $foto_surat_lahan_desa = $request->file('foto_surat_lahan_desa');
            $filenamefoto_surat_lahan_desa = time() . '_' . $foto_surat_lahan_desa->getClientOriginalName();
            $foto_surat_lahan_desa->storeAs('public/foto_surat_lahan_desa', $filenamefoto_surat_lahan_desa);
            $poktan->foto_surat_lahan_desa = $filenamefoto_surat_lahan_desa;
        }
        if ($request->hasFile('surat_hgu_perkebunan')) {
            $surat_hgu_perkebunan = $request->file('surat_hgu_perkebunan');
            $filenamesurat_hgu_perkebunan = time() . '_' . $surat_hgu_perkebunan->getClientOriginalName();
            $surat_hgu_perkebunan->storeAs('public/surat_hgu_perkebunan', $filenamesurat_hgu_perkebunan);
            $poktan->foto_surat_hgu = $filenamesurat_hgu_perkebunan;
        }

        $poktan->save();
        // Redirect user dan menampilkan pesan sesuai status
        return redirect()->route('kelembagaan-petani')->with('success', 'Data penyuluh berhasil ditambahkan');
    }

    function detail_register_poktan($id){
        $poktan = Poktan::all();
        $daftarpoktan = DaftarAnggotaPoktan::find($id);
        return view('kelembagaan.petani.detail_register_poktan', compact('daftarpoktan','poktan'));
    }

    function proses_cek_anggota(Request $request){
        $daftarpoktan = DaftarAnggotaPoktan::where('nik', $request->nik)->get();
        if($daftarpoktan == null){
            return redirect()->route('poktan-register')->with('error', 'Data tidak ditemukan');
        }
        else{
                return view('kelembagaan.petani.cek_anggota_get', compact('daftarpoktan'));
        }
    }

    function cek_anggota(){
        return view('kelembagaan.petani.cek_anggota');

    }

}
