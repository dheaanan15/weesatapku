<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">
        <h3 class="brand-text font-weight-bold m-0">WeesataPku</h3>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center">
                        <i class="nav-icon mr-3 fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon mr-3 fas fa-torii-gate"></i>
                        <p>
                            Wisata
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="ml-2 nav-item">
                            <a href="{{ route('admin.wisata.index') }}" class="nav-link">
                                <i class="nav-icon mr-3 far fa-newspaper"></i>
                                <p>Object Wisata</p>
                            </a>
                        </li>
                        <li class="ml-2 nav-item">
                            <a href="{{ route('admin.galeri-wisata.index') }}" class="nav-link">
                                <i class="nav-icon mr-3 far fa-images"></i>
                                <p>Galeri</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.article.index') }}" class="nav-link d-flex align-items-center">
                        <i class="nav-icon mr-3 far fa-newspaper"></i>
                        <p>
                            Artikel
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.review.index') }}" class="nav-link d-flex align-items-center">
                        <i class="nav-icon mr-3 fas fa-star"></i>
                        <p>
                            Ulasan
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link d-flex align-items-center">
                        <i class="nav-icon mr-3 fas fa-users"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>