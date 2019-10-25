<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Helpers\MyHelper;
use App\Models\Visa\Visa;
use App\Models\Visa\Value;
use App\Helpers\VisaHelper;
use App\Helpers\OrderHelper;
use App\Models\BaseAdminModel;
use Illuminate\Database\Eloquent\Model;

class Order extends BaseAdminModel
{

    protected $fillable = [
        'uuid',
        'user_id',
        'visa_id',
        'steps_completed',
        'steps',
        'status',
        'sum',
        'total',
        'order_params',
        'payment_method',
        'payment_params',
        'email_sent_at',
        'appliance_date',
        'delivery_date',
    ];

    public function getOrderNumberAttribute($value)
    {
        $result = str_pad($this->id, 8, '0', STR_PAD_LEFT);

        return $result;
    }

    public function getStatusColorAttribute()
    {
        $colors = OrderHelper::getOrderStatusesColors();

        return $colors[$this->status];
    }

    public function getStatusNameAttribute()
    {
        $names = OrderHelper::getOrderStatusesNames();

        return $names[$this->status];
    }

    public function getJsonParametersAttribute()
    {
        return json_decode($this->order_params, true);
    }

    public function getCreatedAtAttribute($value)
    {

        if(!empty($value))
            return Carbon::parse($value)->timezone(self::TIMEZONE)->isoFormat(self::DATE_FORMAT);

        return $value;

    }

    public function getApplianceDateAttribute($value)
    {
        if(!empty($value))
            return Carbon::parse($value)->timezone(self::TIMEZONE);

        return $value;
    }

    public function getApplianceDateHumanAttribute()
    {
        if(!empty($this->appliance_date))
            return Carbon::parse($this->appliance_date)->timezone(self::TIMEZONE)->isoFormat(self::DATE_FORMAT);

        return $this->appliance_date;
    }

    public function getApplianceDateSimpleAttribute()
    {

        $value = null;

        if(!empty($this->attributes['appliance_date']))
            return Carbon::parse($this->attributes['appliance_date'])->timezone(self::TIMEZONE)->isoFormat(self::DATE_FORMAT_DATE_SIMPLE);

        return $value;

    }

    public function setApplianceDateAttribute($value)
    {
        $this->attributes['appliance_date'] = $value;

        if(!empty($value))
            $this->attributes['appliance_date'] = Carbon::createFromFormat("Y-m-d H:i:s", $value, self::TIMEZONE)->setTimezone(config('app.timezone'))->toDateTimeString();

    }

    public function getDeliveryDateAttribute($value)
    {
        if(!empty($value))
            return Carbon::parse($value)->timezone(self::TIMEZONE);

        return $value;
    }

    public function getDeliveryDateHumanAttribute()
    {
        if(!empty($this->delivery_date))
            return Carbon::parse($this->delivery_date)->timezone(self::TIMEZONE)->isoFormat(self::DATE_FORMAT);

        return $this->delivery_date;
    }

    public function getDeliveryDateSimpleAttribute()
    {

        $value = null;

        if(!empty($this->attributes['delivery_date']))
            return Carbon::parse($this->attributes['delivery_date'])->timezone(self::TIMEZONE)->isoFormat(self::DATE_FORMAT_DATE_SIMPLE);

        return $value;

    }

    public function setDeliveryDateAttribute($value)
    {

        $this->attributes['delivery_date'] = $value;

        if(!empty($value))
            $this->attributes['delivery_date'] = Carbon::createFromFormat("Y-m-d H:i:s", $value, self::TIMEZONE)->setTimezone(config('app.timezone'))->toDateTimeString();

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function visa()
    {
        return $this->belongsTo(Visa::class);
    }

    public function scopeActive($query)
    {
        return $query->where([
            ['status', '>', 0],
            ['status', '<', 3],
        ]);
    }

    public function scopeArchive($query)
    {
        return $query->where([
            ['status', '>=', 3],
        ]);
    }

    public function generateOrderParams($data = [])
    {
        $result = [];

        $result['user'] = $this->user->only(['id', 'name', 'surname', 'patronymic', 'phone', 'email']);

        $result['visa'] = $this->visa->only(['id', 'title', 'title_to', 'slug', 'base_price', 'application_type', 'application_absence_price', 'acceptance_type', 'acceptance_price', 'delivery_type', 'delivery_price', 'is_insurable', 'status']);

        $result['persons'] = $data['persons'] ?? null;
        $result['payment_method'] = $data['payment_method'] ?? null;
        $result['date_start'] = $data['date_start'] ?? null;
        $result['date_end'] = $data['date_end'] ?? null;
        $result['tickets'] = $data['tickets'] ?? null;
        $result['hotel'] = $data['hotel'] ?? null;
        $result['parameter'] = [];

        if(isset($data['parameter']) && is_array($data['parameter'])){

            $values = Value::whereIn('values.id', $data['parameter'])->with(['parameter' => function ($query){
                $query->orderBy('ordering', 'asc');
            }])->orderBy('values.ordering')->get();



            foreach ($values as $value) {

                $parameter = [
                    'name' => $value->parameter->title,
                    'value' => $value->title,
                    'price' => $value->price,
                ];

                $result['parameter'][] = $parameter;
            }

        }

        $result['parameter_regular'] = [];

        if(isset($data['parameter_regular']) && is_array($data['parameter_regular'])){


            // подача "без присутствия"
            if($this->visa->canBeAppliedAsService() && VisaHelper::requestedApplianceAsService($data)){

                $regular = VisaHelper::calculatorApplication();
                $value = VisaHelper::getNameByValue($regular, $data['parameter_regular']['application_type']);

                $parameter = [
                    'name' => $regular['name'],
                    'value' => $value,
                    'price' => $this->visa->application_absence_price
                ];

                $result['parameter_regular'][] = $parameter;

            }

            // забор документов курьером
            if($this->visa->canBeAccepted() && VisaHelper::requestedAcceptanceIsCourier($data)){

                $regular = VisaHelper::calculatorAcceptance();
                $value = VisaHelper::getNameByValue($regular, $data['parameter_regular']['acceptance_type']);

                $parameter = [
                    'name' => $regular['name'],
                    'value' => $value,
                    'price' => $this->visa->acceptance_price
                ];

                $result['parameter_regular'][] = $parameter;
            }

            // доставка документов курьером
            if($this->visa->canBeDelivered() && VisaHelper::requestedDeliveryIsCourier($data)){

                $regular = VisaHelper::calculatorDelivery();
                $value = VisaHelper::getNameByValue($regular, $data['parameter_regular']['delivery_type']);

                $parameter = [
                    'name' => $regular['name'],
                    'value' => $value,
                    'price' => $this->visa->delivery_price
                ];

                $result['parameter_regular'][] = $parameter;
            }

            // страховка
            if((bool)$this->visa->is_insurable && isset($data['parameter_regular']['insurance'])){

                $parameter = [
                    'name' => 'Страховка',
                    'value' => $data['parameter_regular']['insurance'],
                    'price' => 0
                ];

                $result['parameter_regular'][] = $parameter;
            }

        }

        return $result;

    }

}
