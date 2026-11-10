<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $table = 'venue';

    protected $primaryKey = 'id_venue';

    protected $fillable = [
        'pemilik_id',
        'kecamatan_id',
        'nama_venue',
        'detail_alamat',
        'latitude',
        'longitude',
        'status_verifikasi',
        'alasan_penolakan',
    ];
    public function pemilik()
    {
        return $this->belongsTo(ProfilPemilik::class, 'pemilik_id', 'id_profil_pemilik');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id_kecamatan');
    }

    public function riwayatVerifikasi()
    {
        return $this->hasMany(RiwayatVerifikasiVenue::class, 'venue_id', 'id_venue');
    }

    public function lapangan()
    {
        return $this->hasMany(Lapangan::class, 'venue_id', 'id_venue');
    }

    public function jadwalOperasional()
    {
        return $this->hasMany(JadwalOperasional::class, 'venue_id', 'id_venue');
    }
}
