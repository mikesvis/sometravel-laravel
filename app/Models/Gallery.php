<?php

namespace App\Models;

use App\Models\BaseAdminModel;

class Gallery extends BaseAdminModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'title',
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

    public function children(){
        return $this->hasMany( Gallery::class, 'parent_id', 'id' );
    }

    public function parent(){
        return $this->hasOne( Gallery::class, 'id', 'parent_id' );
    }

    public function parentRecursive(){
        return $this->hasOne( Gallery::class, 'id', 'parent_id' )->with('parentRecursive')->select(['id', 'parent_id', 'title', 'ordering']);
    }

}
