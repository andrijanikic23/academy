@extends("layout")

@section("content")

    <style>

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
            <h1>Team</h1>
            <p>The heart of our academy is our team. Not only do we have the very best coaches in the World, but we also cover each and every aspect of the player's life. From fitness experts, managing staff, and physiotherapists we don't leave anything to chance.</p>
            <p>Meet our team:</p>
        </div>
        <div class="container">
            <div class="row">
                @foreach($coaches as $coach)
                    <div class="col-6 mb-4 text-center">
                        <img class="round_image" src="{{ $coach->image_url }}" alt="{{ $coach->name }}">
                        <h5>{{ $coach->name }} {{ $coach->surname }}</h5>
                        <p class="text-muted">{{ $coach->role }}</p>
                    </div>
                @endforeach
            </div>
        </div>

    </article>


@endsection
