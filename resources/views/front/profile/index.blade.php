@extends('layouts.front.index')

@section('title', 'Личный кабинет')
@section('keywords', 'Личный кабинет')
@section('description', 'Личный кабинет')

@section('content')

    @include('front.components.breadcrumbs', compact('breadcrumbs'))

    @include('front.components.page-heading', ['heading' => 'Добро пожаловать, USERNAME'])



@endsection
