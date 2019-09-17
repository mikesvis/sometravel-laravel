<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseAdminModel extends Model
{

    const TIMEZONE = "Europe/Moscow";
    const DATE_FORMAT = "DD MMM YYYY HH:mm";

    public function getCreatedAtAttribute($value)
    {

        if(!empty($value))
            return $value->timezone(self::TIMEZONE)->isoFormat(self::DATE_FORMAT);

        return $value;

    }

    public function getUpdatedAtAttribute($value)
    {

        if(!empty($value))
            return $value->timezone(self::TIMEZONE)->isoFormat(self::DATE_FORMAT);

        return $value;

    }

}
