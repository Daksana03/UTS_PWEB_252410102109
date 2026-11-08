@props(['username'])

<header class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="{{ route('dashboard', ['username' => $username]) }}"><img src="asset/BK_SideProfile copy.png" alt=""> Barracks Manager</a>

        <nav class="nav-links">
            <a href="{{ route('dashboard', ['username' => $username]) }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('pengelolaan', ['username' => $username]) }}"
               class="{{ request()->routeIs('pengelolaan') ? 'active' : '' }}">Pasukan</a>
            <a href="{{ route('profile', ['username' => $username]) }}"
               class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profil</a>
            <a href="{{ route('login') }}" class="logout">Keluar</a>
        </nav>
    </div>
</header>
