<?php

namespace App\Http\Controllers;

use App\Models\KegiatanSponsor;
use App\Models\KegiatanVolunteer;
use App\Models\Sponsor;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = Kegiatan::with(['volunteers', 'sponsors'])->get();
        $volunteer = Volunteer::all();
        $sponsor = Sponsor::all();
        return view('admin.kegiatan', ['kegiatans' => $kegiatan, 'volunteers' => $volunteer, 'sponsors' => $sponsor]);
        // var_dump($kegiatan);
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
        $kegiatan = new Kegiatan();
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->jadwal = $request->jadwal;
        $kegiatan->waktu = $request->waktu;
        $kegiatan->penyelenggara = $request->penyelenggara;
        $kegiatan->lokasi = $request->lokasi;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->save();

        $kegiatanvolunteer = new KegiatanVolunteer();
        $kegiatanvolunteer->volunteer_id = $request->volunteer_id;
        $kegiatanvolunteer->kegiatan_id = $kegiatan->id;
        $kegiatanvolunteer->save();

        $kegiatansponsor = new KegiatanSponsor();
        $kegiatansponsor->sponsor_id = $request->sponsor_id;
        $kegiatansponsor->kegiatan_id = $kegiatan->id;
        $kegiatansponsor->save();

        return redirect()->route('admin.kegiatan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $volunteer = Volunteer::all();
        $sponsor = Sponsor::all();
        $cover = Storage::url($kegiatan->cover);
        $photo = Storage::url($kegiatan->photo);
        $photo2 = Storage::url($kegiatan->photo2);
        $photo3 = Storage::url($kegiatan->photo3);
        return view('admin.kegiatan.edit', ['kegiatan' => $kegiatan, 'volunteers' => $volunteer, 'sponsors' => $sponsor, 'cover' => $cover, 'photo' => $photo, 'photo2' => $photo2, 'photo3' => $photo3]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
   
        $kegiatan = Kegiatan::findOrFail($id);
        return redirect()->route('admin.kegiatan.index', ['kegiatan' => $kegiatan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $pathCover = $kegiatan->cover;
        $pathPhoto = $kegiatan->photo;
        $pathPhoto2 = $kegiatan->photo2;
        $pathPhoto3 = $kegiatan->photo3;
    
        // Check if cover file is present
        if ($request->hasFile('cover')) {
            if ($pathCover !== null) {
                File::delete(public_path('storage/' . $pathCover));
            }
            $pathCover = $request->file('cover')->storePublicly('covers', 'public');
        }

        // Check if photo file is present
        if ($request->hasFile('photo')) {
            if ($pathPhoto !== null) {
                File::delete(public_path('storage/' . $pathPhoto));
            }
            $pathPhoto = $request->file('photo')->storePublicly('photos', 'public');
        }

        // Check if photo2 file is present
        if ($request->hasFile('photo2')) {
            if ($pathPhoto2 !== null) {
                File::delete(public_path('storage/' . $pathPhoto2));
            }
            $pathPhoto2 = $request->file('photo2')->storePublicly('photos', 'public');
        }

        // Check if photo3 file is present
        if ($request->hasFile('photo3')) {
            if ($pathPhoto3 !== null) {
                File::delete(public_path('storage/' . $pathPhoto3));
            }
            $pathPhoto3 = $request->file('photo3')->storePublicly('photos', 'public');
        }

        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->penyelenggara = $request->penyelenggara;
        $kegiatan->jadwal = $request->jadwal;
        $kegiatan->waktu = $request->waktu;
        $kegiatan->lokasi = $request->lokasi;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->cover = $pathCover;
        $kegiatan->photo = $pathPhoto;
        $kegiatan->photo2 = $pathPhoto2;
        $kegiatan->photo3 = $pathPhoto3;
        
        $kegiatan->save();

        return redirect()->route('admin.kegiatan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KegiatanSponsor::where('kegiatan_id', $id)->delete();
        KegiatanVolunteer::where('kegiatan_id', $id)->delete();
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();
        return redirect()->route('admin.kegiatan.index');
    }
}
