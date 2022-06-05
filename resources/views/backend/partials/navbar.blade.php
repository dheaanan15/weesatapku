<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center justify-items-center" data-toggle="dropdown" href="#">
                <span class="font-weight-bold mr-2">Hi,</span> {{ Auth::user()->name }}
                <i class="fas fa-caret-down ml-2"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <div class="dropdown-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')" class="text-dark" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            Log Out
                        </a>
                    </form>
                </div>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->