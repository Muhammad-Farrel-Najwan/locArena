<?php

namespace App\Models;

use App\Models\pembayaran;
use App\Models\users;
use App\Models\pemilik_lapangan;
use App\Models\detail_transaksi;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'user_id',
        'pemilik_id',
        'total_harga',
        'metode_pembayaran',
        'status_transaksi',
        'batas_pembayaran',
        'batas_pelunasan'
    ];

    public function pemilik_lapangan() {
        return $this->belongsTo(pemilik_lapangan::class,'pemilik_id');
    }

    public function detail_transaksi() {
        return $this->hasMany(detail_transaksi::class, 'transaksi_id');
    }

    public function pembayaran() {
        return $this->hasMany(pembayaran::class,'transaksi_id');
    }

    public function users() {
        return $this->belongsTo(users::class, 'user_id');
    }
}
