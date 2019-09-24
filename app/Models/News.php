<?php

namespace App\Models;

use App\Models\BaseAdminModel;

class News extends BaseAdminModel
{
    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country',
        'title',
        'slug',
        'excerpt',
        'content',
        'date',
        'ordering',
        'status',
        'seo_name',
        'seo_keywords',
        'seo_description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    // casting date on get
    public function getDateAttribute($value)
    {
        if(!empty($value))
            return Carbon::parse($value)->timezone(self::TIMEZONE)->isoFormat(self::DATE_FORMAT);

        return $value;
    }

    // casting date on set
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value;

        if(!empty($value))
            $this->attributes['date'] = Carbon::createFromFormat("Y-m-d H:i:s", $value, self::TIMEZONE)->setTimezone(config('app.timezone'))->toDateTimeString();

    }

    /**
     * Get all of the post's comments.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imagable')->orderBy('ordering', 'asc')->orderBy('id', 'asc');
    }
}
