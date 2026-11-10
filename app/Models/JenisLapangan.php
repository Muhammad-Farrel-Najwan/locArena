<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisLapangan extends Model
{
    protected $table = 'jenis_lapangan';

    protected $primaryKey = 'id_jenis_lapangan';

    public $timestamps = false;

    protected $fillable = [
        'nama_lapangan',
        'deskripsi',
    ];
    public function lapangan()
    {
        return $this->hasMany(Lapangan::class, 'jenis_lapangan_id', 'id_jenis_lapangan');
    }
}
