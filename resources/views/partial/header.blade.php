<header id="topnav">
    <div class="navbar-custom">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <nav class="navbar">
                        <a href="/" class="navbar-brand">Ipochan</a>
                        <div class="d-flex">


                            <!-- untuk mnampilkan klo ada user yg login -->
                            @auth
                            <div class="dropdown ml-2">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Welcome Back, {{ auth()->user()->nama }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="/dashboard">Dashboarh</a></li>
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            @else
                            <a href="/login" class="btn btn-outline-danger" type="submit">Login</a>
                            @endauth
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>