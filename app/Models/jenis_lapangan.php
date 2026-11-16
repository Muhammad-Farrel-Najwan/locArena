<?php

namespace App\Models;

use App\Models\lapangan;
use Illuminate\Database\Eloquent\Model;

class jenis_lapangan extends Model
{
    protected $table = 'jenis_lapangan';
    public $timestamps = false;
    protected $fillable = ['nama_lapangan'];

    public function lapangan() {
        return $this->hasMany(lapangan::class, 'jenis_lapangan_id');
    }
}
