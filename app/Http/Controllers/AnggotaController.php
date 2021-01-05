<?php

namespace App\Http\Controllers;

use App\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Anggota::all();
        return view('anggota', compact('data'));
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
            'nama' => 'required|string|max:191',
            'nia' => 'required|string|max:191',
            'fakultas' => 'required|string|max:191',
            'jurusan' => 'required|string|max:191',
            'hp' => 'required|string|max:13',
            'email' => 'required|email|max:191',
        ]);

        Anggota::create([
            'nama' => $request->nama,
            'nia' => $request->nia,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
            'hp' => $request->hp,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:191',
            'nia' => 'required|string|max:191',
            'fakultas' => 'required|string|max:191',
            'jurusan' => 'required|string|max:191',
            'hp' => 'required|string|max:13',
            'email' => 'required|email|max:191',
        ]);

        Anggota::where('id', $id)->update([
            'nama' => $request->nama,
            'nia' => $request->nia,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
            'hp' => $request->hp,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Anggota::destroy($id);
        return back()->with('success', 'Berhasil hapus data');
    }
}
