<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Imports\TanamanImport;
use App\Models\Produksitanaman;
use App\Models\hProduksitanaman;
use App\Models\Produksitanaman2;
use Illuminate\Support\Facades\DB;
use App\Models\RekapProduksitanaman;
use Maatwebsite\Excel\Facades\Excel;

class ProduksitanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produksi.index');
    }
    public function tanaman()
    {
        if(auth()->user()->role != 'dinas'){
            return redirect()->route('produksi.tanaman.kecamatann');
        }
        return view('produksi.tanaman');
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
    public function show(Produksitanaman $produksitanaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produksitanaman $produksitanaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produksitanaman $produksitanaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produksitanaman $produksitanaman)
    {
        //
    }

    function kecamatan(){
        $kecamatan = Kecamatan::all();
        $data2 = new Produksitanaman2();
        $belum_panen = $data2->whereBetween('tanggal', [
            Carbon::now()->subDays(120)->toDateString(),
            Carbon::now()->subDays(90)->toDateString(),
        ])->where('jumlah_sudah_dipanen', 0)->get();

        return view('produksi.tanaman.kecamatan',compact('kecamatan','belum_panen'));
    }
    function tambah_tanaman(){
        $desa = Desa::where('kecamatan', auth()->user()->kecamatan)->get();
        return view('produksi.tanaman.tambah',compact('desa'));
    }
    function tambah_tanamanexel(){
        $desa = Desa::where('kecamatan', auth()->user()->kecamatan)->get();
        return view('produksi.tanaman.tambahexel',compact('desa'));
    }
    public function importTanaman(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls', // Validasi tipe file
        ]);

        $file = $request->file('excel_file');

        Excel::import(new UsersImport, $file);

        return redirect()->back()->with('success', 'Data berhasil diimpor!');
    }
    function store_tanaman(Request $request){
        $bulan = Carbon::now()->subDays(0)->toDateString(); // Mengambil bulan dari tanggal
        $desa = Desa::where('desa', $request->desa)->first();
        // ////////////////////////////////////////
        // dd($desa);
        $data = Produksitanaman2::create([
            'desa' => $desa->desa,
            'kecamatan' => $desa->kecamatan,
            'subsektor' => $request->subsektor,
            'komoditas' => $request->komoditas,
            'tanam_bulan_lalu' => $request->tanam_bulan_lalu,
            'tanam_bulan_sekarang' => $request->tanam_bulan_sekarang,
            'panen_bulan_terakhir' => $request->panan_bulan_terakhir,
            'panen_dari_data_tanam_yang_bulan' => $request->panen_dari_data_tanam_yang_bulan,
            'panen_bulan_sekarang' => $request->panen_bulan_sekarang,
            'panen_bulan_terakhir' => $request->panen_bulan_terakhir,
            'gagal_panen_bulan_terakhir' => $request->gagal_panen_bulan_terakhir,
            'gagal_panen_terakhir_dari_bulan' => $request->gagal_panen_dari_data_tanam_yang_bulan,
            'gagal_panen_bulan_sekarang' => $request->gagal_panen_bulan_sekarang,
            'produksi_bulan_terakhir' => $request->produksi_bulan_terakhir,
            'produksi_bulan_sekarang' => $request->produksi_bulan_sekarang,
            'tanggal' => $bulan,
            
        ]);
        $data->save();

        $updatepanen = Produksitanaman2::find($request->id_panen);
        $updatepanen->jumlah_sudah_dipanen = $request->panen_bulan_sekarang;
        $updatepanen->tanggal_panen = $bulan;
        $updatepanen->save();

        $updatepanen = Produksitanaman2::find($request->id_gagal_panen);
        $updatepanen->tanggal_gagal_panen = $bulan;
        $updatepanen->gagal_panen_tanam_bulan_ini = $request->gagal_panen_bulan_sekarang;
        $updatepanen->save();


        return redirect()->route('produksi.tanaman.kecamatann');
    }

    public function import(Request $request)
    {
        try {
            // Validate the request to ensure it contains a valid Excel file
            $file = $request->file('tanaman');

            // Use the Excel facade to import data from the file using the TanamanImport class
            Excel::import(new TanamanImport, $file);

            // Redirect back to the previous page with a success message
            return redirect()->back()->with('success', 'Data berhasil diimpor!');
        } catch (\Exception $e) {
            // Handle any exception that might occur during the import process
            return $e->getMessage();
        }
    }

     function filterProduksi(Request $request)
    {
        $data = Produksitanaman2::query();
        // Lakukan filter berdasarkan permintaan
        if ($request->kecamatan) {
            $data->where('kecamatan', $request->kecamatan);
        }

        if ($request->komoditas) {
            $data->where('subsektor', $request->komoditas);
        }
        if ($request->komoditas2) {
            $data->where('komoditas', $request->komoditas2);
        }

        if ($request->tahun) {
            $data->whereYear('tanggal', $request->tahun);
        }

        if ($request->bulan) {
            $data->whereMonth('tanggal', $request->bulan);
        }
        $data->orderBy('tanggal');
        $filteredData = $data->get();
        
        return response()->json(['data_sekarang' => $filteredData]);
    }

    function rekap_tanaman(){
        $kecamatan = Kecamatan::all();
        return view('produksi.tanaman.rekap',compact('kecamatan'));
    }

    function rekap_proses(Request $request)
    {
        try {
        $data = Produksitanaman2::query();

        // Lakukan filter berdasarkan permintaan
        if ($request->komoditas) {
            $data->where('komoditas', $request->komoditas);
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
        $test = [];

        // Proses pengelompokan data per kecamatan
        foreach ($groupedData as $item) {
            $kecamatan = $item->kecamatan;
            $tahun = date('Y', strtotime($item->tanggal));
            $bulan = date('F', strtotime($item->tanggal));
            $test[$tahun][$bulan][$kecamatan] = $item->{$request->kolom};

            if (!isset($groupedByKecamatan[$kecamatan])) {
                $groupedByKecamatan[$kecamatan] = [];
            }

            if (!isset($groupedByKecamatan[$kecamatan][$bulan])) {
                $groupedByKecamatan[$kecamatan][$bulan] = 0;
            }

            $groupedByKecamatan[$kecamatan][$bulan] += $item->{$request->kolom};
        }

        return response()->json(['grouped_data' => $groupedByKecamatan,'test' => $test]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
    }


    function api(){
        $data = Produksitanaman::all();
        return response()->json($data);
    }
    
}
