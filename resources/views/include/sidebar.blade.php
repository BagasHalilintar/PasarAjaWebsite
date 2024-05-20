{{-- sidebar --}}

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/layouts/index">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/layouts/tambah">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Data Toko</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/layouts/informasi">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Informasi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/layouts/promo">
                <i class="icon-mail menu-icon"></i>
                <span class="menu-title">Promo</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/layouts/event">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Event</span>
            </a>
        </li>

        <li class="nav-label" id="text-nav">ACCOUNT PAGES</li>
        <li class="nav-item">
            <a class="nav-link" href="/layouts/profil">
                <i class="icon-head menu-icon"></i>
                <span >Profile</span>
            </a>
        </li>
        <form action="{{ route('logout') }}" method="POST" >
            @csrf
            <li class="nav-item">
                <button class="nav-link" href="">
                    <i class="icon-grid menu-icon"></i>
                    <span >Logout</span>
                    
                </button>
            </li>
        </form>

    </ul>
</nav>
