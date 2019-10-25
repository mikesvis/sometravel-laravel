<?php
namespace App\Helpers;

use App\Models\Order;
use App\Models\Visa\Visa;
use Illuminate\Support\Str;
use App\Helpers\PaymentHelper;
use App\Repositories\Visa\VisaRepository;
use App\Repositories\Order\OrderRepository;

class WizardHelper
{

    public $visa;
    public $order;
    public $steps;


    public function __construct(){
        $this->visa = session('wizard.visa', null);
        $this->order = session('wizard.order', null);
        $this->steps = session('wizard.steps', null);
    }

    public function flushPreviousData()
    {
        session()->forget(['wizard']);
        $this->visa = null;
        $this->order = null;
        $this->steps = null;
    }

    public function storeVisa($visaId)
    {
        session([
            "wizard.visa" => (int)$visaId
        ]);

        $this->visa = (int)$visaId;
    }

    public function storeOrder($orderUuid)
    {
        session([
            "wizard.order" => $orderUuid
        ]);

        $this->order = $orderUuid;
    }

    public function storeStepData($step, $data)
    {
        // если шаг > 1, то добавляем данные из предыдущего шага
        if($step > 1) {
            $previousStep = $step - 1;
            $previousData = $this->getStepData($previousStep) ?: [];
            $data = array_replace_recursive($data, $previousData);
        }

        session([
            "wizard.steps.{$step}" => $data
        ]);

        $this->steps[$step] = $data;

    }

    public function getStepData($step)
    {
        return (session()->has("wizard.steps.{$step}")) ? session()->get("wizard.steps.{$step}") : null;
    }

    public function getSteps()
    {
        return (session()->has("wizard.steps")) ? session()->get("wizard.steps") : null;
    }

    public function getLastStep()
    {
        $steps = $this->getSteps();

        if(!is_array($steps)){
            return null;
        }

        return array_pop($steps);

    }

    public function getAllData()
    {
        return session()->has('wizard') ? session('wizard') : null;
    }

    public function hasVisa()
    {
        $visa = app(VisaRepository::class)->getEnabledById($this->visa);

        return (!empty($visa));
    }

    public function hasOrder()
    {
        $order = app(OrderRepository::class)->getByUuid($this->order);

        return (!empty($order));
    }

    public function prepareOrder(Visa $visa)
    {

        $attributes = [
            'uuid' => (string)Str::uuid(),
            'user_id' => \Auth::id(),
            'visa_id' => $visa->id,
            'steps_completed' => 1,
            'steps' => json_encode($this->getSteps()),
            'status' => 0,
            'sum' => 0,
            'total' => 0,
            'order_params' => null,
            'payment_method' => 0,
            'payment_params' => null,
            'email_sent_at' => null,
            'appliance_date' => null,
            'delivery_date' => null,
        ];

        $order = Order::create($attributes);

        $this->storeOrder($order->uuid);

    }

    public function updateOrder($step)
    {
        $order = $this->getOrder();

        $order->update([
            'steps_completed' => $step,
            'steps' => json_encode($this->getSteps())
        ]);

    }

    public function updateOrderParams()
    {
        $order = $this->getOrder();

        $order->update([
            'order_params' => json_encode($order->generateOrderParams($this->getLastStep()), JSON_UNESCAPED_UNICODE)
        ]);
    }

    public function finishOrder()
    {
        $order = $this->getOrder();

        $data = $this->getLastStep();

        $calculator = (new \App\Helpers\Calculator\VisaCalculator($this->getVisa()));

        $calculator->appendWizard($this);

        $price = $calculator->getComplexPrice();

        $order->update([
            'status' => 1,
            'sum' => $price,
            'total' => $price,
            'payment_method' => $data['payment_method']
        ]);
    }

    public function getOrder()
    {
        return app(OrderRepository::class)->getByUuid($this->order);
    }

    public function getVisa()
    {
        return app(VisaRepository::class)->getEnabledById($this->visa);
    }

    public function getVisaWithParameters()
    {
        return app(VisaRepository::class)->getEnabledWithParametersById($this->visa);
    }

    public function getPersons()
    {

        $persons = (int) old('persons', $this->getStepData(2)['persons']);

        return $persons;
    }

    public function paymentMethodsView()
    {

        $default = PaymentHelper::getDefaultPaymentMethod();
        $methods = PaymentHelper::getOtherPaymentMethods();
        $description = PaymentHelper::getViewDescription();

        return view("front.order.payment.checkout-list", compact('default', 'methods', 'description'));
    }

}

?>
