@extends("layout")

@section("title", "Tim")

@section("content")

    <style>


        * {
            font-family: "Open Sans", sans-serif;
            font-size: 1rem;
        }


        .round_image {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            object-fit: cover;
            object-position: top;
        }

    </style>

    <article class="container d-flex flex-column gap-4">
        <div class="container d-flex flex-column">
            <h1>Tim</h1>
            <p>Srce naše akademije je naš tim. Ne samo da imamo najbolje trenere na svetu, već pokrivamo svaki aspekt života igrača. Od fitnes stručnjaka, menadžerskog osoblja do fizioterapeuta – ništa ne prepuštamo slučaju.</p>
            <p>Upoznaj naš tim:</p>
        </div>
        <div class="container">
            <div class="row">
                @foreach($coaches as $coach)
                    <div class="col-12 col-lg-6 col-md-6 mb-4 text-center">
                        <img class="round_image" src="{{ $coach->image_url }}" alt="{{ $coach->name }}">
                        <h4 class="mt-3">{{ $coach->name }} {{ $coach->surname }}</h4>
                        <p class="text-muted">{{ $coach->role }}</p>
                    </div>
                @endforeach
            </div>
        </div>

    </article>


@endsection
