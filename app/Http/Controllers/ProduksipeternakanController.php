<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\Produksipeternakan;
use App\Models\hProduksipeternakan;
use Illuminate\Support\Facades\DB;
use App\Models\RekapProduksipeternakan;

class ProduksipeternakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produksi.index');
    }
    public function peternakan()
    {
        return view('produksi.peternakan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Produksipeternakan $produksipeternakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produksipeternakan $produksipeternakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produksipeternakan $produksipeternakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produksipeternakan $produksipeternakan)
    {
        //
    }

    function kecamatan()
    {
        $kecamatan = Kecamatan::all();
        return view('produksi.peternakan.kecamatan', compact('kecamatan'));
    }
    function tambah_peternakan()
    {
        $desa = Desa::all();
        return view('produksi.peternakan.tambah', compact('desa'));
    }

    function store_peternakan(Request $request)
    {
        $bulan = date('m', strtotime($request->tanggal)); // Mengambil bulan dari tanggal

        $desa = Desa::where('desa', $request->desa)->first();


        // ////////////////////////////////////////
        $data = Produksipeternakan::where('desa', $desa->desa)
            ->where('jenis_ternak', $request->jenis_ternak)
            ->whereMonth('tanggal', $bulan) // Menyaring berdasarkan bulan
            ->first();
        $data2 = hProduksipeternakan::where('sebelum_desa', $desa->desa)
            ->where('sebelum_jenis_ternak', $request->jenis_ternak)
            ->whereMonth('tanggal', $bulan) // Menyaring berdasarkan bulan
            ->first();
        if ($data2 == null) {
            $data2 = new hProduksipeternakan();
            $data2->sebelum_desa = $request->desa;
            $data2->sebelum_jumlah_ternak = $request->jumlah_ternak;
            $data2->sebelum_jumlah_kandang = $request->jumlah_kandang;
            $data2->tanggal = $request->tanggal;
            $data2->sebelum_kecamatan = $desa->kecamatan;
            $data2->sebelum_jenis_ternak = $request->jenis_ternak;
            $data2->save();
        } else {
            $data2->sebelum_jumlah_ternak = $data2->sebelum_jumlah_ternak + $request->jumlah_ternak;
            $data2->sebelum_jumlah_kandang = $data2->sebelum_jumlah_kandang + $request->jumlah_kandang;
            $data2->save();
        }
            if ($data == null) {
                $data = new Produksipeternakan();
                $data->desa = $request->desa;
                $data->jumlah_ternak = $request->jumlah_ternak;
                $data->jumlah_kandang = $request->jumlah_kandang;
                $data->tanggal = $request->tanggal;
                $data->kecamatan = $desa->kecamatan;
                $data->jenis_ternak = $request->jenis_ternak;
                $data->save();
            } else {
                $data->jumlah_ternak = $data->jumlah_ternak + $request->jumlah_ternak;
                $data->jumlah_kandang = $data->jumlah_kandang + $request->jumlah_kandang;
                $data->save();
            }


            $bulan = date('m', strtotime($request->tanggal)); // Mengambil bulan dari tanggal

            // Melakukan pencarian data berdasarkan bulan dari tanggal
            $rekap = RekapProduksipeternakan::where('kecamatan', $desa->kecamatan)
                ->where('jenis_ternak', $request->jenis_ternak)
                ->whereMonth('tanggal', $bulan) // Menyaring berdasarkan bulan
                ->first();

            if ($rekap == null) {
                $rekap = new RekapProduksipeternakan();
                $rekap->kecamatan = $desa->kecamatan;
                $rekap->jenis_ternak = $request->jenis_ternak;
                $rekap->jumlah_ternak = $request->jumlah_ternak;
                $rekap->jumlah_kandang = $request->jumlah_kandang;
                $rekap->tanggal = $request->tanggal;
                $rekap->save();
            } else {
                $rekap->jumlah_ternak = $rekap->jumlah_ternak + $request->jumlah_ternak;
                $rekap->jumlah_kandang = $rekap->jumlah_kandang + $request->jumlah_kandang;
                $rekap->save();
            }
            return redirect()->route('produksi.peternakan.kecamatan');
    }


    function filterProduksi(Request $request)
    {
        $data = Produksipeternakan::query();
        $data2 = hProduksipeternakan::query();

        // Lakukan filter berdasarkan permintaan
        if ($request->desa) {
            $data->where('kecamatan', $request->desa);
        }

        if ($request->jenis_ternak) {
            $data->where('jenis_ternak', $request->jenis_ternak);
        }

        if ($request->tahun) {
            $data->whereYear('tanggal', $request->tahun);
        }

        if ($request->bulan) {
            $data->whereMonth('tanggal', $request->bulan);
        }
        if ($request->desa) {
            $data2->where('sebelum_kecamatan', $request->desa);
        }

        if ($request->jenis_ternak) {
            $data2->where('sebelum_jenis_ternak', $request->jenis_ternak);
        }

        if ($request->tahun) {
            $data2->whereYear('tanggal', $request->tahun);
        }

        if ($request->bulan) {
            $data2->whereMonth('tanggal', $request->bulan - 1);
            $filteredData2 = $data2->get();
        } else {
            $filteredData2 = null;
        }

        $filteredData = $data->get();

        return response()->json(['data_sekarang' => $filteredData, 'data_bulan_lalu' => $filteredData2]);
    }
    function filterProduksi_kab(Request $request)
    {
        $data = Produksipeternakan::query();
        $data2 = hProduksipeternakan::query();

        // Lakukan filter berdasarkan permintaan
        if ($request->desa) {
            $data->where('kecamatan', $request->desa);
            $data2->where('sebelum_kecamatan', $request->desa);
        }

        if ($request->jenis_ternak) {
            $data->where('jenis_ternak', $request->jenis_ternak);
            $data2->where('sebelum_jenis_ternak', $request->jenis_ternak);
        }

        if ($request->tahun) {
            $data->whereYear('tanggal', $request->tahun);
            $data2->whereYear('tanggal', $request->tahun);
        }

        if ($request->bulan) {
            $data->whereMonth('tanggal', $request->bulan);
            $data2->whereMonth('tanggal', $request->bulan - 1);
        }

        // Grouping data dan menjalankan query
        $filteredData = $data->groupBy('kecamatan')->get([
            'kecamatan',
            DB::raw('SUM(jumlah_ternak) as total_ternak'),
            DB::raw('SUM(jumlah_kandang) as total_kandang'),
        ]);

        $filteredData2 = null; // Default value

        // Jika ada permintaan untuk data bulan lalu
        if ($request->bulan) {
            $filteredData2 = $data2->groupBy('sebelum_kecamatan')->get([
                'sebelum_kecamatan',
                DB::raw('SUM(sebelum_jumlah_ternak) as total_ternak'),
                DB::raw('SUM(sebelum_jumlah_kandang) as total_kandang'),
            ]);
        }

        return response()->json([
            'data_sekarang' => $filteredData,
            'data_bulan_lalu' => $filteredData2,
        ]);
    }

    function rekap_peternakan()
    {
        $kecamatan = Kecamatan::all();
        return view('produksi.peternakan.rekap', compact('kecamatan'));
    }

    function rekap_proses(Request $request)
    {
        try {
            $data = RekapProduksipeternakan::query();

            // Lakukan filter berdasarkan permintaan
            if ($request->jenis_ternak) {
                $data->where('jenis_ternak', $request->jenis_ternak);
            }

            if ($request->tahun_awal && $request->tahun_akhir && $request->bulan_awal && $request->bulan_akhir) {
                $data->where(function ($query) use ($request) {
                    $query->whereYear('tanggal', '>=', $request->tahun_awal)
                        ->whereYear('tanggal', '<=', $request->tahun_akhir)
                        ->whereMonth('tanggal', '>=', $request->bulan_awal)
                        ->whereMonth('tanggal', '<=', $request->bulan_akhir);
                });
            }

            // Ambil data berdasarkan kecamatan dan bulan
            $groupedData = $data
                ->select('kecamatan', 'tanggal', $request->kolom)
                ->get();

            // Array untuk menyimpan hasil grup data per kecamatan
            $groupedByKecamatan = [];

            // Proses pengelompokan data per kecamatan
            foreach ($groupedData as $item) {
                $kecamatan = $item->kecamatan;
                $bulan = date('F', strtotime($item->tanggal));

                if (!isset($groupedByKecamatan[$kecamatan])) {
                    $groupedByKecamatan[$kecamatan] = [];
                }

                if (!isset($groupedByKecamatan[$kecamatan][$bulan])) {
                    $groupedByKecamatan[$kecamatan][$bulan] = 0;
                }

                $groupedByKecamatan[$kecamatan][$bulan] += $item->{$request->kolom};
            }

            return response()->json(['grouped_data' => $groupedByKecamatan]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
