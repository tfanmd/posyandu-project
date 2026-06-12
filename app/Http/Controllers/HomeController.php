<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\Kegiatan;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index()
    {
        // Menarik data statistik secara dinamis menggunakan Eloquent
        $stats = [
            'balita' => Warga::where('kategori', 'balita')->count(),
            'ibu_hamil' => Warga::where('kategori', 'ibu_hamil')->count(),
            'lansia' => Warga::where('kategori', 'lansia')->count(),
            'kegiatan_bulan_ini' => Kegiatan::whereMonth('waktu_mulai', Carbon::now()->month)
                ->whereYear('waktu_mulai', Carbon::now()->year)
                ->count(),
        ];

        // Tarik 3 jadwal kegiatan terdekat untuk ditampilkan di UI
        $jadwal_terdekat = Kegiatan::where('waktu_mulai', '>=', Carbon::now())
            ->orderBy('waktu_mulai', 'asc')
            ->take(3)
            ->get();

        return view('home', compact('stats', 'jadwal_terdekat'));
    }
}
