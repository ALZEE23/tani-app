<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::where('role', 'petugas')->get();
        return view('backend.petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $petugas = new User();
        $petugas->name = $request->nama;
        $petugas->email = $request->email;
        $petugas->username = $request->username;
        $petugas->nik = $request->nik;
        $petugas->no_telepon = $request->no_telepon;
        $petugas->password = bcrypt($request->password);
        $petugas->role = 'petugas';
        $petugas->save();
        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $petugas = User::find($id);
        return view('backend.petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugas = User::find($id);
        $petugas->name = $request->nama;
        $petugas->email = $request->email;
        $petugas->username = $request->username;
        $petugas->nik = $request->nik;
        $petugas->no_telepon = $request->no_telepon;
        $petugas->save();
        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = User::find($id);
        $petugas->delete();
        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil dihapus');
    }
}
