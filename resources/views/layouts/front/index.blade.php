<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <!-- Favicons -->
    {{-- <link rel="apple-touch-icon" href="/front/img/apple-touch-icon.png">
    <link rel="icon" href="/front/img/favicon.png"> --}}

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="page-body">
    <div id="app">

        @include('front.components.mobile-wrapper')

        <div class="pageWrapper vpm"> {{-- vpm = vertical paddings margins: vpm__pt, vpm__pb, vpm__py, vpm__mt, vpm__mb, vpm__my --}}
            <div class="pageWrapper__innerHolder">

                <!-- header -->
                @include('front.components.header')
                <!-- /header -->

                @yield('content')

                <!-- footer -->
                @include('front.components.footer')
                <!-- /footer -->

            </div>
        </div>



    </div>
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
