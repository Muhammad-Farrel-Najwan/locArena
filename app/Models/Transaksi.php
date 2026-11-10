<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'customer_id',
        'pemilik_id',
        'total_harga',
        'metode_pembayaran',
        'persentase_dp',
        'status_transaksi',
        'batas_pembayaran',
        'batas_pelunasan',
    ];

    protected function casts(): array
    {
        return [
            'total_harga' => 'decimal:2',
            'persentase_dp' => 'decimal:2',
            'batas_pembayaran' => 'datetime',
            'batas_pelunasan' => 'datetime',
        ];
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id_user');
    }

    public function pemilik()
    {
        return $this->belongsTo(ProfilPemilik::class, 'pemilik_id', 'id_profil_pemilik');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id', 'id_transaksi');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'transaksi_id', 'id_transaksi');
    }
}
