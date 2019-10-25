<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BaseAdminModel extends Model
{

    const TIMEZONE = "Europe/Moscow";
    const DATE_FORMAT = "DD MMM YYYY HH:mm";
    const DATE_FORMAT_DATE_SIMPLE = "DD.MM.YYYY";

    public function getCreatedAtAttribute($value)
    {

        if(!empty($value))
            return Carbon::parse($value)->timezone(self::TIMEZONE)->isoFormat(self::DATE_FORMAT);

        return $value;

    }

    public function getUpdatedAtAttribute($value)
    {

        if(!empty($value))
            return Carbon::parse($value)->timezone(self::TIMEZONE)->isoFormat(self::DATE_FORMAT);

        return $value;

    }

    public function getCreatedAtDateSimpleAttribute($value)
    {

        if(!empty($this->attributes['created_at']))
            return Carbon::parse($this->attributes['created_at'])->timezone(self::TIMEZONE)->isoFormat(self::DATE_FORMAT_DATE_SIMPLE);

        return $value;

    }

    public function getUpdatedAtDateSimpleAttribute($value)
    {

        if(!empty($this->attributes['updated_at']))
            return Carbon::parse($this->attributes['updated_at'])->timezone(self::TIMEZONE)->isoFormat(self::DATE_FORMAT_DATE_SIMPLE);

        return $value;

    }

    public function getSiteSeoTitleAttribute()
    {
        if(!empty($this->seo_title))
            return $this->seo_title;

        return $this->title;
    }

    public function getSiteSeoKeywordsAttribute()
    {
        if(!empty($this->seo_keywords))
            return $this->seo_keywords;

        return $this->siteSeoTitle;
    }

    public function getSiteSeoDescriptionAttribute()
    {
        if(!empty($this->seo_description))
            return $this->seo_description;

        return $this->siteSeoTitle;
    }

}
