<?php
namespace App\Helpers;

use App\Models\Order;

class PaymentHelper
{

    /**
     * Payment methods
     */
    const PAYMENT_CARD = 0;
    const PAYMENT_CASH = 1;
    const PAYMENT_OTHER = 2;

    /**
     * Payment methods white list array if indexes
     */
    const PAYMENT_METHODS_WHITE_LIST = [1, 2];

    /**
     * Selected index of default payment method
     */
    const DEFAULT_PAYMENT_METHOD = 1;

    /**
     * Order of payment
     *
     * @var App\Models\Order
     */
    public $order;

    /**
     * Link for redirecting
     *
     * @var string
     */
    public $redirectLink;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get default payment method
     *
     * @return array default payment method [value, label]
     */
    public static function getDefaultPaymentMethod()
    {
        $methods = self::paymentMethods();
        return $methods[self::DEFAULT_PAYMENT_METHOD];

    }

    /**
     * Get all white list payment methods except default
     *
     * @return array Payment methods [INDEX => [value, label], INDEX => [value, label], ...]
     */
    public static function getOtherPaymentMethods()
    {

        $methods = self::paymentMethods();
        $result = [];

        for($i = 0; $i < count(self::PAYMENT_METHODS_WHITE_LIST); $i++){
            if(self::PAYMENT_METHODS_WHITE_LIST[$i] != self::DEFAULT_PAYMENT_METHOD) {
                $result[self::PAYMENT_METHODS_WHITE_LIST[$i]] = $methods[self::PAYMENT_METHODS_WHITE_LIST[$i]];
            }
        }

        return $result;

    }

    /**
     * All payment method parameters
     *
     * @return array Payment methods [INDEX => [value, label], INDEX => [value, label], ...]
     */
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

    /**
     * Checkout form section name
     *
     * @return string
     */
    public static function getViewDescription()
    {
        return 'Укажите вариант оплаты';
    }

    public function create()
    {
        // Тут городим механизм распидаливания оплат
        // Пока что просто генерим ссылку

        $this->redirectLink = route('front.order.finish', ['order'=>$this->order->uuid]);
    }

    public function getRedirectLink()
    {
        return $this->redirectLink;
    }

}

?>
