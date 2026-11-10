<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalOperasional extends Model
{
    protected $table = 'jadwal_operasional';

    protected $primaryKey = 'id_jadwal';

    public $timestamps = false;

    protected $fillable = [
        'venue_id',
        'hari',
        'jam_buka',
        'jam_tutup',
        'is_buka',
    ];

    protected function casts(): array
    {
        return [
            'hari' => 'integer',
            'is_buka' => 'boolean',
        ];
    }
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id', 'id_venue');
    }
}
