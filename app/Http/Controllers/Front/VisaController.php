<?php

namespace App\Http\Controllers\Front;

use App\Helpers\VisaHelper;
use Illuminate\Http\Request;
use App\Helpers\WizardHelper;
use App\Repositories\Visa\VisaRepository;
use App\Helpers\Calculator\VisaCalculator;
use App\Repositories\Visa\CategoryRepository;
use App\Http\Requests\Checkout\StartVisaRequest;
use App\Http\Controllers\Front\BaseController as FrontBaseController;

class VisaController extends FrontBaseController
{

    const NAME = 'Направления';

    const ITEMS_PER_PAGE = 12;

    /**
     * @var VisaRepository
     */
    private $visaRepository;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->visaRepository = app(VisaRepository::class);
        $this->categoryRepository = app(CategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->visaRepository->getWithFirstImageAndPagination(self::ITEMS_PER_PAGE);

        $breadcrumbs = $this->setBreadcrumbs([['name' => self::NAME, 'url' => null]])->breadcrumbs;

        $otherVisas = $this->visaRepository->getWithFirstImageForModule(4, $paginator->modelKeys());

        return view('front.visa.index', compact('paginator', 'otherVisas', 'breadcrumbs'));
    }

    public function showByCategory($slug)
    {

        $category = $this->categoryRepository->getForViewBySlug($slug);

        if(empty($category))
            abort(404);

        $paginator = $category->enabledVisasWithFirstImage()->paginate(self::ITEMS_PER_PAGE);

        $breadcrumbs = $this->setBreadcrumbs([
            ['name' => self::NAME, 'url' => route('front.visa.index')],
            ['name' => $category->title, 'url' => null],
        ])->breadcrumbs;

        $otherVisas = $this->visaRepository->getWithFirstImageForModule(4, $paginator->modelKeys());

        return view('front.visa.category', compact('category', 'paginator', 'otherVisas', 'breadcrumbs'));

    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug Model slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $visa = $this->visaRepository->getForViewBySlug($slug);

        if(empty($visa))
            abort(404);

        $calculator = (new VisaCalculator($visa))->generate();

        $breadcrumbs = $this->setBreadcrumbs([
            ['name' => self::NAME, 'url' => route('front.visa.index')],
            ['name' => $visa->title, 'url' => null],
        ])->breadcrumbs;

        $otherVisas = $this->visaRepository->getWithFirstImageForModule(4, [$visa->id]);

        return view('front.visa.show', compact('visa', 'calculator', 'otherVisas', 'breadcrumbs'));

    }

    public function calculateVisaPage(Request $request, $id)
    {

        $data = $request->all();

        $parameter = $data['parameter'] ?? [];

        $calculator = new VisaCalculator($this->visaRepository->getForCalculationWithParametersById($id, $parameter));

        $price = $calculator->calculate($data);

        $result = [
            'price' => $price,
        ];

        return $result;

    }

    public function checkout(StartVisaRequest $request, $slug)
    {

        $wizard = new WizardHelper;

        $wizard->flushPreviousData();

        $wizard->storeVisa($request->input(['visa_id']));

        $wizard->storeStepData(1, $request->except(['_token', 'proceed', 'visa_id']));

        return redirect(route('front.order.step-1'));

    }
}
