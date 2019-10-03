<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\BaseAdminModel;

class Review extends BaseAdminModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'content',
        'date',
        'ordering',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Converting date attribute to timezone when getting
     *
     * @param mixed $value
     * @return mixed $value
     */
    public function getTitleAttribute($value)
    {
        return $this->name;
    }

    /**
     * Converting date attribute to timezone when getting
     *
     * @param mixed $value
     * @return mixed $value
     */
    public function getDateAttribute($value)
    {
        if(!empty($value))
            return Carbon::parse($value)->timezone(self::TIMEZONE);

        return $value;
    }

    /**
     * Getting humanized & timezonned date
     *
     * @param mixed $value
     * @return mixed $value
     */
    public function getDateHumanAttribute()
    {
        if(!empty($this->date))
            return Carbon::parse($this->date)->timezone(self::TIMEZONE)->isoFormat(self::DATE_FORMAT);

        return $this->date;
    }

    /**
     * Converting date attribute to UTC when setting
     *
     * @param mixed $value
     * @return void
     */
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value;

        if(!empty($value))
            $this->attributes['date'] = Carbon::createFromFormat("Y-m-d H:i:s", $value, self::TIMEZONE)->setTimezone(config('app.timezone'))->toDateTimeString();

    }

    /**
     * Get all model's images
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imagable')->orderBy('ordering', 'asc')->orderBy('id', 'asc');
    }

    /**
     * Get all model's enabled images
     */
    public function enabledImages()
    {
        return $this->images()->where('status', 1);
    }

    /**
     * Get all model's enabled images
     */
    public function firstEnabledImage()
    {
        return $this->morphOne(Image::class, 'imagable')->orderBy('ordering', 'asc')->orderBy('id', 'asc');
    }
}
