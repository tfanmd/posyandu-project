<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KaderProfile extends Model
{
    protected $fillable = ['user_id', 'jabatan', 'no_hp', 'alamat', 'foto', 'status_aktif'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
