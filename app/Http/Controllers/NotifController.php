<?php

namespace App\Http\Controllers;

use App\Models\Notif;
use Illuminate\Http\Request;

class NotifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil notifikasi dengan status 0 berdasarkan user_id
        $notif = Notif::where('user_id', auth()->user()->id)
            ->get();

        // Update semua notifikasi dengan status 0 menjadi status 1
        Notif::where('user_id', auth()->user()->id)
            ->where('status', 0)
            ->update(['status' => 1]);

        return view('notif.index', compact('notif'));
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
    public function show(Notif $notif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notif $notif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notif $notif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notif $notif)
    {
        //
    }
}
