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

        $parameter->dealWithOrder();

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
    public function edit($id, $tabToGo = 'primary')
    {
        $parameter = $this->parameterRepository->getForEditById($id);

        if(empty($parameter))
            abort(404);

        $breadcrumbs = $this->setBreadcrumbs(
            [
                ['name' => 'Страны', 'url' => route('admin.visa.index')],
                ['name' => $parameter->visa->title, 'url' => route('admin.visa.edit.tabToGo', [$parameter->visa, 'moreParams'])],
                ['name' => 'Редактирование параметра', 'url' => null]
            ]
        )->breadcrumbs;

        return view('back.visa.parameter.edit', compact('parameter', 'breadcrumbs', 'tabToGo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Visa\ParameterUpdateRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParameterUpdateRequest $request, $id)
    {
        $parameter = $this->parameterRepository->getForEditById($id);

        $parameter->update($request->all());

        $parameter->dealWithOrder();

        Flash::add('Параметр обновлен');

        if($request->has('apply'))
            return redirect(route('admin.parameter.edit', $parameter->id))->withInput($request->only('tabToGo'));

        return redirect(route('admin.visa.edit.tabToGo', [$parameter->visa->id, 'moreParams']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visa\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parameter $parameter)
    {
        $parameter->delete();

        Flash::add('Параметр удалён', 'error');

        return redirect(route('admin.visa.edit.tabToGo', [$parameter->visa->id, 'moreParams']));
    }

}
