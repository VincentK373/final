<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="font-family: 'poppins'; font-size: large">
    <div class="container">
        <a class="navbar-brand" style="color: black"href="/">
            <span style="color: white; font-size:larger"><b>On</b></span><span
                style="color:rgb(183, 141, 230); ; font-size:larger"><b>Learn
                    |</b></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}"
                        href="/home"aria-current="page" href="/">Dashboard</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome Back, {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/"><i class="bi bi-layout-text-window-reverse"></i>
                                    Home</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-person-fill-gear"></i>
                                    Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link active">
                            <Log class="bi bi-box-arrow-in-right"> Log In
                        </a>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
