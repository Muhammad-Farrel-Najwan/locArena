<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';

    protected $primaryKey = 'id_rating';

    public $timestamps = false;

    protected $fillable = [
        'detail_transaksi_id',
        'nilai_rating',
        'deskripsi_rating',
        'tanggal_rating',
    ];

    protected function casts(): array
    {
        return [
            'nilai_rating' => 'integer',
            'tanggal_rating' => 'datetime',
        ];
    }
    public function detailTransaksi()
    {
        return $this->belongsTo(DetailTransaksi::class, 'detail_transaksi_id', 'id_detail_transaksi');
    }
}
