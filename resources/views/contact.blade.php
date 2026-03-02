@extends("layout")

@section("title", "Kontakt")

@section("head")
    <style>
        body {
            font-family: "Open Sans", sans-serif;
        }

        /* HERO SECTION */
        .contact-hero {
            background:
                linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)),
                url('{{ asset("images/contact_image.png") }}');
            background-size: cover;
            background-position: center;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        /* CONTACT INFO FIX */
        .contact-box a {
            display: block;
            word-break: break-word;
            overflow-wrap: break-word;
            max-width: 100%;
            font-size: 1rem;
            text-decoration: none;
            color: #333;
        }

        .contact-box i {
            margin-bottom: 8px;
        }

        /* FORM */
        textarea {
            resize: none;
        }

        /* LOGO */
        .contact-logo {
            max-width: 100%;
            height: auto;
        }

        /* MOBILE */
        @media (max-width: 768px) {
            .contact-hero {
                height: 45vh;
            }

            .desktop-only {
                display: none;
            }
        }
    </style>
@endsection

@section("content")

    <!-- HERO -->
    <header class="contact-hero">
        <div>
            <h1 class="display-5 fw-bold">Kontaktirajte nas</h1>
            <p class="lead">Tu smo za sva pitanja i sugestije</p>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <section class="container my-5">
        <div class="row g-5 align-items-start">

            <!-- LEFT COLUMN -->
            <div class="col-12 col-lg-6">

                <!-- CONTACT INFO -->
                <div class="row text-center mb-5 contact-box">

                    <div class="col-12 col-md-4 mb-4">
                        <a href="tel:+381612111088">
                            <i class="fa-solid fa-phone fa-2x text-success"></i><br>
                            +381&nbsp;61&nbsp;211&nbsp;1088
                        </a>
                    </div>

                    <div class="col-12 col-md-4 mb-4">
                        <a href="mailto:andrijanikic001@gmail.com">
                            <i class="fa-solid fa-envelope fa-2x text-primary"></i><br>
                            andrijanikic001@gmail.com
                        </a>
                    </div>

                    <div class="col-12 col-md-4 mb-4">
                        <a href="https://maps.app.goo.gl/AZahyQZf7PUDdaNu6" target="_blank">
                            <i class="fa-solid fa-location-dot fa-2x text-danger"></i><br>
                            Bulevar Zorana Đinđića 163
                        </a>
                    </div>

                </div>

                <!-- CONTACT FORM -->
                <form method="POST" action="{{ route('contact.message') }}">
                    @csrf

                    <div class="mb-3">
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Ime i prezime"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Email adresa"
                            required
                        >
                    </div>

                    <div class="mb-4">
                    <textarea
                        name="message"
                        class="form-control"
                        rows="6"
                        placeholder="Unesite vašu poruku"
                        required
                    ></textarea>
                    </div>

                    <button class="btn btn-success w-100 py-2">
                        Smečuj poruku 🎾
                    </button>
                </form>

            </div>

            <!-- RIGHT COLUMN -->
            <div class="col-12 col-lg-6 text-center desktop-only">
                <img
                    src="{{ asset('images/logo3.jpg') }}"
                    class="contact-logo"
                    alt="Logo kluba"
                >
            </div>

        </div>
    </section>

@endsection
