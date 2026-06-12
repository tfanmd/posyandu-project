<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Illuminate\Support\Str;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = Kegiatan::orderBy('waktu_mulai', 'asc')->get();
        return view('kader.jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kader.jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after:waktu_mulai', // Selesai harus setelah mulai
            'lokasi' => 'required|string|max:255',
            'kategori_sasaran' => 'required|in:balita,ibu_hamil,lansia,umum',
            'deskripsi' => 'nullable|string',
        ]);

        Kegiatan::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'slug' => Str::slug($request->nama_kegiatan . '-' . Str::random(5)),
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'lokasi' => $request->lokasi,
            'kategori_sasaran' => $request->kategori_sasaran,
            'deskripsi' => $request->deskripsi,
            'status' => 'akan_datang',
        ]);

        return redirect()->route('kader.jadwal.index')->with('success', 'Jadwal kegiatan berhasil ditambahkan!');
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
        $jadwal = Kegiatan::findOrFail($id);
        return view('kader.jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jadwal = Kegiatan::findOrFail($id);

        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after:waktu_mulai',
            'lokasi' => 'required|string|max:255',
            'kategori_sasaran' => 'required|in:balita,ibu_hamil,lansia,umum',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:akan_datang,berlangsung,selesai',
        ]);

        $data = $request->all();

        $data['slug'] = Str::slug($request->nama_kegiatan . '-' . Str::random(5));

        $jadwal->update($request->all());

        return redirect()->route('kader.jadwal.index')->with('success', 'Jadwal kegiatan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Kegiatan::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('kader.jadwal.index')->with('success', 'Jadwal kegiatan berhasil dihapus!');
    }
}
