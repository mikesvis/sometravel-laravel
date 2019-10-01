<?php

namespace App\Http\Controllers\Admin\Visa;

use App\Helpers\Flash;
use App\Models\Visa\Category;
use App\Repositories\Visa\CategoryRepository;
use App\Http\Requests\Visa\CategoryCreateRequest;
use App\Http\Requests\Visa\CategoryUpdateRequest;
use App\Http\Controllers\Admin\BaseController as AdminBaseController;

class CategoryController extends AdminBaseController
{

    const NAME = 'Категории';

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
        $this->categoryRepository = app(CategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->categoryRepository->getAllWithPagination(self::ITEMS_PER_PAGE);

        $breadcrumbs = $this->setBreadcrumbs([
            ['name' => 'Визы', 'url' => route('admin.visa.index')],
            ['name' => self::NAME, 'url' => null],
        ])->breadcrumbs;

        return view('back.visa.category.index', compact('paginator', 'breadcrumbs'));
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
                ['name' => 'Визы', 'url' => route('admin.visa.index')],
                ['name' => self::NAME, 'url' => route('admin.category.index')],
                ['name' => 'Новая категория', 'url' => null]
            ]
        )->breadcrumbs;

        $tabToGo = 'primary';
        $timezone = Category::TIMEZONE;

        return view('back.visa.category.create', compact('breadcrumbs', 'tabToGo', 'timezone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Visa\CategoryCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        $category = Category::create($request->all());

        Flash::add('Категория добавлена');

        if($request->has('apply'))
            return redirect(route('admin.category.edit', $category->id));

        return redirect(route('admin.category.index'));
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
                ['name' => 'Визы', 'url' => route('admin.visa.index')],
                ['name' => self::NAME, 'url' => route('admin.category.index')],
                ['name' => 'Редактирование категории', 'url' => null]
            ]
        )->breadcrumbs;

        $category = $this->categoryRepository->getForEditById($id);

        if(empty($category))
            abort(404);

        $timezone = Category::TIMEZONE;

        return view('back.visa.category.edit', compact('category', 'timezone', 'breadcrumbs', 'tabToGo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Visa\CategoryUpdateRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = $this->categoryRepository->getForEditById($id);

        $category->update($request->all());

        Flash::add('Категория обновлена');

        if($request->has('apply'))
            return redirect(route('admin.category.edit', $category->id))->withInput($request->only('tabToGo'));

        return redirect(route('admin.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visa\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        Flash::add('Категория удалена.', 'error');
        return redirect(route('admin.category.index'));
    }
}
