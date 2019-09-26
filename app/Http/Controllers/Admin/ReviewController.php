<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use App\Helpers\Flash;
use App\Repositories\Review\ReviewRepository;
use App\Http\Requests\Review\ReviewCreateRequest;
use App\Http\Requests\Review\ReviewUpdateRequest;
use App\Events\Image\PolymorphModelDeletedEvent;
use App\Http\Controllers\Admin\BaseController as AdminBaseController;

class ReviewController extends AdminBaseController
{

    const NAME = 'Отзывы';

    /**
     * @var ReviewRepository
     */
    private $reviewRepository;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->reviewRepository = app(ReviewRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->reviewRepository->getAllWithPagination(self::ITEMS_PER_PAGE);

        $breadcrumbs = $this->setBreadcrumbs([['name' => self::NAME, 'url' => null]])->breadcrumbs;

        return view('back.review.index', compact('paginator', 'breadcrumbs'));
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
                ['name' => self::NAME, 'url' => route('admin.review.index')],
                ['name' => 'Новый отзыв', 'url' => null]
            ]
        )->breadcrumbs;

        $tabToGo = 'primary';
        $timezone = Review::TIMEZONE;

        return view('back.review.create', compact('breadcrumbs', 'tabToGo', 'timezone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Review\ReviewCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewCreateRequest $request)
    {
        $review = Review::create($request->all());

        Flash::add('Отзыв добавлен');

        if($request->has('apply'))
            return redirect(route('admin.review.edit', $review->id));

        return redirect(route('admin.review.index'));
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
                ['name' => self::NAME, 'url' => route('admin.review.index')],
                ['name' => 'Редактирование отзыва', 'url' => null]
            ]
        )->breadcrumbs;

        $review = $this->reviewRepository->getForEditById($id);

        if(empty($review))
            abort(404);

        $timezone = Review::TIMEZONE;

        return view('back.review.edit', compact('review', 'timezone', 'breadcrumbs', 'tabToGo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Review\ReviewUpdateRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewUpdateRequest $request, $id)
    {
        $review = $this->reviewRepository->getForEditById($id);

        $review->update($request->all());

        Flash::add('Отзыв обновлен');

        if($request->has('apply'))
            return redirect(route('admin.review.edit', $review->id))->withInput($request->only('tabToGo'));

        return redirect(route('admin.review.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();

        event(new PolymorphModelDeletedEvent($review));

        Flash::add('Отзыв и его изображения удалены.', 'error');
        return redirect(route('admin.review.index'));
    }
}
