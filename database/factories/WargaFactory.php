<?php

namespace Database\Factories;

use App\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Warga>
 */
class WargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');

        $kategori = $faker->randomElement(['balita', 'ibu_hamil', 'lansia']);

        // Logika penyesuaian umur berdasarkan kategori
        $tanggal_lahir = match ($kategori) {
            'balita' => $faker->dateTimeBetween('-5 years', 'now'),
            'ibu_hamil' => $faker->dateTimeBetween('-35 years', '-20 years'),
            'lansia' => $faker->dateTimeBetween('-80 years', '-60 years'),
        };

        return [
            'nik' => $faker->numerify('3273############'), // Format NIK
            'nama_lengkap' => $faker->name(),
            'kategori' => $kategori,
            'jenis_kelamin' => $faker->randomElement(['L', 'P']),
            'tanggal_lahir' => $tanggal_lahir->format('Y-m-d'),
            'nama_orang_tua_wali' => $kategori === 'balita' ? $faker->name() : null,
            'alamat' => $faker->address(),
            'no_hp_kontak' => $faker->phoneNumber(),
        ];
    }
}
