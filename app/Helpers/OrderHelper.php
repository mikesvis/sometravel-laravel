<?php
namespace App\Helpers;

class OrderHelper
{

    const STATUS_STARTED = 0;       // начато оформление
    const STATUS_ACCEPTED = 1;      // в очереди
    const STATUS_PROCESSING = 2;    // выполняется
    const STATUS_FINISHED = 3;      // выполнен
    const STATUS_CANCELED = 10;     // отменен

    public static function getOrderStatusesNames()
    {
        return [
            self::STATUS_STARTED => 'Не оформлен',
            self::STATUS_ACCEPTED => 'В очереди',
            self::STATUS_PROCESSING => 'Выполняется',
            self::STATUS_FINISHED => 'Выполнен',
            self::STATUS_CANCELED => 'Отменен',
        ];
    }

    public static function getOrderStatusesColors()
    {
        return [
            self::STATUS_STARTED => 'text-dark',
            self::STATUS_ACCEPTED => 'text-primary',
            self::STATUS_PROCESSING => 'text-warning',
            self::STATUS_FINISHED => 'text-success',
            self::STATUS_CANCELED => 'text-danger',
        ];
    }

}

?>
