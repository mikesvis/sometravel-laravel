@extends('layouts.back.index')

@section('header', 'Галереи')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-around">
        <div>
            <a href="{{ route('admin.gallery.create') }}" class="btn btn-outline-success">
                <em class="fas fa-plus mr-1"></em>
                Новая галерея
            </a>
        </div>
        <div class="flex-grow-1">
            @include('back.components.pagination', ['items'=>$paginator])
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body table-responsive p-0">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">id</th>
                    <th style="width: 10px">pid</th>
                    <th>Название</th>
                    <th style="width: 100px" class="text-center">
                        <em class="far fa-image fa-lg" data-toggle="tooltip" data-placement="top" data-boundary="viewport" title="Изображения"></em>
                    </th>
                    <th style="width: 100px" class="text-center">
                        <em class="fas fa-sort-numeric-down" data-toggle="tooltip" data-placement="top" data-boundary="viewport" title="Порядок"></em>
                    </th>
                    <th style="width: 160px" class="text-center">Изменена</th>
                    <th style="width: 40px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($paginator as $gallery)
                <tr>
                    <td class="text-center">{{ $gallery->id }}</td>
                    <td class="text-center">{{ $gallery->parent_id > 1 ? $gallery->parent_id : ' - ' }}</td>
                    <td>
                        @php
                            $modelIterator = $gallery;
                        @endphp
                        @while ($modelIterator->parentRecursive != null )
                            @if ($modelIterator->parent_id > 1)
                                <span class="ml-4"></span>
                            @endif
                            @php
                                $modelIterator = $modelIterator->parentRecursive;
                            @endphp
                        @endwhile
                        {{ $gallery->title }}
                    </td>
                    <td class="text-center">XXX</td>
                    <td>@for ($i = 0; $i < $gallery->level; $i++)&bull;@endfor{{ 1 }}</td>
                    <td class="text-center">{{ $gallery->updated_at }}</td>
                    <td>Удалить</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Галерей пока нет</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

    <div class="card-footer border-top d-flex justify-content-around">
        <div>
            <a href="{{ route('admin.gallery.create') }}" class="btn btn-outline-success">
                <em class="fas fa-plus mr-1"></em> Новая галерея
            </a>
        </div>
        <div class="flex-grow-1">
            @include('back.components.pagination', ['items'=>$paginator])
        </div>
    </div>

</div>
<!-- /.card -->

@endsection
