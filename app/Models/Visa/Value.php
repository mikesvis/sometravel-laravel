<?php

namespace App\Models\Visa;

use App\Models\BaseAdminModel;
use App\Models\Visa\Parameter;

class Value extends BaseAdminModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parameter_id',
        'title',
        'calculator_title',
        'price',
        'is_default',
        'ordering',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_default' => 'boolean',
        'required' => 'boolean',
    ];

    /**
     * The categories that belong to the visa.
     */
    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }

    public function getCalculatorLabelAttribute($value)
    {
        if(empty($this->calculator_title))
            return $this->title;

        return $this->calculator_title;
    }

}
