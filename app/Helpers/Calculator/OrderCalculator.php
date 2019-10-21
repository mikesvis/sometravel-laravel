<?php
namespace App\Helpers\Calculator;

use App\Helpers\VisaHelper;
use App\Models\Visa\Visa;

class OrderCalculator
{
    public $visa;
    public $calculator;


    public function __construct(Visa $visa)
    {
        $this->visa = $visa;
    }

    public function calculate()
    {
        return 0;
    }

    public function generate()
    {
        // 1 col - всегда кол-во
        // последний col - всегда сумма с кнопками

        // порядок:
        // 1: Кол-во
        // 2..n: Параметры визы
        // n + 1: Либо Биометрия либо Доставка
        // n + 2: Доставка если нет биометрии

        // последний параметр либо Тип подачи если есть Биометрия либо Доставка
        // последний параметр если он нечетный (Кол-во + остальные параметры) отделен чертой сверху и стоит рядом с кнопками

        $this->calculator = [];

        // количество персон
        $this->calculator[] = view('front.visa.calculator.inline.quantity');
        $k = 1;

        // параметры
        foreach ($this->visa->visaPageCalculatorParameters as $parameter) {
            $this->calculator[] = view('front.visa.calculator.inline.parameter', ['parameter'=>$parameter, 'k'=>$k]);
            $k++;
        }

        // биометрия если тип подачи "личная или без присутствия" - этот параметр на цену не влияет
        if($this->visa->application_type == VisaHelper::APPLICATION_TYPE_ANY){
            $data = VisaHelper::calculatorBiometrics($this->visa);
            $this->calculator[] = view('front.visa.calculator.inline.regular-parameter', ['parameter'=>$data, 'k'=>$k]);
            $k++;
        }

        // доставка если тип доставки "самовывоз или доставка курьером"
        if($this->visa->delivery_type == VisaHelper::DELIVERY_TYPE_ANY){
            $data = VisaHelper::calculatorDelivery($this->visa);
            $this->calculator[] = view('front.visa.calculator.inline.regular-parameter', ['parameter'=>$data, 'k'=>$k]);
            $k++;
        }

        // подача если тип подачи "личная или без присутствия"
        if($this->visa->application_type == VisaHelper::APPLICATION_TYPE_ANY){
            $data = VisaHelper::calculatorApplication($this->visa);
            $this->calculator[] = view('front.visa.calculator.inline.regular-parameter', ['parameter'=>$data, 'k'=>$k]);
            $k++;
        }

        return view('front.visa.calculator.inline.index', ['visa' => $this->visa, 'calculator' => $this->calculator]);
    }

}

?>
