<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';

    protected $primaryKey = 'id_kota';

    public $timestamps = false;

    protected $fillable = [
        'nama_kota',
        'provinsi_id',
    ];
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id', 'id_provinsi');
    }

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'kota_id', 'id_kota');
    }
}
