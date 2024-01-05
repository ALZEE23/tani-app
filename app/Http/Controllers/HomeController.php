<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            return redirect('/admin/dashboard');
        }
        return view('home');
    }



    public function showUploadForm()
    {
        return view('upload_form');
    }

    public function importUsers(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls', // Validasi tipe file
        ]);

        $file = $request->file('excel_file');

        Excel::import(new UsersImport, $file);

        return redirect()->back()->with('success', 'Data berhasil diimpor!');
    }

}
