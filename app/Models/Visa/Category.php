<?php

namespace App\Models\Visa;

use App\Helpers\Orderable;
use App\Models\Visa\Visa;
use Illuminate\Support\Str;
use App\Models\BaseAdminModel;

class Category extends BaseAdminModel
{

    use Orderable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'menuname',
        'slug',
        'content',
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
     * Setting slug depending on title when slug is null
     *
     * @param [type] $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $value;

        if(empty($value)){
            $this->attributes['slug'] = Str::slug($this->attributes['title'], '-');
        }

        $uniqueSlugsCount = Category::where('slug', $this->attributes['slug'])->where('id', '<>', $this->id)->count();
        if($uniqueSlugsCount != 0)
            $this->attributes['slug'] .= '-'.($uniqueSlugsCount+1);
    }

    public function visas()
    {
        return $this->belongsToMany(Visa::class);
    }

    public function enabledVisas()
    {
        return $this->visas()->where('status', 1);
    }

    public function enabledVisasWithFirstImage()
    {
        return $this->enabledVisas()->with('firstEnabledImage')->orderBy('ordering', 'asc')->orderBy('id', 'asc');
    }

}
