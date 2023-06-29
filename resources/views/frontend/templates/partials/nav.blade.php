<div class="navbar-fixed">
    <nav  class="teal lighten-2">
            <div class="nav-wrapper">
            <a href="{{ route('homepage') }}" class="brand-logo"><b class="white-text">KEMBANGKUNING</b></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger" ><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li class="{{ Route::currentRouteNamed('homepage') ? 'active' : '' }}">
                    <a class="white-text" href="{{ route('homepage') }}">Beranda</a>
                </li>
                <li class="{{ Route::currentRouteNamed('profil') ? 'active' : '' }}">
                    <a class="white-text" href="{{ route('profil') }}">Profil Desa</a>
                </li>
                <li class="{{ Route::currentRouteNamed('pengumuman') ? 'active' : '' }}">
                    <a class="white-text" href="{{ route('pengumuman') }}">Pengumuman</a>
                </li>
                <li class="{{ Route::currentRouteNamed('kontak') ? 'active' : '' }}">
                    <a class="white-text" href="{{ route('kontak') }}">Kontak</a>
                </li>

                @guest
                <li><a href="{{route ('login') }}" class="waves-effect pink lighten-2 btn"><b>Masuk</b> <i class="material-icons right">lock_outline</i></a></li>
                <li><a href="{{route ('register') }}" class="waves-effect pink lighten-2 btn "><b>Daftar </b><i class="material-icons right">chevron_right</i></a></li>
                @else
            <ul id="dropdown1" class="dropdown-content">
                <li>
                    @if (auth()->user()->hasRole('admin'))
                        <a href="{{ route ('admin.dashboard') }}"> Dashboard</a>
                    @else
                        <a href="{{ route ('home') }}">Home</a>
                    @endif
                </li>
                <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                </li>
            </ul>
                <li><a href="#" class="dropdown-trigger" data-target="dropdown1">{{ auth()->user()->name }}</a><li>
                @endguest
            </ul>
            </div>
    </nav>
</div>
<!--sidenav-->
<ul class="sidenav" id="mobile-demo">
    <li class="{{ Route::currentRouteNamed('homepage') ? 'active' : '' }}">
        <a href="{{ route('homepage') }}">Beranda</a>
    </li>
    <li class="{{ Route::currentRouteNamed('profil') ? 'active' : '' }}">
        <a href="{{ route('profil') }}">Profil Desa</a>
    </li>
    <li class="{{ Route::currentRouteNamed('pengumuman') ? 'active' : '' }}">
        <a  href="{{ route('pengumuman') }}">Pengumuman</a>
    </li>
    <li class="{{ Route::currentRouteNamed('kontak') ? 'active' : '' }}">
        <a  href="{{ route('kontak') }}">Kontak</a>
    </li>

    @guest
    <li><a href="{{route ('login') }}">Masuk</a></li>
    <li><a href="{{route ('register') }}">Daftar</a></li>
    @else
    <li><a href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">Logout</a>
    </li>
    @endguest
</ul>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
