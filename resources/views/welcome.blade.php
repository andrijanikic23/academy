@extends("layout")

@section("head")
    <style>

        .welcomeImage {
            background-image: url("https://png.pngtree.com/background/20250203/original/pngtree-tennis-ball-and-racket-on-a-green-court-at-sunset-picture-image_15776545.jpg");
            background-attachment:fixed;
            background-repeat: no-repeat;
            background-size:cover;
            background-position:center;
            width:100%;
        }



    </style>

@endsection

@section("content")

{{--    <img src="{{ asset('images/logo3.jpg') }}" class="w-100 mt-0 welcomeImage" alt="Tennis landscape image">--}}
    <div class="welcomeImage" style="height:500px;"></div>



@endsection
