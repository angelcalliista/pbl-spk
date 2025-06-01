<div>
    {{-- Navbar--}}
    <nav class="navbar navbar-expand-lg navbar-light bg-primary mb-4">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{url('/alternatif')}}">
                <img src="{{ asset('gambar/logo.png') }}" alt="Foto Profil" style="width: 200px; height: auto;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAlt" aria-controls="navbarNavAlt" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAlt">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="{{ route('admin.alternatif.index') }}">Alternatif</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.aspek.index') }}">Aspek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.kriteria.index') }}">Kriteria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.profile.index') }}">Nilai Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.perhitungan.index') }}">Perhitungan</a>
                    </li>
                </ul>
            </div>
            @auth
                <div class="nav-item dropdown text-white">
                <a class="nav-link dropdown-toggle fw-semibold" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('welcome') }}">Halaman Utama</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                @endif
            @endauth
        </div>
    </nav>
</div>
