
<style>
    /*nav ul li a.schedule {*/
    /*    color: red;*/
    /*    font-weight: bold;*/
    /*    border-bottom: 2px solid red;*/
    /*}*/

    /*nav ul li a.account {*/
    /*    color: red;*/
    /*    font-weight: bold;*/
    /*    border-bottom: 2px solid red;*/
    /*}*/



</style>

@php
    $activeUser = \Illuminate\Support\Facades\Auth::user();
@endphp


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse d-flex flex-row" id="navbarNav">

            @if(isset($activeUser))
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('session.schedule') }}">Raspored<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link account" href="{{ route('profile.edit') }}">Korisnički panel</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active d-flex">
                        <a class="nav-link account" href="{{ route('profile.logout') }}">{{ $activeUser["name"] }}>Odjava</a>
                    </li>
                </ul>

            @else
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('session.schedule') }}">Raspored<span class="sr-only">(current)</span></a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('profile.logged') }}">Prijava<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            @endif
    </div>
</nav>
