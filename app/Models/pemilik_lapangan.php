<?php

namespace App\Models;

use App\Models\transaksi;
use App\Models\venue;
use Illuminate\Database\Eloquent\Model;

class pemilik_lapangan extends Model
{
    protected $table = 'pemilik_lapangan';
    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'email',
        'password',
        'jenis_kelamin',
        'no_telepon',
        'no_ktp',
        'foto_ktp'
    ];

    public function transaksi() {
        return $this->hasMany(transaksi::class, 'pemilik_id');
    }

    public function venue() {
        return $this->hasMany(venue::class, 'pemilik_id');
    }
}
