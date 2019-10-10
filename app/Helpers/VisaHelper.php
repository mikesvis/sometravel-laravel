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

    public static function calculatorBiometrics(Visa $visa)
    {
        return [
            'type' => 'biometrics',
            'label' => 'Биометрия <span class="h6 font-weight-normal d-inline-block">(за последние 5 лет)</span>',
            'values' => [
                ['id'=>'value_b_0', 'name' => 'Сдана', 'value' => self::BIOMETRICS_EXIST],
                ['id'=>'value_b_1', 'name' => 'Не сдана', 'value' => self::BIOMETRICS_ABSENT],
            ]
        ];
    }

    public static function calculatorDelivery(Visa $visa)
    {
        return [
            'type' => 'delivery_type',
            'label' => 'Доставка',
            'values' => [
                ['id'=>'value_d_0', 'name' => 'С доставкой', 'value' => self::DELIVERY_COURIER],
                ['id'=>'value_d_1', 'name' => 'Самовывоз', 'value' => self::DELIVERY_SELF],
            ]
        ];
    }

    public static function calculatorApplication(Visa $visa)
    {
        return [
            'type' => 'application_type',
            'label' => 'Тип подачи',
            'values' => [
                ['id'=>'value_at_0', 'name' => 'Личная', 'value' => self::APPLICATION_SELF],
                ['id'=>'value_at_1', 'name' => 'Без присутствия', 'value' => self::APPLICATION_AS_SERVICE],
            ]
        ];
    }

    public static function requestedDeliveryIsCourier(Request $request)
    {

        if(empty($request->input('parameter_regular.delivery_type')))
            return false;

        if((int)$request->input('parameter_regular.delivery_type') == VisaHelper::DELIVERY_COURIER)
            return true;

        return false;

    }

}
?>
