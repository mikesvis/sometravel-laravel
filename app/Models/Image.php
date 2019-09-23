<?php

namespace App\Models;

use App\Models\BaseAdminModel;

class Image extends BaseAdminModel
{

    const IMAGE_MAX_UPLOAD_DIMENSIONS = [
        'width' => 4096,
        'height' => 2160
    ];

    const ALLOWED_MIMES = 'jpeg,png,jpg,gif';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'title',
        'alt',
        'link_to',
        'description',
        'watermark',
        'ordering',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'watermark' => 'boolean',
        'status' => 'boolean',
    ];

    /**
     * Get the owning commentable model.
     */
    public function imagable()
    {
        return $this->morphTo();
    }

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($image){
            $basePath = public_path().$image->path;
            if(file_exists($basePath)){
                unlink($basePath);
            }
        });
    }
}
