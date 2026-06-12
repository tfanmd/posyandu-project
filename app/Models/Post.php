<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'judul',
        'slug',
        'tipe',
        'konten',
        'gambar_thumbnail',
        'status',
        'views_count'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Scope untuk mempermudah query di frontend (Hanya ambil yang published)
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

}
