@extends("layout")

@section("content")

    <article class="container d-flex flex-column">
        <h3>Ispod se nalazi forma gde možeš upisati novog člana kluba</h3>
        <form method="POST" action="{{ route('team.added.member') }}" class="d-flex flex-column gap-3">
            {{ csrf_field() }}
            <div class="row">
                <div class="col">
                    <input name="name" type="text" class="form-control" placeholder="Ime">
                </div>
                <div class="col">
                    <input name="surname" type="text" class="form-control" placeholder="Prezime">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input name="email" type="email" class="form-control" placeholder="Email">
                </div>
                <div class="col">
                    <input name="role" type="text" class="form-control" placeholder="Radna pozicija">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input name="image_url" type="text" class="form-control" placeholder="Putanja do slike">
                </div>
                <div class="col">
                    <input name="phone_number" type="text" class="form-control" placeholder="Broj telefona">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input name="date_of_birth" type="date" class="form-control" placeholder="Datum rođenja">
                </div>
                <div class="col">
                    <select class="form-select" name="status">
                        <option disabled selected>Radni odnos</option>
                        <option value="active">Aktivan</option>
                        <option value="inactive">Neaktivan</option>
                        <option value="pending">U obradi</option>
                    </select>
                </div>
            </div>

            <button class="btn-primary">Add</button>

        </form>
    </article>

@endsection
