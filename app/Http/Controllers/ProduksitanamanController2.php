<?php

namespace App\Http\Controllers;

use App\Imports\TanamanImport;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\Produksitanaman;
use App\Models\hProduksitanaman;
use Illuminate\Support\Facades\DB;
use App\Models\RekapProduksitanaman;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
class ProduksitanamanController2 extends Controller
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
        return view('produksi.tanaman.kecamatan',compact('kecamatan'));
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
        $bulan = date('m', strtotime($request->tanggal)); // Mengambil bulan dari tanggal

        $desa = Desa::where('desa', $request->desa)->first();

    
        // ////////////////////////////////////////
        $data = ProduksiTanaman::where('desa', $desa->desa)
        ->where('komoditas', $request->komoditas)
            ->whereMonth('tanggal', $bulan) // Menyaring berdasarkan bulan
            ->first();
        $data2 = hProduksiTanaman::where('sebelum_desa', $desa->desa)
        ->where('sebelum_komoditas', $request->komoditas)
            ->whereMonth('tanggal', $bulan) // Menyaring berdasarkan bulan
            ->first();
        if($data2 == null){
            $data2 = new hProduksitanaman();
            $data2->sebelum_desa = $request->desa;
            $data2->sebelum_tanam = $request->tanam;
            $data2->sebelum_panen = $request->panen;
            $data2->sebelum_gagal_panen = $request->gagal_panen;
            $data2->sebelum_produksi = $request->produksi;
            $data2->sebelum_provitas = $request->provitas;
            $data2->tanggal = $request->tanggal;
            $data2->sebelum_kecamatan = $desa->kecamatan;
            $data2->sebelum_komoditas = $request->komoditas;
            $data2->komoditas2 = $request->komoditas2;
            $data2->save();
        }else{
            $data2->sebelum_tanam = $data2->sebelum_tanam + $request->tanam;
            $data2->sebelum_panen = $data2->sebelum_panen + $request->panen;
            $data2->sebelum_gagal_panen = $data2->sebelum_gagal_panen + $request->gagal_panen;
            $data2->sebelum_produksi = $data2->sebelum_produksi + $request->produksi;
            $data2->sebelum_provitas = $data2->sebelum_provitas + $request->provitas;
            $data2->save();
        }
        if($data == null){
            $data = new Produksitanaman();
            $data->desa = $request->desa;
            $data->tanam = $request->tanam;
            $data->panen = $request->panen;
            $data->gagal_panen = $request->gagal_panen;
            $data->produksi = $request->produksi;
            $data->provitas = $request->provitas;
            $data->tanggal = $request->tanggal;
            $data->kecamatan = $desa->kecamatan;
            $data->komoditas = $request->komoditas;
            $data->komoditas2 = $request->komoditas2;
            $data->save();
        }else{
            $data->tanam = $data->tanam + $request->tanam;
            $data->panen = $data->panen + $request->panen;
            $data->gagal_panen = $data->gagal_panen + $request->gagal_panen;
            $data->produksi = $data->produksi + $request->produksi;
            $data->provitas = $data->provitas + $request->provitas;
            $data->save();
        }


        $bulan = date('m', strtotime($request->tanggal)); // Mengambil bulan dari tanggal

        // Melakukan pencarian data berdasarkan bulan dari tanggal
        $rekap = RekapProduksiTanaman::where('kecamatan', $desa->kecamatan)
            ->where('komoditas', $request->komoditas)
            ->whereMonth('tanggal', $bulan) // Menyaring berdasarkan bulan
            ->first();

        if($rekap == null){
            $rekap = new RekapProduksitanaman();
            $rekap->kecamatan = $desa->kecamatan;
            $rekap->komoditas = $request->komoditas;
            $rekap->komoditas2 = $request->komoditas2;
            $rekap->tanam = $request->tanam;
            $rekap->panen = $request->panen;
            $rekap->gagal_panen = $request->gagal_panen;
            $rekap->produksi = $request->produksi;
            $rekap->provitas = $request->provitas;
            $rekap->tanggal = $request->tanggal;
            $rekap->save();
        }else{
            $rekap->tanam = $rekap->tanam + $request->tanam;
            $rekap->panen = $rekap->panen + $request->panen;
            $rekap->gagal_panen = $rekap->gagal_panen + $request->gagal_panen;
            $rekap->produksi = $rekap->produksi + $request->produksi;
            $rekap->provitas = $rekap->provitas + $request->provitas;
            $rekap->save();
        }
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
        $data = Produksitanaman::query();
        $data2 = hProduksitanaman::query();

        // Lakukan filter berdasarkan permintaan
        if ($request->desa) {
            $data->where('kecamatan', $request->desa);
        }

        if ($request->komoditas) {
            $data->where('komoditas', $request->komoditas);
        }
        if ($request->komoditas2) {
            $data->where('komoditas2', $request->komoditas2);
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

        if ($request->komoditas) {
            $data2->where('sebelum_komoditas', $request->komoditas);
        }
        if ($request->komoditas2) {
            $data2->where('komoditas2', $request->komoditas2);
        }

        if ($request->tahun) {
            $data2->whereYear('tanggal', $request->tahun);
        }

        if ($request->bulan) {
            $data2->whereMonth('tanggal', $request->bulan-1);
            $filteredData2 = $data2->get();

        }else{
            $filteredData2 = null;
        }

        $filteredData = $data->get();
        
        return response()->json(['data_sekarang' => $filteredData,'data_bulan_lalu' => $filteredData2]);
    }

    function rekap_tanaman(){
        $kecamatan = Kecamatan::all();
        return view('produksi.tanaman.rekap',compact('kecamatan'));
    }

    function rekap_proses(Request $request)
    {
        try {
        $data = RekapProduksitanaman::query();

        // Lakukan filter berdasarkan permintaan
        if ($request->komoditas) {
            $data->where('komoditas2', $request->komoditas);
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


    function api(){
        $data = Produksitanaman::all();
        return response()->json($data);
    }
    
}
