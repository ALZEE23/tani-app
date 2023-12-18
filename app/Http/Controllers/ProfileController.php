<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index(){
        return view('profile.index');
    }

    public function informasi(){
       
        return view('profile.informasi');
    }

    public function sandi(){
        return view('profile.sandi');
    }

    public function edit(){
        
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

