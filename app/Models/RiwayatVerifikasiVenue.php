<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatVerifikasiVenue extends Model
{
    protected $table = 'riwayat_verifikasi_venue';

    protected $primaryKey = 'id_riwayat';

    protected $fillable = [
        'venue_id',
        'admin_id',
        'status_sebelumnya',
        'status_baru',
        'catatan',
    ];
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id', 'id_venue');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id_user');
    }
}
