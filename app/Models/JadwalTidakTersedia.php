<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalTidakTersedia extends Model
{
    protected $table = 'jadwal_tidak_tersedia';

    protected $primaryKey = 'id_jadwal_tidak_tersedia';

    protected $fillable = [
        'lapangan_id',
        'waktu_mulai',
        'waktu_selesai',
        'alasan',
    ];

    protected function casts(): array
    {
        return [
            'waktu_mulai' => 'datetime',
            'waktu_selesai' => 'datetime',
        ];
    }
    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class, 'lapangan_id', 'id_lapangan');
    }
}
