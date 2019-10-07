<?php

namespace App\Http\Controllers\Front;

use App\Models\News;
use App\Repositories\News\NewsRepository;
use App\Repositories\Visa\VisaRepository;
use App\Http\Controllers\Front\BaseController as FrontBaseController;

class NewsController extends FrontBaseController
{

    const NAME = 'Новости';

    const ITEMS_PER_PAGE = 12;

    /**
     * @var NewsRepository
     */
    private $newsRepository;

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
        $this->newsRepository = app(NewsRepository::class);
        $this->visaRepository = app(VisaRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->newsRepository->getWithFirstImageAndPagination(self::ITEMS_PER_PAGE);

        $breadcrumbs = $this->setBreadcrumbs([['name' => self::NAME, 'url' => null]])->breadcrumbs;

        $otherVisas = $this->visaRepository->getWithFirstImageForModule(4);

        return view('front.news.index', compact('paginator', 'otherVisas', 'breadcrumbs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug Model slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $news = $this->newsRepository->getForViewBySlug($slug);

        if(empty($news))
            abort(404);

        $otherNews = $this->newsRepository->getWithFirstImageForModule(4, $news->id);

        $breadcrumbs = $this->setBreadcrumbs([
            ['name' => self::NAME, 'url' => route('front.news.index')],
            ['name' => $news->title, 'url' => null],
        ])->breadcrumbs;

        return view('front.news.show', compact('news', 'otherNews', 'breadcrumbs'));

    }
}
