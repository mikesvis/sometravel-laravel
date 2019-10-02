<?php

namespace App\Http\Controllers\Admin\Visa;

use App\Helpers\Flash;
use App\Models\Visa\Visa;
use App\Repositories\Visa\VisaRepository;
use App\Repositories\Image\ImageRepository;
use App\Http\Requests\Visa\VisaCreateRequest;
use App\Http\Requests\Visa\VisaUpdateRequest;
use App\Repositories\Visa\CategoryRepository;
use App\Events\Image\PolymorphModelDeletedEvent;
use App\Http\Controllers\Admin\BaseController as AdminBaseController;

class VisaController extends AdminBaseController
{

    const NAME = 'Страны';

    /**
     * @var VisaRepository
     */
    private $visaRepository;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var ImageRepository
     */
    private $imageRepository;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->visaRepository = app(VisaRepository::class);
        $this->categoryRepository = app(CategoryRepository::class);
        $this->imageRepository = app(ImageRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->visaRepository->getAllWithPagination(self::ITEMS_PER_PAGE);

        $breadcrumbs = $this->setBreadcrumbs([
            ['name' => 'Визы', 'url' => route('admin.visa.index')],
            ['name' => self::NAME, 'url' => null]
        ])->breadcrumbs;

        return view('back.visa.visa.index', compact('paginator', 'breadcrumbs'));
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
                ['name' => self::NAME, 'url' => route('admin.visa.index')],
                ['name' => 'Новая страна', 'url' => null]
            ]
        )->breadcrumbs;

        $categoriesList = $this->categoryRepository->getForSelect();

        $documentsList = $this->imageRepository->getDocumentsForSelect();

        $tabToGo = 'primary';
        $timezone = Visa::TIMEZONE;

        return view('back.visa.visa.create', compact('categoriesList', 'documentsList', 'breadcrumbs', 'tabToGo', 'timezone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Visa\VisaCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisaCreateRequest $request)
    {
        $visa = Visa::create($request->all());

        $visa->categories()->sync($request->input('categories'));
        $visa->documents()->sync($request->input('documents'));

        Flash::add('Страна добавлена');

        if($request->has('apply'))
            return redirect(route('admin.visa.edit', $visa->id));

        return redirect(route('admin.visa.index'));
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
                ['name' => self::NAME, 'url' => route('admin.visa.index')],
                ['name' => 'Редактирование страны', 'url' => null]
            ]
        )->breadcrumbs;

        $visa = $this->visaRepository->getForEditById($id);

        if(empty($visa))
            abort(404);

        $categoriesList = $this->categoryRepository->getForSelect();

        $documentsList = $this->imageRepository->getDocumentsForSelect();

        $timezone = Visa::TIMEZONE;

        return view('back.visa.visa.edit', compact('visa', 'categoriesList', 'documentsList', 'timezone', 'breadcrumbs', 'tabToGo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Visa\VisaUpdateRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(VisaUpdateRequest $request, $id)
    {
        $visa = $this->visaRepository->getForEditById($id);

        $visa->update($request->all());

        Flash::add('Страна обновлена');

        if($request->has('apply'))
            return redirect(route('admin.visa.edit', $visa->id))->withInput($request->only('tabToGo'));

        return redirect(route('admin.visa.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visa\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visa $visa)
    {
        $visa->delete();

        event(new PolymorphModelDeletedEvent($visa));

        Flash::add('Страна и её изображения удалены.', 'error');
        return redirect(route('admin.visa.index'));
    }

}
