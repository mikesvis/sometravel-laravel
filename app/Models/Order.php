<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseAdminModel;

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
        'payment_method',
        'payment_params',
    ];

    public function getOrderNumberAttribute($value)
    {
        $result = $this->id;

        return $result;
    }

}
