<?php

namespace App\Models;

use App\Models\kecamatan;
use App\Models\provinsi;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    protected $table = 'kota';
    public $timestamps = false;
    protected $fillable = ['nama_kota', 'provinsi_id'];

    public function provinsi() {
        return $this->belongsTo(provinsi::class, 'provinsi_id');
    }

    public function kecamatan() {
        return $this->hasMany(kecamatan::class, 'kota_id');
    }
}
