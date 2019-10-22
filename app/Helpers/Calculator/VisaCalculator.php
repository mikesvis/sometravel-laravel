<?php
namespace App\Helpers\Calculator;

use App\Models\Visa\Visa;
use App\Helpers\VisaHelper;
use App\Helpers\WizardHelper;

class VisaCalculator
{
    public $visa;
    public $calculator;
    public $wizard;
    public $checkoutParameters;
    public $checkoutServices;


    public function __construct(Visa $visa)
    {
        $this->visa = $visa;
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
            $data = VisaHelper::calculatorBiometrics();
            $this->calculator[] = view('front.visa.calculator.inline.regular-parameter', ['parameter'=>$data, 'k'=>$k]);
            $k++;
        }

        // доставка если тип доставки "самовывоз или доставка курьером"
        if($this->visa->delivery_type == VisaHelper::DELIVERY_TYPE_ANY){
            $data = VisaHelper::calculatorDelivery();
            $this->calculator[] = view('front.visa.calculator.inline.regular-parameter', ['parameter'=>$data, 'k'=>$k]);
            $k++;
        }

        // подача если тип подачи "личная или без присутствия"
        if($this->visa->application_type == VisaHelper::APPLICATION_TYPE_ANY){
            $data = VisaHelper::calculatorApplication();
            $this->calculator[] = view('front.visa.calculator.inline.regular-parameter', ['parameter'=>$data, 'k'=>$k]);
            $k++;
        }

        return view('front.visa.calculator.inline.index', ['visa' => $this->visa, 'calculator' => $this->calculator]);
    }

    public function appendWizard(WizardHelper $wizard)
    {
        $this->wizard = $wizard;
    }

    public function personsField()
    {
        $lastStep = $this->wizard->getLastStep();

        return view('front.visa.calculator.checkout.quantity', ['persons' => $lastStep['persons'] ?? 1]);
    }

    public function generateCheckoutParameters()
    {
        $result = [];

        // параметры
        foreach ($this->visa->visaCheckoutCalculatorParameters as $parameter) {
            $result[] = view('front.visa.calculator.checkout.parameter', ['parameter'=>$parameter, 'data' => $this->wizard->getLastStep()]);
        }

        $this->checkoutParameters = $result;
    }

    public function hasServices()
    {

        if($this->visa->application_type == VisaHelper::APPLICATION_TYPE_ANY)
            $result = true;

        if($this->visa->acceptance_type == VisaHelper::ACCEPTANCE_TYPE_ANY)
            $result = true;

        if($this->visa->delivery_type == VisaHelper::DELIVERY_TYPE_ANY)
            $result = true;

        if((bool)$this->visa->is_insurable)
            $result = true;

        return $result;
    }

    public function servicesSectionHeading()
    {
        $descriptions = [];

        if((bool)$this->visa->is_insurable && VisaHelper::getInsuranceLegend() != null)
            $descriptions[] = VisaHelper::getInsuranceLegend();

        if($this->visa->application_type == VisaHelper::APPLICATION_TYPE_ANY && VisaHelper::getApplicationLegend() != null)
            $descriptions[] = VisaHelper::getApplicationLegend();

        if($this->visa->acceptance_type == VisaHelper::ACCEPTANCE_TYPE_ANY && VisaHelper::getAcceptanceLegend() != null)
            $descriptions[] = VisaHelper::getAcceptanceLegend();

        if($this->visa->delivery_type == VisaHelper::DELIVERY_TYPE_ANY && VisaHelper::getDeliveryLegend() != null)
            $descriptions[] = VisaHelper::getDeliveryLegend();

        return view('front.visa.calculator.checkout.services.heading', compact('descriptions'));
    }

    public function generateCheckoutServices()
    {
        $result = [];
        $lastStep = $this->wizard->getLastStep();

        // доп. сервисы

        // страховка
        if((bool)$this->visa->is_insurable){
            $parameter = VisaHelper::calculatorInsurance();
            $result[] = view('front.visa.calculator.checkout.services.quantity', [
                'parameter' => $parameter,
                'data' => $lastStep,
            ]);
        }

        // тип подачи
        if($this->visa->application_type == VisaHelper::APPLICATION_TYPE_ANY){
            $parameter = VisaHelper::calculatorApplication();
            $result[] = view('front.visa.calculator.checkout.services.checkbox', [
                'parameter' => $parameter,
                'data' => $lastStep,
            ]);
        }

        // забор документов курьером
        if($this->visa->acceptance_type == VisaHelper::ACCEPTANCE_TYPE_ANY){
            $parameter = VisaHelper::calculatorAcceptance();
            $result[] = view('front.visa.calculator.checkout.services.checkbox', [
                'parameter' => $parameter,
                'data' => $lastStep,
            ]);
        }

        // доставка документов курьером
        if($this->visa->delivery_type == VisaHelper::DELIVERY_TYPE_ANY){
            $parameter = VisaHelper::calculatorDelivery();
            $result[] = view('front.visa.calculator.checkout.services.checkbox', [
                'parameter' => $parameter,
                'data' => $lastStep,
            ]);
        }

        $this->checkoutServices = $result;
    }

}

?>
