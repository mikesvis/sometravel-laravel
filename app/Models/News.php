<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
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

    /**
     * Get different route model binding depending for admin & front
     *
     * @return string model attribute
     */
    function getRouteKeyName()
    {
        return request()->segment(1) === 'admin' ? 'id' : 'slug';
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
     * Setting slug depending on title when slug is null
     *
     * @param [type] $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        if(empty($value)){
            $this->attributes['slug'] = Str::slug($this->attributes['title'], '-');
            $uniqueSlugsCount = News::where('slug', $this->attributes['slug'])->where('id', '<>', $this->id)->count();
            if($uniqueSlugsCount != 0)
                $this->attributes['slug'] .= '-'.($uniqueSlugsCount+1);
        }
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
