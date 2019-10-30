<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Order;
use App\Helpers\PhoneHelper;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, Sortable;

    const DATE_FORMAT = "d.m.Y";
    const TIMEZONE = "Europe/Moscow";
    const DATE_HUMAN_FORMAT = "DD MMM YYYY HH:mm";

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

    public $sortable = [
        'id',
        'fio',
        'email',
        'phone',
        'updated_at',
    ];

    public $sortableAs = ['fio', 'orders_count'];

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

    public function getCreatedAtHumanAttribute($value)
    {
        $value = $this->attributes['created_at'];
        if(!empty($value))
            return Carbon::parse($value)->timezone(self::TIMEZONE)->isoFormat(self::DATE_HUMAN_FORMAT);

        return $value;

    }

    public function getUpdatedAtHumanAttribute($value)
    {

        $value = $this->attributes['updated_at'];

        if(!empty($value))
            return Carbon::parse($value)->timezone(self::TIMEZONE)->isoFormat(self::DATE_HUMAN_FORMAT);

        return $value;

    }

    public function getTypeIconAttribute()
    {
        switch ($this->attributes['userable_type']) {
            case 'App\Models\Administration':
                return 'fa fa-user-shield text-danger';
                break;
            case 'App\Models\Client':
                return 'fa fa-user text-success';
                break;
        }
    }

    public function getFullNameAttribute()
    {
        return $this->surname.' '.$this->name.' '.$this->patronymic;
    }

    public function isAdmin()
    {
        return ($this->userable instanceof Administration);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getLastOrders()
    {
        return $this->orders()->where('steps_completed', 3)->where('status', '>', 0)->orderBy('created_at', 'DESC');
    }
}
