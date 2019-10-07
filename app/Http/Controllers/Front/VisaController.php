<?php

namespace App\Http\Controllers\Front;

use App\Models\News;
use App\Repositories\Visa\VisaRepository;
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
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->visaRepository = app(VisaRepository::class);
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

        // $otherNews = $this->visaRepository->getWithFirstImageForModule(4, $visa->id);

        // $breadcrumbs = $this->setBreadcrumbs([
        //     ['name' => self::NAME, 'url' => route('front.news.index')],
        //     ['name' => $news->title, 'url' => null],
        // ])->breadcrumbs;

        // return view('front.news.show', compact('news', 'otherNews', 'breadcrumbs'));

    }
}
