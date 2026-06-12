<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warga;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wargas = Warga::latest()->get();
        return view('kader.warga.index', compact('wargas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kader.warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'nullable|string|max:16|unique:warga,nik',
            'nama_lengkap' => 'required|string|max:255',
            'kategori' => 'required|string', // asumsi enum/string di database: balita, ibu_hamil, lansia, dll
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'nama_orang_tua_wali' => 'nullable|string|max:255',
            'alamat' => 'required|string',
            'no_hp_kontak' => 'nullable|string|max:20',
        ]);
        Warga::create($request->all());

        return redirect()->route('kader.warga.index')->with('success', 'Data sasaran warga berhasil ditambahkan!');
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
        $warga = Warga::findOrFail($id);
        return view('kader.warga.edit', compact('warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
            // Pengecualian unique NIK agar tidak error saat edit data sendiri
            'nik' => 'nullable|string|max:16|unique:warga,nik,' . $warga->id,
            'nama_lengkap' => 'required|string|max:255',
            'kategori' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'nama_orang_tua_wali' => 'nullable|string|max:255',
            'alamat' => 'required|string',
            'no_hp_kontak' => 'nullable|string|max:20',
        ]);

        $warga->update($request->all());

        return redirect()->route('kader.warga.index')->with('success', 'Data warga berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()->route('kader.warga.index')->with('success', 'Data warga berhasil dihapus!');
    }
}
