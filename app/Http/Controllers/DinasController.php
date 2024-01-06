<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DinasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dinas = User::where('role', 'dinas')->get();
        return view('backend.dinas.index', compact('dinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.dinas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dinas = new User();
        $dinas->name = $request->nama;
        $dinas->email = $request->email;
        $dinas->username = $request->username;
        $dinas->nik = $request->nik;
        $dinas->no_telepon = $request->no_telepon;
        $dinas->password = bcrypt($request->password);
        $dinas->role = 'dinas';
        $dinas->save();
        return redirect()->route('dinas.index')->with('success', 'Data dinas berhasil ditambahkan');

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
        $dinas = User::find($id);
        return view('backend.dinas.edit', compact('dinas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dinas = User::find($id);
        $dinas->name = $request->nama;
        $dinas->email = $request->email;
        $dinas->username = $request->username;
        $dinas->nik = $request->nik;
        $dinas->no_telepon = $request->no_telepon;
        $dinas->password = bcrypt($request->password);
        $dinas->role = 'dinas';
        $dinas->save();
        return redirect()->route('dinas.index')->with('success', 'Data dinas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dinas = User::find($id);
        $dinas->delete();
        return redirect()->route('dinas.index')->with('success', 'Data dinas berhasil dihapus');
    }
}
