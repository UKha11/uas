<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Simpanan;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Simpanan::all();
        $anggota = Anggota::all();
        return view('simpanan', compact('data', 'anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required|string|max:191',
            'tanggal_pembayaran' => 'required|string|max:191',
            'uang' => 'required|string|max:191',
            'id_anggota' => 'required|string|max:191',
        ]);

        Simpanan::create([
            'bulan' => $request->bulan,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'uang' => $request->uang,
            'id_anggota' => $request->id_anggota,
        ]);

        return back()->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function show(Simpanan $simpanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Simpanan $simpanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bulan' => 'required|string|max:191',
            'tanggal_pembayaran' => 'required|string|max:191',
            'uang' => 'required|string|max:191',
            'id_anggota' => 'required|string|max:191',
        ]);

        Simpanan::where('id', $id)->update([
            'bulan' => $request->bulan,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'uang' => $request->uang,
            'id_anggota' => $request->id_anggota,
        ]);

        return back()->with('success', 'Berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Simpanan::destroy($id);
        return back()->with('success', 'Berhasil hapus data');
    }
}
