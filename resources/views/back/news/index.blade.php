@extends('layouts.back.index')

@section('header', 'Новости')

@section('content')

<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col">
                <a href="{{ route('admin.news.create') }}" class="btn btn-success">
                    <em class="fas fa-plus mr-1"></em> Добавить новость
                </a>
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
                    <th style="width: 200px">Страна</th>
                    <th style="width: 25%">Заголовок</th>
                    <th>Анонс</th>
                    <th style="width: 100px" class="text-center"><em class="far fa-image fa-lg" title="Изображения"></em></th>
                    <th style="width: 160px" class="text-center">Дата новости</th>
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
                    <td class="ellipsis">{{ $item->country }}</td>
                    <td class="ellipsis"><a href="{{ route('admin.news.edit', $item) }}">{{ $item->title }}</a></td>
                    <td class="ellipsis">{{ $item->excerpt }}</td>
                    <td class="text-center py-0 vertical-align-middle">
                        <a href="{{ route('admin.news.edit.tabToGo', [$item->id, 'images']) }}" class="d-inline-flex align-items-center justify-content-center btn btn-outline-primary btn-sm">
                            <span class="d-block mr-1">{{ $item->images_count }}</span>
                            <span class="d-block"><em class="far fa-image"></em></span>
                        </a>
                    </td>
                    <td class="text-center">{{ $item->dateHuman }}</td>
                    <td class="text-center">{{ $item->ordering }}</td>
                    <td class="text-center">
                        @if ((bool)$item->status)
                        <em class="far fa-check-circle text-success" title="Включена"></em>
                        @else
                        <em class="far fa-times-circle text-danger" title="Выключена"></em>
                        @endif
                    </td>
                    <td class="text-center">
                        @if ((bool)$item->status)
                            <a href="{{ route('front.news.show', $item->slug) }}" title="Посмотреть на сайте" target="_blank"><em class="fas fa-external-link-alt"></em></a>
                        @endif
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
                    <td colspan="10" class="text-center">Новостей пока нет</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

    <div class="card-footer border-top">
        <div class="row">
            <div class="col">
                <a href="{{ route('admin.news.create') }}" class="btn btn-success">
                    <em class="fas fa-plus mr-1"></em> Добавить новость
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
