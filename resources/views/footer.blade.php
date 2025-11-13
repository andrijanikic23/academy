<footer class="bg-secondary text-white text-center py-3 mt-4">
    <div class="container">
        <div class="d-flex column gap-5">
            <div class="col-3">
                <h3>O NAMA</h3>

                <p style="text-align:justify">Teniski klub “Baseline Warriors” osnovan je 1996. godine u Beogradu. Kroz 20 godina postojanja, klub je do sada sa velikim uspehom iznedrio mnoštvo domaćih igrača i igračica, od kojih je većina postigla zapažene juniorske i seniorske uspehe u svetu tenisa poput Miomira Kecmanovića, Filipa Krajinovića, Dušana Lajovića i drugih.</p>
                <a type="button" href="{{ route('about') }}" class="btn btn-primary btn-lg">Pročitaj više</a>
            </div>


            <div>
                <h3 class="mb-2">KATEGORIJE</h3>
                <nav class="navbar bg-light">
                    <div class="container-fluid">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('session.schedule') }}">Rezervacija termina</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('team.overview') }}">Naša ekipa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('school') }}">Škola tenisa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Kontakt</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>



            <div>
                <h3 class="mb-4">KONTAKT</h3>

                <p><a href="tel:+381612111088" style="text-decoration:none; color:white;"><i class="fa-solid fa-phone" style="color:green;"></i> +381612111088</a></p>
                <p><a href="mailto:andrijanikic001@gmail.com"  style="text-decoration:none; color:white;"><i class="fa-solid fa-inbox" style="color:white;"></i>  andrijanikic001@gmail.com</a></p>
                <p><a href="https://maps.app.goo.gl/AZahyQZf7PUDdaNu6"  style="text-decoration:none; color:white;"><i class="fa-solid fa-location-dot" style="color:red;"></i>  Bulevar Zorana Đinđića 163, 11070 Beograd</a></p>
                <div class="d-flex justify-content-around gap-2">
                    <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram fa-2xl" style="text-decoration:none; color:purple;"></i></a>
                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook fa-2xl" style="text-decoration:none; color:blue;"></i></a>
                    <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube fa-2xl" style="text-decoration:none; color:red;"></i></a>
                </div>
            </div>

            <div>
                <img src="{{ asset('images/logo.png') }}" style="height:300px; width:300px;">
            </div>


        </div>
    </div>
    &copy; 2025 Baseline Warriors. All rights reserved.



</footer>
