<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="/images/logo-globe.svg" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">Visa Интеграл</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/back/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <span class="d-block text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.news.index') }}" class="nav-link  @if (Route::is('admin.news.*')) active @endif">
                        <i class="nav-icon far fa-newspaper"></i>
                        <p>Новости</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.page.index') }}" class="nav-link  @if (Route::is('admin.page.*')) active @endif">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Страницы</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.gallery.index') }}" class="nav-link  @if (Route::is('admin.gallery.*')) active @endif">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Галереи</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.review.index') }}" class="nav-link  @if (Route::is('admin.review.*')) active @endif">
                        <i class="nav-icon far fa-newspaper"></i>
                        <p>Отзывы</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.files') }}" class="nav-link @if (Route::is('admin.files') || Route::is('admin.files.*')) active @endif">
                        <i class="nav-icon fas fa-save"></i>
                        <p>Файловый менеджер</p>
                    </a>
                </li>
                {{-- <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Starter Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
