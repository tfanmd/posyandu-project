<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');
        $judul = $faker->sentence(6);
        return [
            'user_id' => 1, // Admin pertama
            'judul' => $judul,
            'slug' => Str::slug($judul),
            'tipe' => $faker->randomElement(['artikel', 'berita', 'pengumuman']),
            'konten' => '<p>' . implode('</p><p>', $faker->paragraphs(5)) . '</p>',
            'status' => 'published',
            'views_count' => $faker->numberBetween(10, 1000),
        ];
    }
}
