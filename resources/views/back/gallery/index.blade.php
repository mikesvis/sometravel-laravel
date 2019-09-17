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
            {{-- @include('admin.components.pagination', ['items'=>$paginator]) --}}
        </div>
        {{-- @include('admin.components.pagination', ['items'=>$paginator]) --}}
    </div>
    <!-- /.card-header -->

    <div class="card-body p-0">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10px">id</th>
                    <th style="width: 10px">pid</th>
                    <th>Название</th>
                    <th>Изображения</th>
                    <th>Порядок</th>
                    <th style="width: 40px">Изменена</th>
                    <th style="width: 40px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($galleries as $gallery)
                <tr>
                    <td>{{ $gallery->id }}</td>
                    <td>{{ $gallery->pid > 1 ? $gallery->pid : null }}</td>
                    <td>{{ $gallery->title }}</td>
                    <td>TODO image_count</td>
                    <td>@for ($i = 0; $i < $gallery->level; $i++)&bull;@endfor{{ 1 }}</td>
                    <td>{{ $gallery->updated_at }}</td>
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
            {{-- @include('admin.components.pagination', ['items'=>$paginator]) --}}
        </div>
    </div>

</div>
<!-- /.card -->

@endsection
