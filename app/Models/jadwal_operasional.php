<?php

namespace App\Models;

use App\Models\venue;
use Illuminate\Database\Eloquent\Model;

class jadwal_operasional extends Model
{
    protected $table = 'jadwal_operasional';
    public $timestamps = false;
    protected $fillable = [
        'hari',
        'jam_buka',
        'jam_tutup',
        'venue_id'
    ];

    public function venue() {
        return $this->belongsTo(venue::class, 'venue_id');
    }
}
