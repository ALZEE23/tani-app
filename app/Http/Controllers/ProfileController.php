<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\User;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    //
    public function index(){
        return view('profile.index');
    }

    public function informasi()
    {
        // Ambil data kecamatan dari model Kecamatan

        // Tampilkan view 'profile.informasi' dengan data kecamatan
        $desa = Desa::where('kecamatan', auth()->user()->kecamatan)->get();
        return view('profile.informasi', ['desa' => $desa]);
    }

    public function sandi(){
        return view('profile.sandi');
    }

    public function edit(){
        
    }

    function informasiupdate($id,Request $request){
        $user = User::find($id);
        $user->kecamatan = $request->kecamatan;
        $user->desa = $request->desa;
        $user->jenis_kelamin = $request->jenis_kelamin;
        if ($request->hasFile('foto')) {
            $gambar = $request->file('foto');
            $nama = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('public/gambar', $nama);
            $user->foto = $nama;
        }
        $user->save();

        return back();
    }
    function informasiupdatepw($id,Request $request){
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return back();
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = auth()->user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => bcrypt($request->new_password),
            ]);

            return redirect()->route('home')->with('success', 'Password has been changed successfully.');
        } else {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }
    }

    
}

