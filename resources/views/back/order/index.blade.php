@extends('layouts.back.index')

@section('header', 'Заказы')

@section('content')

<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col">
                {{-- <a href="{{ route('admin.order.create') }}" class="btn btn-success">
                    <em class="fas fa-plus mr-1"></em> Добавить заказ
                </a> --}}
            </div>
            <div class="col-auto">
                @include('back.components.pagination', ['items'=>$paginator])
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover table-bordered layout-fixed" style="min-width: 1500px">
            <thead>
                <tr class="text-center">
                    <th style="width: 160px" class="text-center">№ и Дата</th>
                    <th style="width: 150px">Статус</th>
                    <th style="width: 100px">Оплата</th>
                    <th style="width: 230px">Виза</th>
                    <th>Пользователь</th>
                    <th style="width: 80px" class="text-center">Шагов</th>
                    <th style="width: 160px" class="text-center">Дата подачи</th>
                    <th style="width: 160px" class="text-center">Дата доставки</th>
                    <th style="width: 160px" class="text-center">Изменен</th>
                    <th style="width: 70px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($paginator as $item)
                <tr>
                    <td>
                        <a href="{{ route('admin.order.edit', $item) }}" title="Просмотр"><em class="fas fa-edit"></em></a>
                        <strong>#{{ $item->order_number }}</strong>
                        <span class="d-block">от {{ $item->created_at_date_simple }}</span>
                    </td>
                    <td class="text-center">
                        <strong class="{{ $item->status_color }}">{{ $item->status_name }}</strong>
                    </td>
                    <td class="text-center">
                        {!! $item->payment_icon !!}
                        <nobr>{{ number_format($item->total, 0, ".", " ") }} руб.</nobr>
                    </td>
                    <td>
                        @if ($item->has_visa)
                            <a href="{{ route('admin.visa.edit', $item->visa) }}" class="d-block">{{ $item->visa_title }}</a>
                        @else
                            <span class="d-block">{{ $item->visa_title }}</span>
                        @endif

                        @isset($item->json_parameters['date_start'])
                            <span class="d-block">Начало: {{ $item->json_parameters['date_start']}}</span>
                        @endisset

                        @isset($item->json_parameters['date_end'])
                            <span class="d-block">Окончание: {{ $item->json_parameters['date_end']}}</span>
                        @endisset

                    </td>
                    <td>
                        @if ($item->has_user)
                            <a href="{{ route('admin.user.edit', $item->user) }}" class="d-block">{{ implode(" ", $item->user_name) }}</a>
                            <span class="d-block">{!! implode("<br />", $item->user_contacts) !!}</span>
                        @else
                            <span class="d-block">{{ implode(" ", $item->user_name) }}</span>
                            <span class="d-block">{!! implode("<br />", $item->user_contacts) !!}</span>
                        @endif
                    </td>
                    <td class="text-center"> {{ $item->steps_completed }}&nbsp;/&nbsp;{{ $stepsTotal }}</td>
                    <td class="text-center">
                        {{ $item->appliance_date_simple }}
                    </td>
                    <td class="text-center">
                        {{ $item->delivery_date_simple }}
                    </td>
                    <td class="text-center">{{ $item->updated_at }}</td>
                    <td class="py-0 vertical-align-middle">
                        <form action="{{ route('admin.news.destroy', $item) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm delete" data-trigger="hover" data-popup="tooltip" data-placement="left" title="Удалить" data-element_name="{{ $item->title }}" disabled><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center">Заказов пока нет</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

    <div class="card-footer border-top">
        <div class="row">
            <div class="col">
                {{-- <a href="{{ route('admin.news.create') }}" class="btn btn-success">
                    <em class="fas fa-plus mr-1"></em> Добавить новость
                </a> --}}
            </div>
            <div class="col-auto">
                @include('back.components.pagination', ['items'=>$paginator])
            </div>
        </div>
    </div>

</div>
<!-- /.card -->

@endsection
