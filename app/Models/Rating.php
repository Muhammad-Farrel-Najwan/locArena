<?php

namespace App\Models;

use App\Models\lapangan;
use App\Models\users;
use App\Models\detail_transaksi;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    protected $table = 'rating';
    public $timestamps = false;
    protected $fillable = [
        'detail_transaksi_id',
        'lapangan_id',
        'user_id',
        'nilai_rating',
        'deskripsi_rating',
        'tanggal_rating'
    ];

    public function users() {
        return $this->belongsTo(users::class, 'user_id');
    }

    public function detail_transaksi() {
        return $this->belongsTo(detail_transaksi::class, 'detail_transaksi_id');
    }

    public function lapangan() {
        return $this->belongsTo(lapangan::class, 'lapangan_id');
    }
}
