<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\Pasar;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
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
        $harga = Harga::where('kecamatan', Auth::user()->kecamatan)->where('komoditas','Hortikultura')->get();
        $countHortikultura = Harga::where('kecamatan', Auth::user()->kecamatan)->where('komoditas','Hortikultura')->count();
        $countPangan = Harga::where('kecamatan', Auth::user()->kecamatan)->where('komoditas','Pangan')->count();
        $countPerkebunan = Harga::where('kecamatan', Auth::user()->kecamatan)->where('komoditas','Perkebunan')->count();
        $last = Harga::where('kecamatan', Auth::user()->kecamatan)
            ->where('komoditas', 'Hortikultura')
            ->orderBy('updated_at', 'desc') // Mengurutkan berdasarkan updated_at secara descending
            ->first(); // Mengambil data pertama dari hasil yang telah diurutkan
        if($countHortikultura < 1){
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Daun Bawang",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Daun Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Bawang Merah",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Umbi basah dengan daun (konde basah)",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Bawang Putih",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Umbi basah dengan daun (konde basah)",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Kembang Kol",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Sayuran Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Kentang",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Umbi Basah",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Kubis",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Daun Krop",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Petsai/Sawi",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Sayuran Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Wortel",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Umbi dengan daun",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Bayam",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Sayuran Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Buncis",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Polong basah",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Cabe Besar/TW/Teropong",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Buah Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Cabai Keriting",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Buah Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Cabe Rawit",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Buah Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Jamur Tiram",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Sayuran Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Jamur Merang",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Sayuran Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Jamur Lainya",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Sayuran Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Kacang Panjang",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Polong Basah",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Kangkung",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Sayuran Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Mentimun",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Buah Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Labu Siam",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Buah Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Paprika",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Buah Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Terung",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Buah Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Tomat",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Buah Segar",
            ]);

        }

        if($countPangan < 1){
            Harga::create([
                'komoditas' => "Pangan",
                'produk' => "Padi",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "GKP",
            ]);
            Harga::create([
                'komoditas' => "Pangan",
                'produk' => "Padi",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "GKG",
            ]);
            Harga::create([
                'komoditas' => "Pangan",
                'produk' => "Kedelai",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Biji Kering",
            ]);
            Harga::create([
                'komoditas' => "Pangan",
                'produk' => "Kacang Tanah",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Biji Kering",
            ]);
            Harga::create([
                'komoditas' => "Pangan",
                'produk' => "Kacang Hijau",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Biji Kering",
            ]);
            Harga::create([
                'komoditas' => "Pangan",
                'produk' => "Ubi Kayu",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Ubi Basah",
            ]);
            Harga::create([
                'komoditas' => "Pangan",
                'produk' => "Ubi Jalar",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Ubi Basah",
            ]);
        }

        if($countPerkebunan < 1) {
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Teh",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Pucuk Teh Basah",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Kopi",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Berasan Arabika",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Kopi",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Berasan Robusta",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Tebu",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Gula Pasir",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Tembakau",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Rajangan",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Cengkeh",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Bunga Kering",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Kelapa",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Butiran",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Aren",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Gula Merah",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Nilai",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Daun Basah",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Nilam",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Daun Kering",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Lada",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Lada Putih",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Kemiri",
                'harga' => 0,
                'kecamatan' => Auth::user()->kecamatan,
                'kode_produk' => "Kemiri Kupas",
            ]);
        }

        return view('pasar.index2', compact('pasars','kecamatan','harga','last'));
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
        $pasar->kecamatan = $request->kecamatan;
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
                  $data->where('kecamatan', $request->kecamatan);
                }
                else{
                $data->where('kecamatan', Auth::user()->kecamatan);

                }
                if($request->komoditas){
                    $data->where('komoditas', $request->komoditas);
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
}
