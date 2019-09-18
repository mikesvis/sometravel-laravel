<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Flash;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Repositories\Gallery\GalleryRepository;
use App\Http\Requests\Gallery\GalleryCreateRequest;
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

        $categoriesList = $this->galleryRepository->getForSelect();

        return view('back.gallery.create', compact('categoriesList', 'breadcrumbs'));
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
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
    }
}
