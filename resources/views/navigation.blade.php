@php use Illuminate\Support\Facades\Auth; @endphp

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img src="{{ asset('images/logo.png') }}" width="50" height="50" alt="Logo kluba">
        </a>

        <!-- TOGGLER (MOBILNI MENI DUGME) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENI -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}">Početna</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">O nama</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('session.schedule') }}">
                        Rezervacija termina
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown">
                        Treneri
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('team.overview') }}">
                                Naša ekipa
                            </a>
                        </li>

                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <li>
                                <a class="dropdown-item" href="{{ route('team.member') }}">
                                    Dodaj novog člana
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('school') }}">Škola tenisa</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Kontakt</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">Nalog</a>
                </li>

            </ul>
        </div>

    </div>
</nav>
