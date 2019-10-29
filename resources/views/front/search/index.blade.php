@extends('layouts.front.index')

@section('title', 'Результаты поиска')
@section('keywords', 'Результаты поиска')
@section('description', 'Результаты поиска')

@section('content')

    @include('front.components.breadcrumbs', compact('breadcrumbs'))

    @include('front.components.page-heading', ['heading' => 'Результаты поиска'])

    <div class="container">
        <div class="row">
            <div class="col-12 vpm__mb">

                @isset($searchError)

                    <div class="alert alert-danger vpm__mb" role="alert">
                        {{ $searchError }}
                    </div>

                @else

                    <div class="h4 font-weight-normal">Вы искали "{{ $searchWord }}"</div>

                    @if ($searches->total() > 0)

                        <div class="my-3 h5 font-weight-normal">Найдено: {{ $searches->total() }}</div>

                        <ul class="list-unstyled border-top">
                            @foreach ($searches as $searchResult)
                                <li class="p-4 border border-top-0">
                                    <a href="{{ route($searchResult->route, $searchResult->slug) }}" class="d-block m-0 h5 font-weight-normal">{{ $searchResult->title }}</a>
                                    <div>
                                        {!! mb_strimwidth(strip_tags($searchResult->content), 0, 250, "...") !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>


                        <div class="text-center">
                            @include('front.components.pagination', ['items'=>$searches])
                        </div>

                    @else
                        <p class="mt-3 h5 font-weight-normal">По вашему запросу ничего не найдено</p>
                    @endif

                @endisset

            </div>
        </div>
    </div>

@endsection
