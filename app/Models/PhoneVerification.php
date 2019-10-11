<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneVerification extends Model
{
    protected $fillable = [
        'phone',
        'code',
        'code_sent_at',
        'verified_at',
        'ip',
        'token',
    ];
}
