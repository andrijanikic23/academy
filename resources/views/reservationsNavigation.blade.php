
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


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('session.schedule') }}">Raspored<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link account" href="{{ route('dashboard') }}">Korisnički panel</a>
            </li>
        </ul>
    </div>
</nav>
