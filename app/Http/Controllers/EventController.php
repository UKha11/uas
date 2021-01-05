<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::all();
        return view('event', compact('data'));
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
            'tanggal' => 'required|string|max:191',
            'waktu' => 'required|string|max:191',
            'tempat' => 'required|string|max:191',
            'tema' => 'nullable|string|max:191',
            'htm' => 'nullable|string|max:191',
        ]);

        Event::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'tema' => $request->tema,
            'htm' => $request->htm,
        ]);

        return back()->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        $peserta = [];
        foreach ($event->peserta as $key => $value) {
            $peserta[$key] = $value->id;
        }
        $anggota = Anggota::whereNotIn('id', $peserta)->get();
        return view('event-peserta', compact('event', 'anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->peserta) {
            if ($request->peserta == 'Pilih Peserta') {
                return back()->with('failed', 'Gagal tambah peserta');
            }
            $event = Event::find($id);
            $event->peserta()->attach($request->peserta);
            return back()->with('success', 'Berhasil tambah peserta');
        }else{
            $request->validate([
                'nama' => 'required|string|max:191',
                'tanggal' => 'required|string|max:191',
                'waktu' => 'required|string|max:191',
                'tempat' => 'required|string|max:191',
                'tema' => 'nullable|string|max:191',
                'htm' => 'nullable|string|max:191',
            ]);
            Event::where('id', $id)->update([
                'nama' => $request->nama,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'tempat' => $request->tempat,
                'tema' => $request->tema,
                'htm' => $request->htm,
            ]);
            return back()->with('success', 'Berhasil ubah data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::destroy($id);
        return back()->with('success', 'Berhasil hapus data');
    }

    public function hapusPeserta(Request $request, $id)
    {
        $event = Event::find($id);
        $event->peserta()->detach($request->id_peserta);
        return back()->with('success', 'Berhasil hapus peserta');
    }
}
