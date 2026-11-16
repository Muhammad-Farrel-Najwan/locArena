<?php

namespace App\Models;

use App\Models\transaksi;
use App\Models\payment_webhook;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $fillable = [
        'transaksi_id',
        'jenis_pembayaran',
        'external_order_id',
        'provider_transaction_id',
        'nominal_pembayaran',
        'status',
        'snap_token',
        'payment_url',
        'provider_status',
        'expires_at',
        'paid_at',
    ];

    public function transaksi() {
        return $this->belongsTo(transaksi::class, 'transaksi_id');
    }

    public function payment_webhook() {
        return $this->hasMany(payment_webhook::class, 'pembayaran_id');
    }
}
