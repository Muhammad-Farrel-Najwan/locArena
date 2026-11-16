<?php

namespace App\Models;

use App\Models\pembayaran;
use Illuminate\Database\Eloquent\Model;

class payment_webhook extends Model
{
    protected $table = 'payment_webhook';
    public $timestamps = false;
    protected $fillable = [
        'pembayaran_id',
        'payload',
        'payload_hash',
        'signature_valid',
        'processing_status',
        'received_at',
        'processed_at'
    ];

    public function pembayaran() {
        return $this->belongsTo(pembayaran::class, 'pembayaran_id');
    }
}
