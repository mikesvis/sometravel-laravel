<?php

namespace App\Models;

use App\Models\BaseAdminModel;

class Image extends BaseAdminModel
{
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
}
