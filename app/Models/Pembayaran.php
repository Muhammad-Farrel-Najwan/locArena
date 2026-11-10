<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'transaksi_id',
        'jenis_pembayaran',
        'provider',
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

    protected function casts(): array
    {
        return [
            'nominal_pembayaran' => 'decimal:2',
            'expires_at' => 'datetime',
            'paid_at' => 'datetime',
        ];
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id_transaksi');
    }

    public function webhooks()
    {
        return $this->hasMany(PaymentWebhook::class, 'pembayaran_id', 'id_pembayaran');
    }
}
