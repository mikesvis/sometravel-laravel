<?php

namespace App\Http\Controllers\Admin\Visa;

use App\Helpers\Flash;
use App\Models\Visa\Visa;
use App\Models\Visa\Parameter;
use App\Repositories\Visa\ParameterRepository;
use App\Http\Requests\Visa\ParameterCreateRequest;
use App\Http\Requests\Visa\ParameterUpdateRequest;
use App\Http\Controllers\Admin\BaseController as AdminBaseController;

class ParameterController extends AdminBaseController
{

    const NAME = 'Параметры';

    /**
     * @var ParameterRepository
     */
    private $parameterRepository;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->parameterRepository = app(ParameterRepository::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Visa $visa)
    {
        $breadcrumbs = $this->setBreadcrumbs(
            [
                ['name' => 'Страны', 'url' => route('admin.visa.index')],
                ['name' => $visa->title, 'url' => route('admin.visa.edit.tabToGo', [$visa, 'moreParams'])],
                ['name' => 'Новый параметр', 'url' => null]
            ]
        )->breadcrumbs;

        return view('back.visa.parameter.create', compact('visa', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Visa\ParameterCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParameterCreateRequest $request)
    {
        $parameter = Parameter::create($request->all());

        Flash::add('Параметр добавлен');

        if($request->has('apply'))
            return redirect(route('admin.parameter.edit', $parameter->id));

        return redirect(route('admin.visa.edit.tabToGo', [$parameter->visa->id, 'moreParams']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id, $tabToGo = 'primary')
    // {
    //     $breadcrumbs = $this->setBreadcrumbs(
    //         [
    //             ['name' => self::NAME, 'url' => route('admin.visa.index')],
    //             ['name' => 'Редактирование страны', 'url' => null]
    //         ]
    //     )->breadcrumbs;

    //     $visa = $this->visaRepository->getForEditById($id);

    //     if(empty($visa))
    //         abort(404);

    //     $categoriesList = $this->categoryRepository->getForSelect();

    //     $documentsList = $this->imageRepository->getDocumentsForSelect();

    //     $timezone = Visa::TIMEZONE;

    //     return view('back.visa.visa.edit', compact('visa', 'categoriesList', 'documentsList', 'timezone', 'breadcrumbs', 'tabToGo'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Visa\VisaUpdateRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    // public function update(VisaUpdateRequest $request, $id)
    // {
    //     $visa = $this->visaRepository->getForEditById($id);

    //     $visa->update($request->all());

    //     $visa->categories()->sync($request->input('categories'));
    //     $visa->documents()->sync($request->input('documents'));

    //     Flash::add('Страна обновлена');

    //     if($request->has('apply'))
    //         return redirect(route('admin.visa.edit', $visa->id))->withInput($request->only('tabToGo'));

    //     return redirect(route('admin.visa.index'));
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visa\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Visa $visa)
    // {
    //     $visa->delete();

    //     event(new PolymorphModelDeletedEvent($visa));

    //     Flash::add('Страна и её изображения удалены.', 'error');
    //     return redirect(route('admin.visa.index'));
    // }

}
