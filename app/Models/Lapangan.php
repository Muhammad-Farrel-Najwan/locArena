<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $table = 'lapangan';

    protected $primaryKey = 'id_lapangan';

    protected $fillable = [
        'venue_id',
        'jenis_lapangan_id',
        'nama_lapangan',
        'deskripsi_lapangan',
        'is_indoor',
        'harga_per_jam',
        'status',
        'jenis_lantai',
    ];

    protected function casts(): array
    {
        return [
            'is_indoor' => 'boolean',
            'harga_per_jam' => 'decimal:2',
        ];
    }
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id', 'id_venue');
    }

    public function jenisLapangan()
    {
        return $this->belongsTo(JenisLapangan::class, 'jenis_lapangan_id', 'id_jenis_lapangan');
    }

    public function jadwalTidakTersedia()
    {
        return $this->hasMany(JadwalTidakTersedia::class, 'lapangan_id', 'id_lapangan');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'lapangan_id', 'id_lapangan');
    }
}
