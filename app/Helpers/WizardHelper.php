<?php
namespace App\Helpers;

use App\Models\Order;
use App\Models\Visa\Visa;
use Illuminate\Support\Str;
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
            $data = array_merge($previousData, $data);
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
            'payment_type' => 0,
            'payment_params' => null,
        ];

        $order = Order::create($attributes);

        $this->storeOrder($order->uuid);

    }

    public function updateOrder($step)
    {
        $order = $this->getOrder();

        $order->update([
            'steps_completed' => $step,
            'steps' => json_encode($this->getSteps()),
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

}

?>
