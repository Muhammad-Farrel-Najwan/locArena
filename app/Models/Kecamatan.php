<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    protected $primaryKey = 'id_kecamatan';

    public $timestamps = false;

    protected $fillable = [
        'nama_kecamatan',
        'kota_id',
    ];
    public function kota()
    {
        return $this->belongsTo(Kota::class, 'kota_id', 'id_kota');
    }

    public function venues()
    {
        return $this->hasMany(Venue::class, 'kecamatan_id', 'id_kecamatan');
    }
}
