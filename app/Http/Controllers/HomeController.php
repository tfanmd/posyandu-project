<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\Kegiatan;
use App\Models\Post;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index()
    {
        // 1. Hitung statistik riil dari database tabel warga & kegiatan
        $stats = [
            'balita' => Warga::where('kategori', 'balita')->count(),
            'ibu_hamil' => Warga::where('kategori', 'ibu_hamil')->count(),
            'lansia' => Warga::where('kategori', 'lansia')->count(),
            // Menghitung jadwal yang ada di bulan berjalan saat ini
            'kegiatan_bulan_ini' => Kegiatan::whereMonth('waktu_mulai', Carbon::now()->month)
                ->whereYear('waktu_mulai', Carbon::now()->year)
                ->count(),
        ];

        // 2. Tarik 3 artikel/berita terbaru untuk sektor edukasi warga
        $articles = Post::where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        // 3. Tarik jadwal kegiatan mendatang (diurutkan dari yang paling dekat)
        $jadwal_terdekat = Kegiatan::whereIn('status', ['akan_datang', 'berlangsung'])
            ->orderBy('waktu_mulai', 'asc')
            ->take(3)
            ->get();

        // Kirim semua komponen data ke view welcome
        return view('welcome', compact('stats', 'articles', 'jadwal_terdekat'));
    }
}
