<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Helpers\Flash;
use App\Repositories\Page\PageRepository;
use App\Http\Requests\Page\PageCreateRequest;
use App\Http\Requests\Page\PageUpdateRequest;
use App\Events\Image\PolymorphModelDeletedEvent;
use App\Http\Controllers\Admin\BaseController as AdminBaseController;

class PageController extends AdminBaseController
{

    const NAME = 'Страницы';

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->pageRepository->getAllWithPagination(self::ITEMS_PER_PAGE);

        $breadcrumbs = $this->setBreadcrumbs([['name' => self::NAME, 'url' => null]])->breadcrumbs;

        return view('back.page.index', compact('paginator', 'breadcrumbs'));
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
                ['name' => self::NAME, 'url' => route('admin.page.index')],
                ['name' => 'Новая страница', 'url' => null]
            ]
        )->breadcrumbs;

        $tabToGo = 'primary';
        $timezone = Page::TIMEZONE;

        return view('back.page.create', compact('breadcrumbs', 'tabToGo', 'timezone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Page\PageCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageCreateRequest $request)
    {
        $page = Page::create($request->all());

        Flash::add('Страница добавлена');

        if($request->has('apply'))
            return redirect(route('admin.page.edit', $page->id));

        return redirect(route('admin.page.index'));
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
                ['name' => self::NAME, 'url' => route('admin.page.index')],
                ['name' => 'Редактирование страницы', 'url' => null]
            ]
        )->breadcrumbs;

        $page = $this->pageRepository->getForEditById($id);

        if(empty($page))
            abort(404);

        $timezone = Page::TIMEZONE;

        return view('back.page.edit', compact('page', 'timezone', 'breadcrumbs', 'tabToGo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Page\PageUpdateRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageUpdateRequest $request, $id)
    {
        $page = $this->pageRepository->getForEditById($id);

        $page->update($request->all());

        Flash::add('Страница обновлена');

        if($request->has('apply'))
            return redirect(route('admin.page.edit', $page->id))->withInput($request->only('tabToGo'));

        return redirect(route('admin.page.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();

        event(new PolymorphModelDeletedEvent($page));

        Flash::add('Страница и её изображения удалены.', 'error');
        return redirect(route('admin.page.index'));
    }
}
