<?php

namespace App\Models;

use App\Models\detail_transaksi;
use App\Models\jenis_lapangan;
use App\Models\rating;
use App\Models\venue;
use Illuminate\Database\Eloquent\Model;

class lapangan extends Model
{
    protected $table = 'lapangan';
    protected $fillable = [
        'venue_id',
        'jenis_lapangan',
        'nama_lapangan',
        'deskripsi_lapangan',
        'is_indoor',
        'harga_per_jam',
        'status',
        'jenis_lantai'
    ];

    public function jenis_lapangan() {
        return $this->belongsTo(jenis_lapangan::class, 'jenis_lapangan_id');
    }

    public function venue() {
        return $this->belongsTo(venue::class, 'venue_id');
    }

    public function detail_transaksi() {
        return $this->hasMany(detail_transaksi::class, 'lapangan_id');
    }

    public function rating() {
        return $this->hasMany(rating::class, 'lapangan_id');
    }
}
