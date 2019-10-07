<?php

namespace App\Http\Controllers\Admin\Visa;

use App\Helpers\Flash;
use App\Models\Visa\Value;
use Illuminate\Http\Request;
use App\Models\Visa\Parameter;
use App\Repositories\Visa\ValueRepository;
use App\Http\Requests\Visa\ValueCreateRequest;
use App\Events\Visa\ValueModelUpdatedCreatedEvent;
use App\Http\Controllers\Admin\BaseController as AdminBaseController;

class ValueController extends AdminBaseController
{

    const NAME = 'Значения';

    /**
     * @var ValueRepository
     */
    private $valueRepository;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->valueRepository = app(ValueRepository::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Parameter $parameter)
    {
        $breadcrumbs = $this->setBreadcrumbs(
            [
                ['name' => 'Страны', 'url' => route('admin.visa.index')],
                ['name' => $parameter->visa->title, 'url' => route('admin.visa.edit.tabToGo', [$parameter->visa, 'moreParams'])],
                ['name' => $parameter->title, 'url' => route('admin.visa.edit.tabToGo', [$parameter->visa, 'moreParams'])],
                ['name' => 'Новое значение', 'url' => null]
            ]
        )->breadcrumbs;

        return view('back.visa.value.create', compact('parameter', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Visa\ValueCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValueCreateRequest $request)
    {
        $value = Value::create($request->all());

        Flash::add('Значение добавлено');

        event(new ValueModelUpdatedCreatedEvent($value));

        if($request->has('apply'))
            return redirect(route('admin.value.edit', $value->id));

        return redirect(route('admin.visa.edit.tabToGo', [$value->parameter->visa->id, 'moreParams']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $tabToGo = 'primary')
    {
        $value = $this->valueRepository->getForEditById($id);

        if(empty($value))
            abort(404);

        $breadcrumbs = $this->setBreadcrumbs(
            [
                ['name' => 'Страны', 'url' => route('admin.visa.index')],
                ['name' => $value->parameter->visa->title, 'url' => route('admin.visa.edit.tabToGo', [$value->parameter->visa, 'moreParams'])],
                ['name' => $value->parameter->title, 'url' => route('admin.visa.edit.tabToGo', [$value->parameter->visa, 'moreParams'])],
                ['name' => 'Редактирование параметра', 'url' => null]
            ]
        )->breadcrumbs;

        return view('back.visa.value.edit', compact('value', 'breadcrumbs', 'tabToGo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visa\Value  $value
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Value $value)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visa\Value  $value
     * @return \Illuminate\Http\Response
     */
    public function destroy(Value $value)
    {
        $value->delete();

        Flash::add('Значение удалено', 'error');

        return redirect(route('admin.visa.edit.tabToGo', [$value->parameter->visa->id, 'moreParams']));
    }
}
