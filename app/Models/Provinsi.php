<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';

    protected $primaryKey = 'id_provinsi';

    public $timestamps = false;

    protected $fillable = [
        'nama_provinsi',
    ];
    public function kota()
    {
        return $this->hasMany(Kota::class, 'provinsi_id', 'id_provinsi');
    }
}
