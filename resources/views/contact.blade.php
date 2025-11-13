@extends("layout")

@section("title", "Kontakt")

@section("head")
    <style>

        .contactImage {
            background-attachment:fixed;
            background-repeat: no-repeat;
            background-size:cover;
            background-position:center;
            height:110vh;
            width:100%;
        }



    </style>

@endsection

@section("content")

    <div>
        <img src="{{ asset('images/contact_image.png') }}" class="contactImage">
    </div>

    <div class="container d-flex flex-row mt-5">
        <div>
            <div class="d-flex gap-4">
                <div class="text-center">
                    <a href="tel:+381612111088" style="text-decoration:none; font-size: 25px"><i class="fa-solid fa-phone fa-lg" style="color:green;"></i><br>
                    +381612111088</a>
                </div>

                <div class="text-center">
                    <a href="mailto:andrijanikic001@gmail.com" style="text-decoration:none; font-size: 25px"><i class="fa-solid fa-envelope fa-lg" style="color:white;"></i><br>
                        andrijanikic001@gmail.com</a>
                </div>

                <div class="text-center">
                    <a href="https://maps.app.goo.gl/AZahyQZf7PUDdaNu6" style="text-decoration:none; font-size: 25px"><i class="fa-solid fa-location-dot fa-lg" style="color:red; text-decoration:none;"></i><br>
                        Bulevar Zorana Đinđića 163</a>
                </div>

            </div>

            <form method="POST" action="{{ route('contact.message') }}" class="mt-5">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col">
                        <input name="name" type="text" class="form-control" placeholder="Vaše ime i prezime">
                    </div>
                    <div class="col">
                        <input name="email" type="email" class="form-control" placeholder="Vaš email">
                    </div>
                    <div class="mt-4">
                        <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Unesite vašu poruku, pitanje ili sugestiju"></textarea>
                    </div>
                    <div>
                        <button class="form-control mt-4 bg-success">Smečuj poruku</button>
                    </div>

                </div>
            </form>
        </div>




        <div class="container col-4">
            <img src="{{ asset('images/logo3.jpg') }}" style="height:500px; width:500px;">
        </div>
    </div>



@endsection
