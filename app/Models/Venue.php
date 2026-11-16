<?php

namespace App\Models;

use App\Models\kecamatan;
use App\Models\lapangan;
use App\Models\jadwal_operasional;
use App\Models\pemilik_lapangan;
use Illuminate\Database\Eloquent\Model;

class venue extends Model
{
    protected $table = 'venue';
    protected $fillable = [
        'pemilik_id',
        'kecamatan_id',
        'nama_venue',
        'detail_alamat',
        'latitude',
        'longitude',
        'status_verifikasi',
        'alasan_penolakan'
    ];

    public function kecamatan() {
        return $this->belongsTo(kecamatan::class, 'kecamatan_id');
    }

    public function lapangan() {
        return $this->hasMany(lapangan::class, 'venue_id');
    }

    public function jadwal_operasional() {
        return $this->hasMany(jadwal_operasional::class, 'venue_id');
    }

    public function pemilik_lapangan() {
        return $this->belongsTo(pemilik_lapangan::class, 'pemilik_id');
    }
}
