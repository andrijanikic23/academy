<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img src="images/logo.png" width="60" height="60" alt="">
        </a>
    </nav>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('welcome') }}">Početna <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">O nama</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('session.schedule') }}">Rezervacija termina</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Treneri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('school') }}">Škola tenisa</a>
            </li>
        </ul>
    </div>
</nav>
