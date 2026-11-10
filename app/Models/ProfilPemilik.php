<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilPemilik extends Model
{
    protected $table = 'profil_pemilik';

    protected $primaryKey = 'id_profil_pemilik';

    protected $fillable = [
        'user_id',
        'no_ktp',
        'foto_ktp',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function venues()
    {
        return $this->hasMany(Venue::class, 'pemilik_id', 'id_profil_pemilik');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'pemilik_id', 'id_profil_pemilik');
    }
}
