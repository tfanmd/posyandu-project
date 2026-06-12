<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Warga extends Model
{
    use HasFactory; 

    protected $table = 'warga';

    protected $fillable = [
        'nik',
        'nama_lengkap',
        'kategori',
        'jenis_kelamin',
        'tanggal_lahir',
        'nama_orang_tua_wali',
        'alamat',
        'no_hp_kontak'
    ];
}
