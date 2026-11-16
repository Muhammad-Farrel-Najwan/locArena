<?php

namespace App\Models;

use App\Models\kota;
use App\Models\venue;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    protected $table = 'kecamatan';
    public $timestamps = false;
    protected $fillable = ['nama_kecamatan', 'kota_id'];

    public function kota() {
        return $this->belongsTo(kota::class, 'kota_id');
    }

    public function venue() {
        return $this->hasMany(venue::class, 'kecamatan_id');
    }
}
