<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        @can('user')
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link " href="/dashboard/posts">
                    <span data-feather="plus"></span>
                    Kirim Aduan
                </a>
            </li>


        </ul>
        @endcan
        <!-- bagian ini hanya boleh diakses can oleh yg punya akses digerbang/gate mana  -->
        <!-- pakai @ can dan nama gerbang/gatenya -->
        <!-- buat gate di app /provider /appservice provider -->
        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
            <span>Administrator</span>
        </h6>
        <ul class="nav flec-comun">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="/dashboard/categories">
                    <span data-feather="tag"></span>
                    Semua Kategori
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="/dashboard/post">
                    <span data-feather="grid"></span>
                    Semua Aduan
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/dashboard/users">
                    <span data-feather="users"></span>
                    Semua User
                </a>
            </li>

        </ul>
        @endcan
    </div>
</nav>