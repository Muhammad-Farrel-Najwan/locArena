<?php

namespace App\Models;

use App\Models\kota;
use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    protected $table = 'provinsi';
    public $timestamps = false;
    protected $fillable = ['nama_provinsi'];

    public function kota() {
        return $this->hasMany(kota::class, 'provinsi_id');
    }
}
