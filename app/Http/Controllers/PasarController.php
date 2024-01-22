<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Harga;
use App\Models\Pasar;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\Produksitanaman;
use App\Models\Produksitanaman2;
use Illuminate\Support\Facades\Auth;

class PasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        $kec1 = $kecamatan->first();
        $pasars = Pasar::where('kecamatan',Auth::user()->kecamatan)->get();
        $harga = Harga::where('kecamatan', 'LEMAHSUGIH')->where('komoditas','Hortikultura')->get();
      

        return view('pasar.index2', compact('pasars','kecamatan','harga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('pasar.tambah',compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pasar = new Pasar();
        $pasar->nama_pemilik = $request->nama;
        $pasar->alamat_lokasi = $request->alamat;
        $pasar->link_gmap = $request->link_gmap;
        $pasar->kontak_pemilik = $request->kontak_pemilik;
        $pasar->sub_sektor = $request->sub_sektor;
        $pasar->komoditas = $request->komoditas;
        $pasar->kecamatan = auth()->user()->kecamatan;
        if ($request->hasFile('foto')) {
            $filename = $request->file('foto');
            $filenamefoto = time() . '_' . $filename->getClientOriginalName();
            $filename->storeAs('public/foto', $filenamefoto);
            $pasar->foto = $filenamefoto;

        $pasar->save();
        return redirect()->route('pasar.index');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Pasar $pasar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasar $pasar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasar $pasar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
     function delete_pasar($id){
        $pasar = Pasar::find($id);
        $pasar->delete();
        return redirect('pasar.index')->with('success', 'Data berhasil dihapus.');
    }

    public function filter($id)
    {
        session(['kecamatan' => $id]);
        $kecamatan = Kecamatan::all();
        $pasars = Pasar::where('kecamatan', $id)->get();
        $harga = Harga::where('kecamatan', $id)->get();
        $pasars = Pasar::where('kecamatan', $id)->get();
        return view('pasar.index2', compact('pasars', 'kecamatan','id','harga'));
    }

    function filter_komoditas(Request $request){
            try {
                $data = Harga::query();

                // Lakukan filter berdasarkan permintaan
                if ($request->kecamatan) {
                  $data->where('kecamatan', 'LEMAHSUGIH');
                }
                else{
                $data->where('kecamatan', 'LEMAHSUGIH');

                }
                if($request->komoditas){
                    $data->where('komoditas', $request->komoditas);
                }
                if($request->komoditas2){
                    $data->where('produk', $request->komoditas2);
                }
            $harga = $data->get();
            $last =
            Harga::where('kecamatan', Auth::user()->kecamatan)
            ->where('komoditas', 'Hortikultura')
            ->orderBy('updated_at', 'desc')
            ->value('updated_at'); // Mengambil data pertama dari hasil yang telah diurutkan
            return response()->json(['harga' => $harga,'last' => $last]);


            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()]);
        }
    }

    function filter_komoditas2(Request $request)
    {
        try {
            // Get the date for the first day of the previous month
            $previousMonth = now()->subMonth()->startOfMonth();
            $data = Produksitanaman2::query();
            if ($request->desa) {
                $data->where('desa', $request->desa);
            }
            if ($request->komoditas) {
                $data->where('komoditas', $request->komoditas);
            }
            $data2 = Produksitanaman2::query();

            // Apply filters based on request
            if ($request->desa) {
                $data2->where('desa', $request->desa);
            }
            if ($request->komoditas) {
                $data2->where('komoditas', $request->komoditas);
            }       
            // Filter for the previous month using a clear and efficient approach
            $data->whereMonth('tanggal', $previousMonth->month);
            // Calculate the start and end dates for the 90-120 day period
            // Retrieve and count the filtered data
            $last = $data->first();
            $count = $data->count();
            $panen = $data2->whereBetween('tanggal', [
                    Carbon::now()->subDays(120)->toDateString(),
                    Carbon::now()->subDays(90)->toDateString(),
                ])->get();
            $data3 = Produksitanaman2::query();
            $gagal_panen = $data3->where('jumlah_sudah_dipanen' ,'<=',0)->get();
            
                
            return response()->json(['last' => $last, 'count' => $count,'panen' => $panen,'gagal_panen' => $gagal_panen]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
