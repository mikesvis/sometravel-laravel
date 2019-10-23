<?php

namespace App\Models\Visa;

use App\Models\Image;
use App\Helpers\Orderable;
use App\Models\Visa\Value;
use App\Helpers\VisaHelper;
use Illuminate\Support\Str;
use App\Models\Visa\Category;
use App\Models\BaseAdminModel;
use App\Models\Visa\Parameter;
use App\Helpers\Calculator\VisaCalculator;

class Visa extends BaseAdminModel
{

    use Orderable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'title_to',
        'menuname',
        'slug',
        'excerpt',
        'content',
        'documents_text',
        'base_price',
        'application_type',
        'application_absence_price',
        'acceptance_type',
        'acceptance_price',
        'delivery_type',
        'delivery_price',
        'is_insurable',
        'is_popular',
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
        'is_insurable' => 'boolean',
        'is_popular' => 'boolean',
    ];

    public static function tabsErrors($errors = [])
    {
        $result = [
            'primary' => false,
            'baseParams' => false,
            'moreParams' => false,
            'images' => false,
            'seo' => false,
        ];

        if($errors->any() == false)
            return $result;

        $result['primary'] = (bool)count(array_intersect($errors->keys(),
            [
                'title',
                'title_to',
                'menuname',
                'slug',
                'content',
                'documents_text',
                'categories',
                'documents',
                'ordering',
                'status',
                'is_popular',
            ]
        ));

        $result['baseParams'] = (bool)count(array_intersect($errors->keys(),
            [
                'base_price',
                'application_type',
                'application_absence_price',
                'acceptance_type',
                'acceptance_price',
                'delivery_type',
                'delivery_price',
                'is_insurable',
            ]
        ));

        return $result;

    }

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

        $uniqueSlugsCount = Visa::where('slug', $this->attributes['slug'])->where('id', '<>', $this->id)->count();
        if($uniqueSlugsCount != 0)
            $this->attributes['slug'] .= '-'.($uniqueSlugsCount+1);
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

    /**
     * The categories that belong to the visa.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * The documents that belong to the visa.
     */
    public function documents()
    {
        return $this->belongsToMany(Image::class);
    }

    public function parameters()
    {
        return $this->hasMany(Parameter::class)->orderBy('ordering', 'asc')->orderBy('id', 'asc');
    }

    public function visaPageCalculatorParameters()
    {
        return $this->parameters()->where('is_on_calculator_page', 1);
    }

    public function visaCheckoutCalculatorParameters()
    {
        return $this->parameters()->where('is_on_order_page', 1);
    }

    public function values()
    {
        return $this->hasManyThrough(Value::class, Parameter::class)->where('status', 1);
    }

    public function getPrice()
    {
        return (new VisaCalculator($this))->getEasyPrice();
    }

    public function canBeDelivered()
    {
        return ($this->delivery_type == VisaHelper::DELIVERY_TYPE_ANY);
    }

    public function canBeAccepted()
    {
        return ($this->acceptance_type == VisaHelper::ACCEPTANCE_TYPE_ANY);
    }

    public function canBeAppliedAsService()
    {
        return ($this->application_type == VisaHelper::APPLICATION_TYPE_ANY);
    }
}
