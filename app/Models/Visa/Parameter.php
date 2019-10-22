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

    public function getCheckoutTitleAttribute()
    {

        if(empty($this->order_title)) {
            return $this->title;
        }

        return $this->order_title;
    }

    public function valueIsChecked(Value $value, $data = [])
    {

        $result = false;

        // если поле выбрано в админке "отмечено по умолчанию"
        if((bool)$value->is_default)
            $result = true;

        // если поле было выбрано на каком-то другом шаге
        if(isset($data['parameter'][$this->id])){

            // сбрасываем что оно выбрано по умолчанию
            $result = false;

            // выбираем что было выбрано на другом шаге
            if($data['parameter'][$this->id] == $value->id)
                $result = true;

        }

        // если это поле есть в субмит запросе
        if(old('parameter.'.$this->id) != null){

            $result = false;

            // выбираем что было выбрано в субмит запросе
            if(old('parameter.'.$this->id) == $value->id)
                $result = true;

        }

        return $result;

    }

}
