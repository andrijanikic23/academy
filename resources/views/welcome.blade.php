@extends("layout")

@section("head")

    <style>

        * {
            font-family: "Open Sans", sans-serif;
            font-size: 1rem;
        }



        .welcomeImage {
            background-image: url("https://png.pngtree.com/background/20250203/original/pngtree-tennis-ball-and-racket-on-a-green-court-at-sunset-picture-image_15776545.jpg");
            background-repeat: no-repeat;
            background-size:cover;
            background-position:center;
            height:80vh;
        }



    </style>

@endsection

@section("content")

{{--    <img src="{{ asset('images/logo3.jpg') }}" class="w-100 mt-0 welcomeImage" alt="Tennis landscape image">--}}
    <div class="welcomeImage col-12"></div>



@endsection
