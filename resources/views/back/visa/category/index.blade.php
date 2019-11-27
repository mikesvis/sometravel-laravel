@extends('layouts.back.index')

@section('header', 'Категории')

@section('content')

<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col">
                <a href="{{ route('admin.category.create') }}" class="btn btn-success">
                    <em class="fas fa-plus mr-1"></em> Добавить категорию
                </a>
            </div>
            <div class="col-auto">
                @include('back.components.pagination', ['items'=>$paginator])
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover layout-fixed" style="min-width: 1500px">
            <thead>
                <tr>
                    <th>Заголовок</th>
                    <th style="width: 25%">Пункт меню</th>
                    <th style="width: 80px" class="text-center"><em class="fas fa-sort-numeric-down fa-lg" title="Порядок"></em></th>
                    <th style="width: 80px" class="text-center"><em class="far fa-eye fa-lg" title="Статус"></em></th>
                    <th style="width: 80px" class="text-center"><em class="fas fa-desktop fa-lg" title="Посмотреть на сайте"></em></th>
                    <th style="width: 160px" class="text-center">Изменена</th>
                    <th style="width: 70px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($paginator as $item)
                <tr>
                    <td class="ellipsis"><a href="{{ route('admin.category.edit', $item) }}">{{ $item->title }}</a></td>
                    <td>{{ $item->menuname != '' ? $item->menuname : $item->title }}</td>
                    <td class="text-center">{{ $item->ordering }}</td>
                    <td class="text-center">
                        @if ((bool)$item->status)
                        <em class="far fa-check-circle text-success" title="Включена"></em>
                        @else
                        <em class="far fa-times-circle text-danger" title="Выключена"></em>
                        @endif
                    </td>
                    <td class="text-center">
                        {{-- @if ((bool)$item->status)
                            <a href="{{ route('front.category.show', $item->slug) }}" title="Посмотреть на сайте" target="_blank"><em class="fas fa-external-link-alt"></em></a>
                        @endif --}}
                    </td>
                    <td class="text-center">{{ $item->updated_at }}</td>
                    <td class="py-0 vertical-align-middle">
                        <form action="{{ route('admin.category.destroy', $item) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm delete" data-trigger="hover" data-popup="tooltip" data-placement="left" title="Удалить" data-element_name="{{ $item->title }}" disabled><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Категорий пока нет</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

    <div class="card-footer border-top">
        <div class="row">
            <div class="col">
                <a href="{{ route('admin.category.create') }}" class="btn btn-success">
                    <em class="fas fa-plus mr-1"></em> Добавить категорию
                </a>
            </div>
            <div class="col-auto">
                @include('back.components.pagination', ['items'=>$paginator])
            </div>
        </div>
    </div>

</div>
<!-- /.card -->

@endsection
