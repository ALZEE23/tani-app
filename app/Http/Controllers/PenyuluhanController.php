<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Rencana;
use App\Models\Penyuluh;
use App\Models\Kecamatan;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return view('penyuluhan.rencana.index', compact('rencana', 'kecamatan', 'desa', 'penyuluh'));
    }
    function tambah_rencana()
    {
        $desa = Desa::all();
        $penyuluh = Penyuluh::pluck('nama');
        return view('penyuluhan.rencana.tambah', compact('desa', 'penyuluh'));
    }


    public function store_rencana(Request $request)
    {
        // Validasi data yang dikirimkan oleh formulir
        // Gunakan $request->penyuluh bukan $request->all()
        $desa = Desa::where('desa', $request->desa)->first();
        $data = [
            'kecamatan' => $desa->kecamatan,
            'desa' => $request->desa,
            'penyuluh' => $request->penyuluh,
            'tanggal' => $request->tanggal,
            'rencana_kegiatan' => $request->rencana,
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

    public function downloadBundle($id)
    {
        // Ambil nama file dari database
        $dokumentasi = Dokumentasi::find($id);
        if (!$dokumentasi) {
            return redirect()->back()->with('error', 'Dokumentasi tidak ditemukan.');
        }

        // Pisahkan nama file yang dipisahkan dengan koma menjadi array
        $namaFile = $dokumentasi->foto;
        $namaFileArray = explode(',', $namaFile);

        // Inisialisasi objek ZipArchive
        $zip = new \ZipArchive();

        // Buat nama file zip dan path penyimpanannya
        $zipFileName = "File Dokumentasi" .$dokumentasi->keterangan  . '.zip';
        $zipFilePath = public_path($zipFileName); // Lokasi penyimpanan sementara di public

        // Path dasar ke folder gambar
        $baseImagePath = public_path('storage/dokumentasi') . DIRECTORY_SEPARATOR;

        // Buat file zip dan tambahkan file-file gambar ke dalamnya
        if ($zip->open($zipFilePath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
            foreach ($namaFileArray as $namaFile) {
                $fullImagePath = $baseImagePath . trim($namaFile);
                if (file_exists($fullImagePath) && is_file($fullImagePath)) {
                    $zip->addFile($fullImagePath, basename($fullImagePath));
                } else {
                    // Debugging: Tampilkan pesan jika file tidak ditemukan
                    dd('File tidak ditemukan: ' . $fullImagePath);
                }
            }
            $zip->close();
        } else {
            // Debugging: Tampilkan pesan jika gagal membuat file ZIP
            dd('Gagal membuat file ZIP');
        }

        // Setelah membuat zip, kirimkan file bundle kepada pengguna
        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }


    function dokumentasi()
    { 
            $dokumentasi = Dokumentasi::all();
            $desa = Desa::where('kecamatan', auth()->user()->kecamatan)->get();
            $kecamatan = Kecamatan::all();
            // dd($dokumentasi);
            return view('penyuluhan.dokumentasi.index', compact('dokumentasi', 'kecamatan', 'desa'));
        
    }

    function tambah_dokumentasi()
    {
        $desa = Desa::where('kecamatan', auth()->user()->kecamatan)->get();
        return view('penyuluhan.dokumentasi.tambah', compact('desa'));
    }

    public function store_dokumentasi(Request $request)
    {
        try {
            $documentation = new Dokumentasi();
            $documentation->tahun = $request->input('tanggal');
            $documentation->desa = $request->input('desa');

            $desa = Desa::where('desa', $request->desa)->first();
            if ($desa) {
                $documentation->kecamatan = $desa->kecamatan;
            } else {
                $documentation->kecamatan = 'Kecamatan Default';
            }

            $documentation->tanggal = $request->input('tanggal');
            $documentation->keterangan = $request->input('rencana');

            $gambar = [];
            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->storeAs('public/dokumentasi', $fileName);
                    $gambar[] = $fileName;
                }

                $documentation->foto = implode(',', $gambar);
            }

            $documentation->save();

            return redirect()->route('penyuluhan-dokumentasi')->with('success', 'Dokumentasi kegiatan berhasil disimpan.');
        } catch (\Exception $e) {
            return "Terjadi kesalahan: " . $e->getMessage(); // Memberikan pesan kesalahan umum
        }
    }
    public function updatedok(Request $request)
    {
        try {
            $documentation = Dokumentasi::find($request->id);
            $documentation->tahun = $request->input('tanggal');
            $documentation->desa = $request->input('desa');

            $desa = Desa::where('desa', $request->desa)->first();
            if ($desa) {
                $documentation->kecamatan = $desa->kecamatan;
            } else {
                $documentation->kecamatan = 'Kecamatan Default';
            }

            $documentation->tanggal = $request->input('tanggal');
            $documentation->keterangan = $request->input('rencana');

            $gambar = [];
            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->storeAs('public/dokumentasi', $fileName);
                    $gambar[] = $fileName;
                }

                $documentation->foto = implode(',', $gambar);
            }

            $documentation->save();

            return redirect()->route('penyuluhan-dokumentasi')->with('success', 'Dokumentasi kegiatan berhasil disimpan.');
        } catch (\Exception $e) {
            return "Terjadi kesalahan: " . $e->getMessage(); // Memberikan pesan kesalahan umum
        }
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

    function filter(Request $request)
    {
        $data = Rencana::query();

        if ($request->tahun) {
            $data->whereYear('tanggal', $request->tahun);
        }

        if ($request->bulan) {
            $data->whereMonth('tanggal', $request->bulan);
        }
        // Lakukan filter berdasarkan permintaan      
        if ($request->penyuluh) {
        $data->where('penyuluh', $request->penyuluh);
            }
        if ($request->kecamatan) {
            $data->where('kecamatan', $request->kecamatan);
        }

  

     

        $filteredData = $data->get();

        return response()->json(['data_sekarang' => $filteredData]);
    }
    public function downloadAllImages($id)
    {
        // Temukan data dokumentasi berdasarkan ID
        $dokumentasi = Dokumentasi::findOrFail($id);

        // Pisahkan nama file gambar dari string yang berisi nama-nama file
        $images = explode(',', $dokumentasi->foto);

        // Loop untuk men-download setiap gambar
        foreach ($images as $image) {
            $filePath = 'public/dokumentasi/' . trim($image);

            // Lakukan pengecekan apakah file ada sebelum men-download
            if (Storage::exists($filePath)) {
                return response()->download(storage_path('app/' . $filePath));
            }
        }

        // Jika ada masalah dalam proses pengunduhan, Anda bisa mengarahkan ke halaman tertentu atau memberikan pesan error.
        return redirect()->back()->with('error', 'Gagal mengunduh gambar-gambar.');
    }
    // Di sisi server, misalnya dalam controller Laravel atau di tempat Anda memproses permintaan Ajax
    public function handleAjaxRequest(Request $request)
    {
        // Lakukan logika untuk mengambil data yang sesuai dari model atau sumber data lainnya
        // Simpan data dalam variabel $dokumentasi (berisi koleksi data dokumentasi yang sesuai)
        $data = Dokumentasi::query();

        if ($request->tahun) {
            $data->whereYear('tanggal', $request->tahun);
        }

        if ($request->bulan) {
            $data->whereMonth('tanggal', $request->bulan);
        }
        if ($request->kecamatan) {
            $data->where('kecamatan', $request->kecamatan);
        }
        if ($request->desa) {
            $data->where('desa', $request->desa);
        }
        $dokumentasi = $data->get();

        // Jika ada permintaan untuk data bulan lalu

        // Susun respons dalam format HTML yang sesuai dengan struktur yang diinginkan
        $response = '';

        foreach ($dokumentasi as $data) {
            $response .= '<div style="background-color: #00a99d; color: white">';
            $response .= '<hr>';
            $response .= '<div class="row">';
            $response .= '<h6>' . $data->tanggal . '</h6>';
            $response .= '</div>';

            $response .= '<div class="carousel carousel-basic carousel-small rounded">';
            $images = explode(',', $data->foto);
            foreach ($images as $image) {
                $response .= '<a class="carousel-item" href="#!" style="z-index: 0; opacity: 1; visibility: visible;">';
                $response .= '<img alt="image" src="' . asset('storage/dokumentasi/' . trim($image)) . '" style="border-radius: 10px;">';
                $response .= '</a>';
            }

            $response .= '<ul class="indicators">';
            for ($i = 0; $i < count($images); $i++) {
                $response .= '<li class="indicator-item' . ($i === 0 ? ' active' : '') . '"></li>';
            }
            $response .= '</ul>';
            $response .= '</div>';

            $response .= '<h5>' . $data->keterangan . '</h5>';
            $response .= '<br>';
            $response .= '<hr>';
            if(auth()->user()->role == 'petugas'){
                $response .= '<a href="' . route('delete-dokumentasi', $data->id) . '" class="btn btn-primary">Hapus</a>';
            $response .= '<a href="' . route('edit-dokumentasi', $data->id) . '" class="btn btn-primary">Edit</a>';
        }
            // Tambahkan tautan "Download Semua" dan tautan download untuk setiap gambar
            $response .= '<a href="' . route('dokumentasi.download', $data->id) . '" class="btn btn-primary save-all">Download</a>';

            $response .= '<div class="download-links" style="display: none;">';
            foreach ($images as $image) {
                $response .= '<div>';
                $response .= '<a href="' . asset('storage/dokumentasi/' . trim($image)) . '" download="' . $image . '">Download</a>';
                $response .= '</div>';
            }
            $response .= '</div>';

            $response .= '</div>';
        }

        return $response;
    }

    function editdok($id)
    {
        $dokumentasi = Dokumentasi::find($id);
        $desa = Desa::all();
        return view('penyuluhan.dokumentasi.edit', compact('dokumentasi', 'desa'));
    }

    function deletedok($id)
    {
        $dokumentasi = Dokumentasi::find($id);
        $dokumentasi->delete();
        return redirect()->route('penyuluhan-dokumentasi')->with('success', 'Dokumentasi kegiatan berhasil dihapus.');
    }   
}
