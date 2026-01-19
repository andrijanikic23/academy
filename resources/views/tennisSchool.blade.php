@extends("layout")

@section("title", "Škola tenisa")

@section("head")

    <style>
        * {
            font-family: "Open Sans", sans-serif;
            font-size:1rem;
        }

        .image-box {
            width: 100%;
            aspect-ratio: 16 / 9;
            overflow: hidden;
            border-radius: 8px;
        }

        .image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }


        @media only screen and (max-width: 576px)
        {
            .mobile {
                display:flex;
                flex-direction:column;
            }
        }

    </style>

@endsection


@section("content")
    <article class="container d-flex flex-column gap-5">
        <div class=" d-flex flex-column flex-lg-row flex-md-row gap-5 col-12">
            <img class="image-box" src="{{ asset('/images/tennis_school_images/tennis_school_2.jpg') }}" alt="Kids from tennis school">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h3>Škola tenisa</h3>
                <p>Kroz školu tenisa TK Baseline Warriors prošlo je preko 2000 dece.</p>
            </div>
        </div>
        <div class="d-flex flex-column flex-lg-row flex-md-row gap-5 col-12">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h3>Takmičarski pogon</h3>
                <p>U klubu je do sada organizovano preko 200 turnira sa preko 4000 dece od 5 do 18 godina.</p>
            </div>
            <img class="image-box" src="{{ asset('/images/tennis_school_images/kid_coach.webp') }}" alt="Kid with his coach">
        </div>
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <div class="image-box">
                    <img src="https://www.helenricetennis.com.au/wp-content/uploads/2019/06/Private-Tennis-Coaching.jpg">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="image-box">
                    <img src="{{ asset('/images/tennis_school_images/player.webp') }}">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="image-box">
                    <img src="{{ asset('/images/tennis_school_images/janko.jpg') }}">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="image-box">
                    <img src="{{ asset('/images/tennis_school_images/coach_player.png') }}">
                </div>
            </div>
        </div>
    </article>


@endsection

