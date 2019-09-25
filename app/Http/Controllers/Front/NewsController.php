<?php

namespace App\Http\Controllers\Front;

use App\Models\News;
use App\Repositories\News\NewsRepository;
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
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->newsRepository = app(NewsRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $paginator = $this->newsRepository->getAllWithImagesAndPagination(self::ITEMS_PER_PAGE);

        $breadcrumbs = $this->setBreadcrumbs([['name' => self::NAME, 'url' => null]])->breadcrumbs;

        return view('front.news.index', compact('paginator', 'breadcrumbs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
        dd(__METHOD__);
        // dd($news);
    }
}
