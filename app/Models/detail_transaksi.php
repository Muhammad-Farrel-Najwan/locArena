<?php

namespace App\Models;

use App\Models\lapangan;
use App\Models\rating;
use App\Models\transaksi;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $fillable = [
        'transaksi_id',
        'lapangan_id',
        'waktu_mulai',
        'waktu_selesai',
        'harga_per_jam',
        'subtotal',
        'status_booking',
        'kode_qr'
    ];

    public function lapangan() {
        return $this->belongsTo(lapangan::class, 'lapangan_id');
    }

    public function transaksi() {
        return $this->belongsTo(transaksi::class, 'transaksi_id');
    }

    public function rating() {
        return $this->hasOne(rating::class, 'detail_transaksi_id');
    }
}
