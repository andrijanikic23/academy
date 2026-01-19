<footer class="bg-secondary text-white py-5 mt-4">
    <div class="container">
        <div class="row text-center text-lg-start gy-4">

            <!-- O NAMA -->
            <div class="col-12 col-md-6 col-lg-3">
                <h4>O NAMA</h4>
                <p class="text-justify">
                    Teniski klub “Baseline Warriors” osnovan je 1996. godine u Beogradu.
                    Kroz 20 godina postojanja iznedrio je brojne uspešne tenisere.
                </p>
                <a href="{{ route('about') }}" class="btn btn-primary btn-sm">
                    Pročitaj više
                </a>
            </div>

            <!-- KATEGORIJE -->
            <div class="col-12 col-md-6 col-lg-2">
                <h4>KATEGORIJE</h4>
                <ul class="list-unstyled">
                    <li><a class="text-white" href="{{ route('session.schedule') }}">Rezervacija termina</a></li>
                    <li><a class="text-white" href="{{ route('team.overview') }}">Naša ekipa</a></li>
                    <li><a class="text-white" href="{{ route('school') }}">Škola tenisa</a></li>
                    <li><a class="text-white" href="{{ route('contact') }}">Kontakt</a></li>
                </ul>
            </div>

            <!-- KONTAKT -->
            <div class="col-12 col-md-6 col-lg-3">
                <h4>KONTAKT</h4>
                <p>
                    <a href="tel:+381612111088" class="text-white text-decoration-none">
                        <i class="fa-solid fa-phone text-success"></i> +381 61 211 1088
                    </a>
                </p>
                <p>
                    <a href="mailto:andrijanikic001@gmail.com" class="text-white text-decoration-none">
                        <i class="fa-solid fa-envelope"></i> andrijanikic001@gmail.com
                    </a>
                </p>
                <p>
                    <a href="https://maps.app.goo.gl/AZahyQZf7PUDdaNu6" class="text-white text-decoration-none">
                        <i class="fa-solid fa-location-dot text-danger"></i>
                        Bulevar Zorana Đinđića 163, Beograd
                    </a>
                </p>

                <div class="d-flex justify-content-center justify-content-lg-start gap-3 mt-3">
                    <a href="https://www.instagram.com/" style="color:mediumpurple;"><i class="fa-brands fa-instagram fa-2x"></i></a>
                    <a href="https://www.facebook.com/" class="text-primary"><i class="fa-brands fa-facebook fa-2x"></i></a>
                    <a href="https://www.youtube.com/" class="text-danger"><i class="fa-brands fa-youtube fa-2x"></i></a>
                </div>
            </div>

            <!-- LOGO -->
            <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/logo.png') }}"
                     class="img-fluid"
                     style="max-width: 150px;">
            </div>

        </div>

        <hr class="border-light my-4">

        <p class="text-center mb-0">
            &copy; 2025 Baseline Warriors. All rights reserved.
        </p>
    </div>
</footer>

<style>
    /* Footer responsive adjustments */
    @media (max-width: 576px) {
        footer p, footer a {
            font-size: 0.9rem; /* lakše za čitanje na malim ekranima */
        }
        footer img {
            max-width: 120px; /* manji logo na mobilnim uređajima */
        }
    }

    /* Footer text justify */
    footer p.text-justify {
        text-align: justify;
    }
</style>
