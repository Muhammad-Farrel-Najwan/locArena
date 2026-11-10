<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReplyData extends Model
{
    protected $table = 'reply_data';

    protected $primaryKey = 'id_reply';

    protected $fillable = [
        'ticket_id',
        'user_id',
        'deskripsi_reply',
        'jenis_penyelesaian',
        'status',
    ];
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'id_ticket');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
