<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Helpers\WizardHelper;
use App\Repositories\Visa\VisaRepository;
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

    public function start()
    {

        $wizard = new WizardHelper;

        $visa = $this->visaRepository->getEnabledById($wizard->visa);

        if(empty($visa))
            return redirect(route('front.visa.index'));

        $breadcrumbs = $this->setBreadcrumbs([
            ['name' => self::NAME,  'url' => null],
        ])->breadcrumbs;

        $isAuthed = \Auth::check();

        $heading = 'Оформление визы '.$visa->title_to;

        return view('front.order.start', compact('visa', 'heading', 'isAuthed', 'breadcrumbs'));

    }

}
