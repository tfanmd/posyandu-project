<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KaderProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kaders = User::with('kaderProfile')->where('role', 'kader')->get();
        return view('admin.kader.index', compact('kaders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kader.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'jabatan' => 'required|string',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);

        // Menggunakan Database Transaction agar aman. 
        // Jika gagal simpan profil, akun user juga batal dibuat.
        DB::transaction(function () use ($request) {
            // A. Buat Akun Login
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'kader', // Otomatis set role sebagai kader
            ]);

            // B. Buat Profil Detail Kader
            KaderProfile::create([
                'user_id' => $user->id,
                'jabatan' => $request->jabatan,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'status_aktif' => true,
            ]);
        });

        return redirect()->route('admin.kader.index')->with('success', 'Akun Kader berhasil ditambahkan!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
