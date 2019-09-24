<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Repositories\News\NewsRepository;
use App\Http\Requests\News\NewsCreateRequest;
use App\Http\Controllers\Admin\BaseController as AdminBaseController;

class NewsController extends AdminBaseController
{

    const NAME = 'Новости';

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
        $paginator = $this->newsRepository->getAllWithPagination(self::ITEMS_PER_PAGE);

        $breadcrumbs = $this->setBreadcrumbs([['name' => self::NAME, 'url' => null]])->breadcrumbs;

        return view('back.news.index', compact('paginator', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->setBreadcrumbs(
            [
                ['name' => self::NAME, 'url' => route('admin.news.index')],
                ['name' => 'Новая новость', 'url' => null]
            ]
        )->breadcrumbs;

        $tabToGo = 'primary';
        $timezone = News::TIMEZONE;

        return view('back.news.create', compact('breadcrumbs', 'tabToGo', 'timezone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {
        $news = News::create($request->all());

        Flash::add('Новость добавлена');

        if($request->has('apply'))
            return redirect(route('admin.news.edit', $news->id));

        return redirect(route('admin.news.index'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
