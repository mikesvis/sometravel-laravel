<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ mix('/back/css/app.css') }}">

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('back.components.top-nav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('back.components.side-nav')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@yield('header')</h1>
                        </div><!-- /.col -->
                        @include('back.components.breadcrumbs', compact('breadcrumbs'))
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            {{-- @include('back.components.header', compact('header', 'breadcrumbs')) --}}
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            @yield('content')
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        @include('back.components.side-right-nav')
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            &nbsp;
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="{{ mix('/back/js/manifest.js') }}"></script>
    <script src="{{ mix('/back/js/vendor.js') }}"></script>
    <script src="{{ mix('/back/js/app.js') }}"></script>

    @yield('footer-scripts')

</body>
</html>
