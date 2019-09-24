@extends('layouts.back.index')

@section('header', 'Новости')

@section('content')

<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col">
                <a href="{{ route('admin.news.create') }}" class="btn btn-outline-success">
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
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 40px">id</th>
                    <th style="30%">Название</th>
                    {{-- <th>Заметки</th> --}}
                    <th style="width: 100px" class="text-center">
                        <em class="far fa-image fa-lg" data-toggle="tooltip" data-placement="auto" title="Изображения"></em>
                    </th>
                    <th style="width: 160px" class="text-center">Изменена</th>
                    <th style="width: 80px" class="text-center"><em class="far fa-eye fa-lg" data-toggle="tooltip" data-placement="auto" title="Статус"></em></th>
                    <th style="width: 70px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($paginator as $items)
                <tr>
                    <td class="text-center">{{ $item->id }}</td>
                    <td>
                        <a href="{{ route('admin.news.edit', $item->id) }}">{{ $item->title }}</a>
                    </td>
                    {{-- <td>{{ $item->notes }}</td> --}}
                    <td class="text-center py-0 vertical-align-middle">
                        <a href="{{ route('admin.news.edit.tabToGo', [$item->id, 'images']) }}" class="d-inline-flex align-items-center justify-content-center btn btn-outline-primary btn-sm">
                            <span class="d-block mr-1">{{ $item->images_count }}</span>
                            <span class="d-block"><em class="far fa-image"></em></span>
                        </a>
                    </td>
                    <td class="text-center">{{ $item->updated_at }}</td>
                    <td class="text-center">
                        @if ((bool)$item->status)
                        <em class="far fa-check-circle text-success"></em>
                        @else
                        <em class="far fa-times-circle text-danger"></em>
                        @endif
                    </td>
                    <td class="py-0 vertical-align-middle">
                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm delete" data-trigger="hover" data-popup="tooltip" data-placement="left" title="Удалить" data-element_name="{{ $item->title }}" disabled><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Новостей пока нет</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

    <div class="card-footer border-top">
        <div class="row">
            <div class="col">
                <a href="{{ route('admin.news.create') }}" class="btn btn-outline-success">
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
