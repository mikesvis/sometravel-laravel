<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Flash;
use App\Models\Gallery;
use App\Repositories\Gallery\GalleryRepository;
use App\Events\Image\PolymorphModelDeletedEvent;
use App\Http\Requests\Gallery\GalleryCreateRequest;
use App\Http\Requests\Gallery\GalleryUpdateRequest;
use App\Http\Controllers\Admin\BaseController as AdminBaseController;

class GalleryController extends AdminBaseController
{

    const NAME = 'Галереи';

    /**
     * @var GalleryRepository
     */
    private $galleryRepository;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->galleryRepository = app(GalleryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $paginator = $this->galleryRepository->getAllWithPagination(self::ITEMS_PER_PAGE);

        $breadcrumbs = $this->setBreadcrumbs([['name' => self::NAME, 'url' => null]])->breadcrumbs;

        return view('back.gallery.index', compact('paginator', 'breadcrumbs'));

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
                ['name' => self::NAME, 'url' => route('admin.gallery.index')],
                ['name' => 'Новая галерея', 'url' => null]
            ]
        )->breadcrumbs;

        return view('back.gallery.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Gallery\GalleryCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryCreateRequest $request)
    {
        $gallery = Gallery::create($request->all());

        Flash::add('Галерея добавлена');

        if($request->has('apply'))
            return redirect(route('admin.gallery.edit', $gallery->id));

        return redirect(route('admin.gallery.index'));
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
                ['name' => self::NAME, 'url' => route('admin.gallery.index')],
                ['name' => 'Редактирование галереи', 'url' => null]
            ]
        )->breadcrumbs;

        $gallery = $this->galleryRepository->getForEditById($id);

        if(empty($gallery))
            abort(404);

        return view('back.gallery.edit', compact('gallery', 'breadcrumbs', 'tabToGo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Gallery\GalleryUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryUpdateRequest $request, $id)
    {
        $gallery = $this->galleryRepository->getForEditById($id);

        $gallery->update($request->all());

        Flash::add('Галерея обновлена.');

        if($request->has('apply'))
            return redirect(route('admin.gallery.edit', $gallery->id))->withInput($request->only('tabToGo'));

        return redirect(route('admin.gallery.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        event(new PolymorphModelDeletedEvent($gallery));

        Flash::add('Галерея и её изображения удалены.', 'error');
        return redirect(route('admin.gallery.index'));
    }
}
