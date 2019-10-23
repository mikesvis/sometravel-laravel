<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Helpers\WizardHelper;
use App\Repositories\Visa\VisaRepository;
use App\Helpers\Calculator\VisaCalculator;
use App\Http\Requests\Checkout\Step2CreateRequest;
use App\Http\Requests\Checkout\Step3CreateRequest;
use App\Http\Controllers\Front\BaseController as FrontBaseController;

class OrderController extends FrontBaseController
{

    const NAME = 'Оформление визы';

    const ITEMS_PER_PAGE = 12;

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

        return redirect(route('front.order.step-3'));
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
