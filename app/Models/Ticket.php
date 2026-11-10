<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket';

    protected $primaryKey = 'id_ticket';

    protected $fillable = [
        'user_id',
        'deskripsi_laporan',
        'jenis_laporan',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function replies()
    {
        return $this->hasMany(ReplyData::class, 'ticket_id', 'id_ticket');
    }
}
