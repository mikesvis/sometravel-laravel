<?php

namespace App\Http\Controllers\Front;

use App\Repositories\Page\PageRepository;
use App\Http\Controllers\Front\BaseController as FrontBaseController;

class PageController extends FrontBaseController
{

    const NAME = 'Страницы';

    const ITEMS_PER_PAGE = 12;

    /**
     * @var PageRepository
     */
    private $pageRepository;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->pageRepository = app(PageRepository::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug Model slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $page = $this->pageRepository->getForViewBySlug($slug);

        if(empty($page))
            abort(404);

        $breadcrumbs = $this->setBreadcrumbs([
            ['name' => $page->title, 'url' => null],
        ])->breadcrumbs;

        return view('front.page.show', compact('page', 'breadcrumbs'));

    }
}
