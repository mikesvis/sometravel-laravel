<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Helpers\WizardHelper;
use App\Helpers\PaymentHelper;
use App\Repositories\Visa\VisaRepository;
use App\Helpers\Calculator\VisaCalculator;
use App\Repositories\Order\OrderRepository;
use App\Http\Requests\Checkout\Step2CreateRequest;
use App\Http\Requests\Checkout\Step3CreateRequest;
use App\Http\Controllers\Front\BaseController as FrontBaseController;

class OrderController extends FrontBaseController
{

    const NAME = 'Оформление визы';

    const ITEMS_PER_PAGE = 12;

    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * @var VisaRepository
     */
    private $visaRepository;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->orderRepository = app(OrderRepository::class);
        $this->visaRepository = app(VisaRepository::class);
    }

    public function step1()
    {

        $wizard = new WizardHelper;

        if($wizard->hasVisa() == false){
            return redirect(route('front.visa.index'));
        }

        $visa = $wizard->getVisa();

        $breadcrumbs = $this->setBreadcrumbs([
            ['name' => self::NAME,  'url' => null],
        ])->breadcrumbs;

        $isAuthed = \Auth::check();

        $heading = 'Оформление визы '.$visa->title_to;

        return view('front.order.step-1', compact('visa', 'heading', 'isAuthed', 'breadcrumbs'));

    }

    public function step2()
    {
        $wizard = new WizardHelper;

        if($wizard->hasVisa() == false){
            return redirect(route('front.visa.index'));
        }

        $breadcrumbs = $this->setBreadcrumbs([
            ['name' => self::NAME,  'url' => null],
        ])->breadcrumbs;

        $visa = $wizard->getVisa();

        if($wizard->hasOrder() == false)
            $wizard->prepareOrder($visa);

        $wizard->updateOrderParams();

        $order = $wizard->getOrder();

        $heading = 'Оформление визы '.$visa->title_to;

        return view('front.order.step-2', compact('visa', 'order', 'heading', 'breadcrumbs'));

    }

    public function step2Store(Step2CreateRequest $request)
    {
        $step = 2;
        $wizard = new WizardHelper;

        if($wizard->hasVisa() == false || $wizard->hasOrder() == false){
            return redirect(route('front.visa.index'));
        }

        $wizard->storeStepData($step, $request->except(['_token']));

        $wizard->updateOrder($step);

        $wizard->updateOrderParams();

        return redirect(route('front.order.step-3'));
    }

    public function step3()
    {
        $wizard = new WizardHelper;

        if($wizard->hasVisa() == false || $wizard->hasOrder() == false){
            return redirect(route('front.visa.index'));
        }

        $breadcrumbs = $this->setBreadcrumbs([
            ['name' => self::NAME,  'url' => null],
        ])->breadcrumbs;

        $visa = $wizard->getVisaWithParameters();

        $order = $wizard->getOrder();

        $heading = 'Оформление визы '.$visa->title_to;

        $calculator = new VisaCalculator($visa);

        $calculator->appendWizard($wizard);

        $calculator->generateCheckoutParameters();

        $calculator->generateCheckoutServices();

        return view('front.order.step-3', compact('visa', 'order', 'calculator', 'heading', 'breadcrumbs'));

    }

    public function step3Store(Step3CreateRequest $request)
    {
        $step = 3;
        $wizard = new WizardHelper;

        if($wizard->hasVisa() == false || $wizard->hasOrder() == false){
            return redirect(route('front.visa.index'));
        }

        $wizard->storeStepData($step, $request->except(['_token']));

        $wizard->updateOrder($step);

        $wizard->updateOrderParams();

        $wizard->finishOrder();

        $order = $wizard->getOrder();

        $payment = new PaymentHelper($order);

        $payment->create();

        $redirectLink = $payment->getRedirectLink();

        return redirect($redirectLink);
    }

    public function finish($orderUuid)
    {

        $order = $this->orderRepository->getByUuid($orderUuid);

        if(empty($order))
            abort(404);

        if(empty($order->visa))
            abort(404);

        $breadcrumbs = $this->setBreadcrumbs([
            ['name' => self::NAME,  'url' => null],
        ])->breadcrumbs;

        $heading = 'Оформление визы '.$order->visa->title_to;

        return view('front.order.finish', compact('order', 'heading', 'breadcrumbs'));

    }

    public function calculate(Request $request)
    {
        $wizard = new WizardHelper;

        if($wizard->hasVisa() == false || $wizard->hasOrder() == false){
            abort(404);
        }

        $data = $request->all();

        $calculator = new VisaCalculator($this->visaRepository->getForCalculationWithParametersById($wizard->visa, $data['parameter']));

        $price = $calculator->calculate($data);

        $result = [
            'price' => number_format($price, 0, ".", " "),
        ];

        return $result;

    }

}
