@extends('layouts.back.index')

@section('header', 'Пользователи')

@section('content')

<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col">
                {{-- <a href="{{ route('admin.page.create') }}" class="btn btn-success">
                    <em class="fas fa-plus mr-1"></em> Добавить страницу
                </a> --}}
            </div>
            <div class="col-auto">
                @include('back.components.pagination', ['items'=>$paginator])
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover layout-fixed">
            <thead>
                <tr>
                    <th style="width: 70px">&nbsp;</th>
                    <th>@sortablelink('fio', 'ФИО')</th>
                    <th style="width: 20%">@sortablelink('email', 'Email')</th>
                    <th style="width: 160px">@sortablelink('phone', 'Телефон')</th>
                    <th style="width: 100px">@sortablelink('orders_count', 'Заказы')</th>
                    <th style="width: 160px" class="text-center">@sortablelink('updated_at', 'Изменен')</th>
                    <th style="width: 70px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($paginator as $item)
                <tr>
                    <td class="text-center"><em class="{{ $item->type_icon }}"></em></td>
                    <td><a href="{{ route('admin.user.show', $item) }}">{{ $item->fio }}</a></td>
                    <td>{{ $item->email }}</td>
                    <td>
                        @isset($item->phone)
                        {{ \App\Helpers\PhoneHelper::beautifyPhone($item->phone) }}
                        @endisset
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.user.show.tabToGo', [$item->id, 'orders']) }}" class="d-inline-flex align-items-center justify-content-center btn btn-outline-primary btn-sm">
                            <span class="d-block mr-1">{{ $item->orders_count }}</span>
                            <span class="d-block"><em class="fas fa-cash-register"></em></span>
                        </a>
                    </td>
                    <td class="text-center">{{ $item->updated_at_human }}</td>
                    <td class="py-0 vertical-align-middle">
                        <form action="{{ route('admin.user.destroy', $item) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm delete" data-trigger="hover" data-popup="tooltip" data-placement="left" title="Удалить" data-element_name="{{ $item->fio }}" disabled><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Пользователей пока нет</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

    <div class="card-footer border-top">
        <div class="row">
            <div class="col">
                {{-- <a href="{{ route('admin.page.create') }}" class="btn btn-success">
                    <em class="fas fa-plus mr-1"></em> Добавить страницу
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
