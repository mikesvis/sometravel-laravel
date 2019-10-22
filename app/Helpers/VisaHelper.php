<?php
namespace App\Helpers;

use App\Models\Visa\Visa;
use Illuminate\Http\Request;

class VisaHelper
{
    // Типы подачи
    const APPLICATION_TYPE_ONLY_SELF = 0; // только личная
    const APPLICATION_TYPE_ANY = 1; // личная или без присутствия

    // варианты биометрии
    const BIOMETRICS_EXIST = 1; // биометрия сдана
    const BIOMETRICS_ABSENT = 0; // биометрия не сдана

    // варианты подачи документов на визу
    const APPLICATION_AS_SERVICE = 1; // подача без присутствия
    const APPLICATION_SELF = 0; // подача личная

    // Типы забора документов
    const ACCEPTANCE_TYPE_ONLY_SELF = 0; // забор документов только самостоятельно
    const ACCEPTANCE_TYPE_ANY = 1; // забор курьером или самостоятельно

    // варианты забора документов
    const ACCEPTANCE_COURIER = 1; // Забор курьером
    const ACCEPTANCE_SELF = 0; // Самопривоз?

    // Типы доставки документов
    const DELIVERY_TYPE_ONLY_SELF = 0; // доставка только самостоятельно
    const DELIVERY_TYPE_ANY = 1; // доставка самостоятельно или курьером

    // варианты доставки
    const DELIVERY_COURIER = 1; // Доставка курьером
    const DELIVERY_SELF = 0; // Самовывоз


    // Типы подачи
    public static function getApplicationTypeNamesForAdmin()
    {
        return [
            self::APPLICATION_TYPE_ONLY_SELF => 'Только личная',
            self::APPLICATION_TYPE_ANY => 'Личная или без присутствия',
        ];
    }

    // Тип подачи
    public static function getApplicationTypeNameForAdmin($index)
    {
        $types = self::getApplicationTypeNamesForAdmin();
        return $types[$index];
    }

    // Типы забора документов
    public static function getAcceptanceTypeNamesForAdmin()
    {
        return [
            self::APPLICATION_TYPE_ONLY_SELF => 'Только самостоятельно',
            self::APPLICATION_TYPE_ANY => 'Самостоятельно или забор курьером',
        ];
    }

    // Тип забора документов
    public static function getAcceptanceTypeNameForAdmin($index)
    {
        $types = self::getAcceptanceTypeNamesForAdmin();
        return $types[$index];
    }

    // Типы доставки документов
    public static function getDeliveryTypeNamesForAdmin()
    {
        return [
            self::APPLICATION_TYPE_ONLY_SELF => 'Только самовывоз',
            self::APPLICATION_TYPE_ANY => 'Самовывоз или доставка курьером',
        ];
    }

    // Тип доставки документов
    public static function getDeliveryTypeNameForAdmin($index)
    {
        $types = self::getDeliveryTypeNamesForAdmin();
        return $types[$index];
    }

    public static function calculatorBiometrics()
    {
        return [
            'type' => 'biometrics',
            'label' => 'Биометрия <span class="h6 font-weight-normal d-inline-block">(за последние 5 лет)</span>',
            'label_checkout' => null,
            'values' => [
                ['id'=>'value_b_1', 'name' => 'Сдана', 'value' => self::BIOMETRICS_EXIST],
                ['id'=>'value_b_0', 'name' => 'Не сдана', 'value' => self::BIOMETRICS_ABSENT],
            ],
            'values_checkout' => [
                ['id'=>'value_b_0', 'value' => self::BIOMETRICS_ABSENT],
                ['id'=>'value_b_1', 'value' => self::BIOMETRICS_EXIST],
            ],
        ];
    }

    public static function calculatorAcceptance()
    {
        return [
            'type' => 'acceptance_type',
            'label' => 'Забор документов',
            'label_checkout' => 'Забор документов курьером',
            'values' => [
                ['id'=>'value_d_1', 'name' => 'Курьером', 'value' => self::ACCEPTANCE_COURIER],
                ['id'=>'value_d_0', 'name' => 'Самостоятельно', 'value' => self::ACCEPTANCE_SELF],
            ],
            'values_checkout' => [
                ['id'=>'value_d_0', 'value' => self::ACCEPTANCE_SELF],
                ['id'=>'value_d_1', 'value' => self::ACCEPTANCE_COURIER],
            ]
        ];
    }

    public static function calculatorDelivery()
    {
        return [
            'type' => 'delivery_type',
            'label' => 'Доставка',
            'label_checkout' => 'Доставка документов курьером',
            'values' => [
                ['id'=>'value_d_1', 'name' => 'С доставкой', 'value' => self::DELIVERY_COURIER],
                ['id'=>'value_d_0', 'name' => 'Самовывоз', 'value' => self::DELIVERY_SELF],
            ],
            'values_checkout' => [
                ['id'=>'value_d_0', 'value' => self::DELIVERY_SELF],
                ['id'=>'value_d_1', 'value' => self::DELIVERY_COURIER],
            ]
        ];
    }

    public static function calculatorApplication()
    {
        return [
            'type' => 'application_type',
            'label' => 'Тип подачи',
            'label_checkout' => 'Подача документов без присутствия',
            'label_helper' => 'Если сдана биометрия за последние 5 лет',
            'values' => [
                ['id'=>'value_at_0', 'name' => 'Личная', 'value' => self::APPLICATION_SELF],
                ['id'=>'value_at_1', 'name' => 'Без присутствия', 'value' => self::APPLICATION_AS_SERVICE],
            ],
            'values_checkout' => [
                ['id'=>'value_at_0', 'value' => self::APPLICATION_SELF],
                ['id'=>'value_at_1', 'value' => self::APPLICATION_AS_SERVICE],
            ]
        ];
    }

    public static function calculatorInsurance()
    {
        return [
            'type' => 'insurance',
            'label' => 'Страховка',
            'label_checkout' => 'Страховка',
            'value' => 0
        ];
    }

    public static function requestedDeliveryIsCourier(Request $request)
    {

        if(empty($request->input('parameter_regular.delivery_type')))
            return false;

        if((int)$request->input('parameter_regular.delivery_type') == self::DELIVERY_COURIER)
            return true;

        return false;

    }

    public static function requestedAcceptanceIsCourier(Request $request)
    {

        if(empty($request->input('parameter_regular.acceptance_type')))
            return false;

        if((int)$request->input('parameter_regular.acceptance_type') == self::ACCEPTANCE_COURIER)
            return true;

        return false;

    }

    public static function requestedApplianceAsService(Request $request)
    {
        if(empty($request->input('parameter_regular.application_type')))
            return false;

        if((int)$request->input('parameter_regular.application_type') == self::APPLICATION_AS_SERVICE)
            return true;

        return false;
    }

    public static function getInsuranceLegend()
    {
        return '<p><strong>Страховка</strong>: Необходимое количество страховок, которое может понадобиться. Стоимость страховок оплачивается отдельно.</p>';
    }

    public static function getApplicationLegend()
    {
        return '<p><strong>Тип подачи документов</strong>: Возможность подачи документов на получение визы с присутствием или без. Получение визы без присутствия возможно только при условии наличия биометрии за последние 5 лет.</p>';
    }

    public static function getAcceptanceLegend()
    {
        return '<p><strong>Забор документов курьером</strong>: За Вашими документами приедет наш курьер.</p>';
    }

    public static function getDeliveryLegend()
    {
        return '<p><strong>Доставка документов курьером</strong>: Вашу визу и документы доставит наш курьер.</p>';
    }

}
?>
