<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img src="{{ asset('images/logo.png') }}" width="60" height="60" alt="Logo kluba">
        </a>
    </nav>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link active" href="{{ route('welcome') }}">Početna <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item  active">
                <a class="nav-link" href="#">O nama</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('session.schedule') }}">Rezervacija termina</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Treneri
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('team.overview') }}">Naša ekipa</a></li>
                    <li><a class="dropdown-item" href="#">Posao</a></li>
                    <li><a class="dropdown-item" href="{{ route('team.member') }}">Dodaj novog člana</a></li>
                </ul>
            </li>
            <li class="nav-item  active">
                <a class="nav-link" href="{{ route('school') }}">Škola tenisa</a>
            </li>
        </ul>
    </div>
</nav>
