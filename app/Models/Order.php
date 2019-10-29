<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Helpers\MyHelper;
use App\Models\Visa\Visa;
use App\Models\Visa\Value;
use App\Helpers\VisaHelper;
use App\Helpers\OrderHelper;
use App\Helpers\PhoneHelper;
use App\Helpers\PaymentHelper;
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
        'management_notes',
    ];

    public function getOrderNumberAttribute($value)
    {
        $result = str_pad($this->id, 8, '0', STR_PAD_LEFT);

        return $result;
    }

    public function getPaymentIconAttribute()
    {
        $result = null;

        if(!empty($this->payment_method)){
            $result = PaymentHelper::getIconByIndex($this->payment_method);
        }

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

    public function getHasVisaAttribute()
    {
        if(!empty($this->visa))
            return true;

        return false;
    }

    public function getVisaTitleAttribute()
    {

        if (isset($this->json_parameters['visa']['title'])) {
            return $this->json_parameters['visa']['title'];
        }

        if($this->has_visa){
            return $this->visa->title;
        }

        return 'Не найти заголовок';
    }

    public function getHasUserAttribute()
    {
        if(!empty($this->user))
            return true;

        return false;
    }

    public function getUserNameAttribute()
    {

        $result = [];

        if (isset($this->json_parameters['user'])) {
            $result[] = $this->json_parameters['user']['surname'] ?? null;
            $result[] = $this->json_parameters['user']['name'] ?? null;
            $result[] = $this->json_parameters['user']['patronymic'] ?? null;
            return $result;
        }

        if($this->has_user){
            $result[] = $this->user->surname;
            $result[] = $this->user->name;
            $result[] = $this->user->patronymic;
            return $result;
        }

        return ['Не найти пользовтеля'];
    }

    public function getUserContactsAttribute()
    {

        $result = [];

        if ($this->json_parameters['user']['phone']) {
            $result['phone'] = 'Телефон: '.PhoneHelper::beautifyPhone($this->json_parameters['user']['phone']);
        } elseif($this->has_user){
            $result['phone'] = 'Телефон: '.PhoneHelper::beautifyPhone($this->user->phone);
        }

        if ($this->json_parameters['user']['email']) {
            $result['email'] = 'E-mail: <a href="mailto:'.$this->json_parameters['user']['email'].'">'.$this->json_parameters['user']['email'].'</a>';
        } elseif($this->has_user){
            $result['email'] = 'E-mail: <a href="mailto:'.$this->user->email.'">'.$this->user->email.'</a>';
        }

        return $result;
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

            $result['parameter'] = VisaHelper::composeParameters($data['parameter']);

        }

        $result['parameter_regular'] = [];

        if(isset($data['parameter_regular']) && is_array($data['parameter_regular'])){

            $result['parameter_regular'] = VisaHelper::composeParametersRegular($this->visa, $data);

        }

        return $result;

    }

}
