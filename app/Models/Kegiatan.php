<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';

    protected $fillable = [
        'nama_kegiatan',
        'slug',
        'kategori_sasaran',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi',
        'deskripsi',
        'created_by'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    //
}
