<?php

namespace Database\Factories;

use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Kegiatan>
 */
class KegiatanFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');

        $kegiatan = [
            'Penimbangan Rutin Balita',
            'Pemberian Vitamin A',
            'Imunisasi DPT',
            'Senam Lansia',
            'Pemeriksaan Kandungan'
        ];
        $nama_kegiatan = $faker->randomElement($kegiatan) . ' Bulan ' . $faker->monthName();
        $waktu_mulai = $faker->dateTimeBetween('-1 month', '+1 month');
        return [
            'nama_kegiatan' => $nama_kegiatan,
            'slug' => Str::slug($nama_kegiatan . '-' . Str::random(5)),
            'kategori_sasaran' => $faker->randomElement(['balita', 'ibu_hamil', 'lansia', 'umum']),
            'waktu_mulai' => $waktu_mulai,
            'waktu_selesai' => (clone $waktu_mulai)->modify('+3 hours'),
            'lokasi' => 'Balai Warga Posyandu Melati',
            'deskripsi' => $faker->paragraph(),
            'created_by' => 1,
        ];
    }
}
