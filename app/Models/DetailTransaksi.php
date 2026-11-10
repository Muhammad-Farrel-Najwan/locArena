<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';

    protected $primaryKey = 'id_detail_transaksi';

    protected $fillable = [
        'transaksi_id',
        'lapangan_id',
        'waktu_mulai',
        'waktu_selesai',
        'harga_per_jam',
        'subtotal',
        'status_booking',
        'kode_qr',
    ];

    protected function casts(): array
    {
        return [
            'waktu_mulai' => 'datetime',
            'waktu_selesai' => 'datetime',
            'harga_per_jam' => 'decimal:2',
            'subtotal' => 'decimal:2',
        ];
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id_transaksi');
    }

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class, 'lapangan_id', 'id_lapangan');
    }

    public function rating()
    {
        return $this->hasOne(Rating::class, 'detail_transaksi_id', 'id_detail_transaksi');
    }
}
