<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PhoneVerification extends Model
{
    use Notifiable;

    public function routeNotificationForSmscru()
    {
        return $this->phone;
    }

    protected $fillable = [
        'phone',
        'code',
        'code_sent_at',
        'verified_at',
        'ip',
        'token',
    ];
}
