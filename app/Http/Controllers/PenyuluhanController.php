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


    function dokumentasi()
    { {
            $dokumentasi = Dokumentasi::all();
            $desa = Desa::pluck('desa');
            $kecamatan = Kecamatan::all();
            // dd($dokumentasi);
            return view('penyuluhan.dokumentasi.index', compact('dokumentasi', 'kecamatan', 'desa'));
        }
    }

    function tambah_dokumentasi()
    {
        $desa = Desa::all();
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
}
