<?php

namespace App\Models\Visa;

use App\Models\Visa\Visa;
use App\Helpers\Orderable;
use App\Models\Visa\Value;
use App\Models\BaseAdminModel;

class Parameter extends BaseAdminModel
{

    use Orderable;

    protected $orderWithinAttribute = 'visa_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'visa_id',
        'title',
        'calculator_title',
        'is_on_calculator_page',
        'order_title',
        'is_on_order_page',
        'description',
        'ordering',
        'required',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_on_calculator_page' => 'boolean',
        'is_on_order_page' => 'boolean',
        'required' => 'boolean',
    ];

    /**
     * The categories that belong to the visa.
     */
    public function visa()
    {
        return $this->belongsTo(Visa::class);
    }

    public function values()
    {
        return $this->hasMany(Value::class)->orderBy('ordering', 'asc')->orderBy('id', 'asc');
    }

    public function enabledValues()
    {
        return $this->values()->where('status', 1);
    }

    public function getCalculatorLabelAttribute($value)
    {
        if(empty($this->calculator_title))
            return $this->title;

        return $this->calculator_title;
    }

}
