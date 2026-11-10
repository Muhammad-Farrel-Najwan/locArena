<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'nama_depan',
    'nama_belakang',
    'email',
    'password',
    'jenis_kelamin',
    'no_telepon',
    'role',
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_user';

    public $incrementing = true;

    protected $keyType = 'int';

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function profilPemilik()
    {
        return $this->hasOne(ProfilPemilik::class, 'user_id', 'id_user');
    }

    public function transaksiCustomer()
    {
        return $this->hasMany(Transaksi::class, 'customer_id', 'id_user');
    }

    public function riwayatVerifikasi()
    {
        return $this->hasMany(RiwayatVerifikasiVenue::class, 'admin_id', 'id_user');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'user_id', 'id_user');
    }

    public function replies()
    {
        return $this->hasMany(ReplyData::class, 'user_id', 'id_user');
    }
}
