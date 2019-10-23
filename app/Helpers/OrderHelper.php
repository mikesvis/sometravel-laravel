<?php
namespace App\Helpers;

class OrderHelper
{

    const PAYMENT_CARD = 0;
    const PAYMENT_CASH = 1;
    const PAYMENT_OTHER = 2;

    const PAYMENT_METHODS_WHITE_LIST = [1, 2];

    const DEFAULT_PAYMENT_METHOD = 0;

    public static function getDefaultPaymentMethod()
    {
        $methods = self::paymentMethods();
        return $methods[self::DEFAULT_PAYMENT_METHOD];

    }

    public static function getOtherPaymentMethods()
    {
        $methods = self::paymentMethods();
        unset($methods[self::DEFAULT_PAYMENT_METHOD]);
        return $methods;
    }

    public static function paymentMethods()
    {

        $methods = [
            self::PAYMENT_CARD => [
                'value' => self::PAYMENT_CARD,
                'label' => 'Картой онлайн <em class="far fa-credit-card text-primary ml-2"></em>',
            ],
            self::PAYMENT_CASH => [
                'value' => self::PAYMENT_CASH,
                'label' => 'Наличными <em class="fas fa-wallet text-primary ml-2"></em>',
            ],
            self::PAYMENT_OTHER => [
                'value' => self::PAYMENT_OTHER,
                'label' => 'Другим способом <em class="fas fa-university text-primary ml-2"></em>',
            ],
        ];

        return $methods;

    }

    public static function getViewDescription()
    {
        return 'Укажите вариант оплаты';
    }

}
