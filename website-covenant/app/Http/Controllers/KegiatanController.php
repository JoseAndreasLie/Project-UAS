<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatans = Kegiatan::all();
        return view('admin.kegiatan', ['kegiatan' => $kegiatans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $path = $request->file('photo')->storePublicly('photos', 'public');
        // $ext = $request->file('photo')->extension();

        $kegiatan = new Kegiatan();
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->tanggal = $request->tanggal;
        $kegiatan->waktu = $request->waktu;
        $kegiatan->penyelenggara = $request->penyelenggara;
        $kegiatan->lokasi = $request->lokasi;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->volunteer_id = $request->volunteer_id;
        $kegiatan->sponsor_id = $request->sponsor_id ;
        // $kegiatan->photo = $path;
        $kegiatan->save();

        return redirect('/kegiatans');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $photo = Storage::url($kegiatan->photo);
        return view('kegiatans.show', ['kegiatan' => $kegiatan, 'photo' => $kegiatan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatans.edit', ['kegiatan' => $kegiatan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->tanggal = $request->tanggal;
        $kegiatan->waktu = $request->waktu;
        $kegiatan->oleh = $request->oleh;
        $kegiatan->lokasi = $request->lokasi;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->save();

        return redirect('/kegiatans');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan -> delete();
        return redirect('/kegiatans');
    }
}
