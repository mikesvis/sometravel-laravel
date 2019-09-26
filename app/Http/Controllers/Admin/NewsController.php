<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Helpers\Flash;
use App\Repositories\News\NewsRepository;
use App\Http\Requests\News\NewsCreateRequest;
use App\Http\Requests\News\NewsUpdateRequest;
use App\Events\Image\PolymorphModelDeletedEvent;
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
     * @param  \App\Http\Requests\News\NewsCreateRequest  $request
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
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $tabToGo = 'primary')
    {
        $breadcrumbs = $this->setBreadcrumbs(
            [
                ['name' => self::NAME, 'url' => route('admin.news.index')],
                ['name' => 'Редактирование новости', 'url' => null]
            ]
        )->breadcrumbs;

        $news = $this->newsRepository->getForEditById($id);

        if(empty($news))
            abort(404);

        $timezone = News::TIMEZONE;

        return view('back.news.edit', compact('news', 'timezone', 'breadcrumbs', 'tabToGo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\News\NewsUpdateRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, $id)
    {
        $news = $this->newsRepository->getForEditById($id);

        $news->update($request->all());

        Flash::add('Новость обновлена');

        if($request->has('apply'))
            return redirect(route('admin.news.edit', $news->id))->withInput($request->only('tabToGo'));

        return redirect(route('admin.news.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        event(new PolymorphModelDeletedEvent($news));

        Flash::add('Новость и её изображения удалены.', 'error');
        return redirect(route('admin.news.index'));
    }
}
