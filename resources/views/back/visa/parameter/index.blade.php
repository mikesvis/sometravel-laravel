<a href="{{ route('admin.parameter.create', $visa) }}" class="btn btn-outline-success mb-4">
    <em class="fas fa-plus mr-1"></em> Добавить параметр
</a>

<table class="table table-hover table-bordered layout-fixed">
    <thead>
        <tr>
            <th>Параметр</th>
            <th style="width: 20%">Название в калькуляторе</th>
            <th style="width: 80px" class="text-center"><em class="fas fa-calculator fa-lg" title="Присутствует в калькуляторе"></em></th>
            <th style="width: 20%">Название на странице заказа</th>
            <th style="width: 80px" class="text-center">
                <em class="fas fa-shopping-cart fa-lg" title="Параметр: Присутствует на странице заказа"></em>
            </th>
            <th style="width: 80px" class="text-center">
                <em class="fas fa-exclamation-circle fa-lg" title="Параметр: Обязательный"></em> /
                <em class="far fa-check-circle fa-lg" title="Значение: Выбрано по умолчанию"></em>
            </th>
            <th style="width: 80px" class="text-center">
                <em class="fas fa-dollar-sign fa-lg" title="Значение: Надбавка к цене"></em>
            </th>
            <th style="width: 80px" class="text-center">
                <em class="far fa-eye fa-lg" title="Значение: Статус"></em>
            </th>
            <th style="width: 80px" class="text-center"><em class="fas fa-sort-numeric-down fa-lg" title="Порядок"></em></th>
            <th style="width: 160px" class="text-center">Изменен</th>
            <th style="width: 70px">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($visa->parameters as $item)
        <tr>
            <td class="ellipsis"><a href="{{ route('admin.parameter.edit', $item) }}">{{ $item->title }}</a></td>
            <td class="ellipsis">{{ $item->calculator_title }}</td>
            <td class="text-center">
                @if ((bool)$item->is_on_calculator_page)
                <em class="far fa-check-circle text-success" title="Есть на калькуляторе"></em>
                @else
                <em class="far fa-times-circle text-danger" title="Нет на калькуляторе"></em>
                @endif
            </td>
            <td class="ellipsis">{{ $item->order_title }}</td>
            <td class="text-center">
                @if ((bool)$item->is_on_order_page)
                <em class="far fa-check-circle text-success" title="Есть на странице заказа"></em>
                @else
                <em class="far fa-times-circle text-danger" title="Нет на странице заказа"></em>
                @endif
            </td>
            <td class="text-center">
                @if ((bool)$item->required)
                <em class="far fa-check-circle text-success" title="Обязательный"></em>
                @else
                <em class="far fa-question-circle text-warning" title="Опциональный"></em>
                @endif
            </td>
            <td class="text-center">-</td>
            <td class="text-center">-</td>
            <td class="text-center">{{ $item->ordering }}</td>
            <td class="text-center">{{ $item->updated_at }}</td>
            <td class="py-0 vertical-align-middle">
                    <span
                    class="btn btn-outline-danger btn-sm delete cursor-pointer"
                    title="Удалить"
                    data-element_name="{{ $item->title }}"
                    disabled
                    data-delete="nested"
                    data-action="{{ route('admin.parameter.destroy', $item) }}"
                    ><i class="far fa-trash-alt"></i></span>
            </td>
        </tr>
        @if (count($item->values) == 0)
            <tr>
                <td class="py-0 vertical-align-middle">
                    <div class="d-flex justify-content-end align-items-center">
                        <div>Значения</div>
                        <div>
                            <a href="{{ route('admin.value.create', $item) }}" title="Добавить значение" class="btn btn-outline-success btn-sm ml-2"><em class="fas fa-plus"></em></a>
                        </div>
                    </div>
                </td>
                <td colspan="10" class="text-center">Значений этого параметра пока нет</td>
            </tr>
        @else
            @foreach ($item->values as $value)
            <tr>
                @if ($loop->first)
                    <td class="{{ (count($item->values) == 1) ? 'py-0 vertical-align-middle' : 'pt-2' }}" rowspan="{{ count($item->values) }}">
                        <div class="d-flex justify-content-end align-items-center">
                            <div>Значения</div>
                            <div>
                                <a href="{{ route('admin.value.create', $item) }}" title="Добавить значение" class="btn btn-outline-success btn-sm ml-2"><em class="fas fa-plus"></em></a>
                            </div>
                        </div>
                    </td>
                @endif
                <td colspan="2">calc_name</td>
                <td colspan="2">order_name</td>
                <td>is_default</td>
                <td>price</td>
                <td>status</td>
                <td>ordering</td>
                <td>changed</td>
                <td>del</td>
            </tr>
            @endforeach
        @endif

        @empty
        <tr>
            <td colspan="11" class="text-center">Параметров пока нет</td>
        </tr>
        @endforelse
    </tbody>
</table>
