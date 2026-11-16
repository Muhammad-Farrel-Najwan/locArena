<?php

namespace App\Models;

use App\Models\rating;
use App\Models\transaksi;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'users';
    protected $fillable = [
    'nama_depan',
    'nama_belakang',
    'email',
    'email_verified_at',
    'password',
    'jenis_kelamin',
    'no_telepon',
    'role'];

    public function rating() {
        return $this->hasMany(rating::class,'user_id');
    }

    public function transaksi() {
        return $this->hasMany(transaksi::class, 'user_id');
    }
}
