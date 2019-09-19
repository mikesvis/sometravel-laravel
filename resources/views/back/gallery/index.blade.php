@extends('layouts.back.index')

@section('header', 'Галереи')

@section('content')

<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col">
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-outline-success">
                    <em class="fas fa-plus mr-1"></em> Новая галерея
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
                    <th>Заметки</th>
                    <th style="width: 100px" class="text-center">
                        <em class="far fa-image fa-lg" data-toggle="tooltip" data-placement="auto" title="Изображения"></em>
                    </th>
                    <th style="width: 160px" class="text-center">Изменена</th>
                    <th style="width: 80px" class="text-center"><em class="far fa-eye fa-lg" data-toggle="tooltip" data-placement="auto" title="Статус"></em></th>
                    <th style="width: 70px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($paginator as $gallery)
                <tr>
                    <td class="text-center">{{ $gallery->id }}</td>
                    <td>
                        <a href="{{ route('admin.gallery.edit', $gallery->id) }}">{{ $gallery->title }}</a>
                    </td>
                    <td>{{ $gallery->notes }}</td>
                    <td class="text-center py-0 vertical-align-middle">
                        <a href="{{ route('admin.gallery.edit.tabToGo', [$gallery->id, 'images']) }}" class="d-inline-flex align-items-center justify-content-center btn btn-outline-primary btn-sm">
                            <span class="d-block mr-1">0</span>
                            <span class="d-block"><em class="far fa-image"></em></span>
                            {{-- [ X ]<em class="far fa-image"></em> --}}
                        </a>
                    </td>
                    <td class="text-center">{{ $gallery->updated_at }}</td>
                    <td class="text-center">
                        @if ((bool)$gallery->status)
                        <em class="far fa-check-circle text-success"></em>
                        @else
                        <em class="far fa-times-circle text-danger"></em>
                        @endif
                    </td>
                    <td class="py-0 vertical-align-middle">
                        <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm delete" data-trigger="hover" data-popup="tooltip" data-placement="left" title="Удалить" data-element_name="{{ $gallery->title }}" disabled><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Галерей пока нет</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

    <div class="card-footer border-top">
        <div class="row">
            <div class="col">
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-outline-success">
                    <em class="fas fa-plus mr-1"></em> Новая галерея
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
