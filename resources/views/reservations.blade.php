@php use Illuminate\Support\Facades\Auth; @endphp
@extends("reservationsLayout")

@section("head")

    <style>
        * {
            font-family: "Open Sans", sans-serif;
            font-size: 1rem;
        }

        table tr:nth-child(odd) {
            background-color: palevioletred;
        }

        table tr:nth-child(even) {
            background-color: cornflowerblue;
        }

        table, th, td {
            table-layout: fixed;       /* Fiksira kolone prema širini */
            width: 100%;
            text-align: center;
            vertical-align: middle;
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            width: 50px;               /* fiksna širina kolone */
            height: 40px;              /* fiksna visina reda */
            max-height: 40px;          /* sprečava rast */
            overflow: hidden;          /* tekst koji ne staje se sakriva */
            white-space: nowrap;       /* sprečava prelamanje teksta */
            text-overflow: ellipsis;   /* prikazuje "..." ako tekst ne staje */
        }

        td form {
            margin: 0;
            height: 100%;
        }

        td form button {
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            opacity: 0;
        }

        .btnRe {
            padding: 0;
            margin: 0;
            width: 100%;
            height: 100%;
            background: none;
            border: 3px solid lawngreen;
            font-size: 15px;
        }

        .btnCa {
            width: 100%;
            height: 100%;
            background: none;
            border: none;
            font-size: 15px;
        }

        .yourSession {
            background-color: yellow;
            width: 100%;
            height: 100%;
        }
    </style>

@endsection

@section("content")

    @php
        $userId = Auth::id();
    @endphp

    <div class="container-fluid">
        <div class="row g-3">

            @foreach($dates as $date => $day)
                <div class="col-12 col-md-6 col-lg-2">

                    <div class="text-center mb-2">
                        <h5 class="mb-0">{{ $day }}</h5>
                        <small>{{ $date }}</small>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th></th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($availableSlots as $slot)
                                <tr>
                                    <td>{{ $slot }}h</td>

                                    @foreach($sessions as $session)
                                        @if($session["date"] == $date && $session["time"] == $slot)

                                            @if($session["status"] == null)

                                                @if(isset($userId))
                                                    <td>
                                                        <button
                                                            class="btnCa d-flex align-items-center justify-content-center"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#booking-{{ $session['id'] }}">
                                                        </button>
                                                    </td>

                                                    {{-- MODAL REZERVACIJA --}}
                                                    <div class="modal fade" id="booking-{{ $session['id'] }}" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Rezervacija termina</h5>
                                                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <p>
                                                                        Potvrda rezervacije termina u "{{ $day }}"
                                                                        u {{ $session["time"] }}h
                                                                        na terenu {{ $session["court_id"] }}
                                                                    </p>
                                                                </div>

                                                                <div class="modal-body d-flex justify-content-around">
                                                                    @if($session["temperature"] !== null)
                                                                        <p><i class="fa-solid fa-temperature-full"></i> {{ $session["temperature"] }}°C</p>
                                                                        <p><i class="fa-solid fa-umbrella"></i> {{ $session["chance_of_rain"] }}%</p>
                                                                        <p><i class="fa-solid fa-wind"></i> {{ $session["wind_speed"] }} km/h</p>
                                                                    @endif
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <form method="POST" action="{{ route('session.booked') }}">
                                                                        @csrf
                                                                        <input type="hidden" name="sessionId" value="{{ $session['id'] }}">
                                                                        <button class="btn btn-primary">
                                                                            Rezerviši ({{ $session["price"] }}din)
                                                                        </button>
                                                                    </form>

                                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                                                                        Zatvori
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                @else
                                                    <td></td>
                                                @endif

                                            @else

                                                @if($session["user_id"] == $userId)
                                                    <td>
                                                        <button
                                                            class="btnRe yourSession d-flex align-items-center justify-content-center"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#confirmation-{{ $session['id'] }}">
                                                        {{ $session->status }}</button>
                                                    </td>

                                                    {{-- MODAL OTKAZIVANJE --}}
                                                    <div class="modal fade" id="confirmation-{{ $session['id'] }}" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Otkazivanje</h5>
                                                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <p>Otkazivanje termina</p>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <form method="POST" action="{{ route('session.cancelled') }}">
                                                                        @csrf
                                                                        <input type="hidden" name="sessionId" value="{{ $session['id'] }}">
                                                                        <button class="btn btn-primary">Otkaži</button>
                                                                    </form>

                                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                                                                        Zatvori
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                @else
                                                    <td>{{ $session["status"] }}</td>
                                                @endif

                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            @endforeach

        </div>
    </div>

@endsection
