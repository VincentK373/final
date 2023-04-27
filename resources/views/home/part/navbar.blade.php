<nav class="navbar navbar-expand-lg navbar-dark fixed-top"
    style="font-family: 'poppins'; font-size: large; background-color:#1f271b">
    <div class="container">
        <a class="navbar-brand" href="/">
            <span style="color: rgb(255, 255, 255); font-size:larger">
                <b style="color: rgb(0, 104, 71)">Me</b><b>xi</b><b style="color: rgb(206, 17, 38)">co</b>
                <b>Storage | </b>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/home"aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about*') ? 'active' : '' }}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('articles*') ? 'active' : '' }}" href="/products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}"
                        href="/categories">Categories</a>
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
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i>
                                    Dashboard</a></li>
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
                    <li class="nav-item" style="font-style:poppins">
                        <a href="/login" class="nav-link active">
                            <Log class="bi bi-box-arrow-in-right"> Log In
                        </a>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
