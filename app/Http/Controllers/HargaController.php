<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        return view('backend.harga.index', compact('kecamatan'));
    }    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.harga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Harga::create([
            'komoditas' => $request->komoditas,
            'produk' => $request->produk,
            'harga' => $request->harga,
            'kecamatan' => $request->kecamatan,
            'kode_produk' => $request->kode_produk,

        ]);
        return redirect()->route('harga.show', $request->kecamatan);
    }

    /**
     * Display the specified resource.
     */
    public function show($kecamatan)
    {
        session(['kecamatan' => $kecamatan]);
        $hargas = Harga::where('kecamatan', $kecamatan)->get();
        $countHortikultura = Harga::where('kecamatan', $kecamatan)->where('komoditas', 'Hortikultura')->count();
        $countPangan = Harga::where('kecamatan', $kecamatan)->where('komoditas', 'Pangan')->count();
        $countPerkebunan = Harga::where('kecamatan', $kecamatan)->where('komoditas', 'Perkebunan')->count();
        if ($countHortikultura < 1) {
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Daun Bawang",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Daun Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Bawang Merah",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Umbi basah dengan daun (konde basah)",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Bawang Putih",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Umbi basah dengan daun (konde basah)",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Kembang Kol",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Sayuran Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Kentang",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Umbi Basah",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Kubis",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Daun Krop",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Petsai/Sawi",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Sayuran Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Wortel",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Umbi dengan daun",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Bayam",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Sayuran Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Buncis",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Polong basah",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Cabe Besar/TW/Teropong",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Buah Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Cabai Keriting",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Buah Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Cabe Rawit",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Buah Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Jamur Tiram",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Sayuran Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Jamur Merang",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Sayuran Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Jamur Lainya",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Sayuran Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Kacang Panjang",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Polong Basah",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Kangkung",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Sayuran Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Mentimun",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Buah Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Labu Siam",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Buah Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Paprika",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Buah Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Terung",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Buah Segar",
            ]);
            Harga::create([
                'komoditas' => "Hortikultura",
                'produk' => "Tomat",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Buah Segar",
            ]);
        }

        if ($countPangan < 1) {
            Harga::create([
                'komoditas' => "Pangan",
                'produk' => "Padi",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "GKP",
            ]);
            Harga::create([
                'komoditas' => "Pangan",
                'produk' => "Padi",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "GKG",
            ]);
            Harga::create([
                'komoditas' => "Pangan",
                'produk' => "Kedelai",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Biji Kering",
            ]);
            Harga::create([
                'komoditas' => "Pangan",
                'produk' => "Kacang Tanah",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Biji Kering",
            ]);
            Harga::create([
                'komoditas' => "Pangan",
                'produk' => "Kacang Hijau",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Biji Kering",
            ]);
            Harga::create([
                'komoditas' => "Pangan",
                'produk' => "Ubi Kayu",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Ubi Basah",
            ]);
            Harga::create([
                'komoditas' => "Pangan",
                'produk' => "Ubi Jalar",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Ubi Basah",
            ]);
        }

        if ($countPerkebunan < 1) {
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Teh",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Pucuk Teh Basah",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Kopi",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Berasan Arabika",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Kopi",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Berasan Robusta",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Tebu",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Gula Pasir",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Tembakau",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Rajangan",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Cengkeh",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Bunga Kering",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Kelapa",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Butiran",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Aren",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Gula Merah",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Nilai",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Daun Basah",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Nilam",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Daun Kering",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Lada",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Lada Putih",
            ]);
            Harga::create([
                'komoditas' => "Perkebunan",
                'produk' => "Kemiri",
                'harga' => 0,
                'kecamatan' => $kecamatan,
                'kode_produk' => "Kemiri Kupas",
            ]);
        
    }
        return view('backend.harga.show', compact('hargas', 'kecamatan'));

}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Harga $harga)
    {
        return view('backend.harga.edit', compact('harga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Harga $harga)
    {
        $harga->update([
            'komoditas' => $request->komoditas,
            'produk' => $request->produk,
            'harga' => $request->harga,
            'kecamatan' => $request->kecamatan,
            'kode_produk' => $request->kode_produk,
        ]);
        return redirect()->route('harga.show', $request->kecamatan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Harga $harga)
    {
        // dd($harga);
        $harga->delete();
        return redirect()->route('harga.show', session('kecamatan'));
    }
}
