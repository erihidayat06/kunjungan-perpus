<nav class="navbar navbar-expand-lg  bg-success" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand  d-flex align-items-center" href="#">
            <img src="/assets/img/logo-perpus.png" width="40px" alt="" class="rounded-circle">
            <span class="d-none d-lg-block m-2">Perpustakaan MTs
                Negeri 1 Tegal</span> </a>

        <div class="d-flex " id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @if (auth()->user())
                            {{ auth()->user()->name }}
                        @else
                            Dashboard
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>

                        @if (auth()->user())
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Sign Out</span></button>
                                </form>
                            </li>
                        @endif



                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
