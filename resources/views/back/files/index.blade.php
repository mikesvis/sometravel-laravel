@extends('layouts.back.index')

@section('header', 'Файловый менеджер')

@section('content')

<div style="height: calc(100vh - 57px - 72px - 57px); min-height: 600px">
    <div id="fm"></div>
</div>

@endsection

@section('footer-scripts')
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
@endsection
