<?php

namespace App\Models;

use Carbon\Carbon;
use App\Helpers\PhoneHelper;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const DATE_FORMAT = "d.m.Y";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Polymorph relation to other user entities
     *
     * @return relation
     */
    public function userable()
    {
        return $this->morphTo();
    }

    public function setPhoneAttribute($value){
        $this->attributes['phone'] = PhoneHelper::standartizeNumber($value);
    }

    public function getBirthdayHumanAttribute($value)
    {
        if(!empty($this->userable->birthday))
            return Carbon::parse($this->userable->birthday)->format(self::DATE_FORMAT);

        return $value;
    }

    public function isAdmin()
    {
        return ($this->userable instanceof Administration);
    }
}
