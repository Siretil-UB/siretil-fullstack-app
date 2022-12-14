<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function receiverUser()
    {
        return $this->belongsTo(User::class, 'receiver', 'nim');
    }

    public function senderUser()
    {
        return $this->belongsTo(User::class, 'sender', 'nim');
    }

    public static function getKetuaNotification($message)
    {
        $messageData = array();
        foreach ($message as  $m) {
            $data = $m->getAttributes();
            $data['receiver'] = $m->receiverUser->nama;
            $data['sender'] = $m->senderUser->nama;
            array_push($messageData, $data);
        }

        return $messageData;
    }
}
