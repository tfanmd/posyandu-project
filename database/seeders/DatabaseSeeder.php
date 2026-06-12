<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\KaderProfile;
use App\Models\Warga;
use App\Models\Kegiatan;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $admin = User::create([
            'name' => 'Admin Posyandu',
            'email' => 'admin@posyandumelati.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        KaderProfile::create([
            'user_id' => $admin->id,
            'jabatan' => 'Ketua Posyandu',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Sehat Selalu No. 1, Desa Makmur',
            'status_aktif' => true,
        ]);

        Warga::factory(100)->create();

        // 3. Generate Data Kegiatan (Misal: 15 kegiatan)
        Kegiatan::factory(15)->create();

        // 4. Generate Konten Artikel & Berita (Misal: 20 postingan)
        Post::factory(20)->create();
    }
}
