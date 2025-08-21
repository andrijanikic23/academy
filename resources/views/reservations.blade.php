@extends("reservationsLayout")

@section("head")

    <style>

        table tr:nth-child(odd){
             background-color: palevioletred;
        }

        table tr:nth-child(even) {
            background-color: darkslateblue;
        }



        table, th, td {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
            table-layout: fixed;
            text-align: center;
            vertical-align: middle;
        }


        td {
            height:30px;
            max-height:30px;
            width:50px;
        }

        td form {
            margin: 0;
            height: 100%;
        }
        td form button {
            width:100%;
            height:100%;
            box-sizing:border-box;
            opacity:0;
        }

        .btnRe {
            padding: 0;
            margin: 0;
            width: 100%;
            height:100%;
            background:none;
            border: 3px solid lawngreen;
            font-size:15px;
        }

        .btnCa {
            width: 100%;
            height:100%;
            background:none;
            border: none;
            font-size:15px;
        }

        .yourSession {
            background-color:yellow;
            width:100%;
            height:100%;
        }


    </style>

@endsection

@section("content")

    <article class="container d-flex gap-3 flex-row w-100">
        @foreach($dates as $date => $day)
            <div class="d-flex flex-column" style="width:120px">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <h5>{{ $day }}</h5>
                    <span>{{ $date }}</span>
                </div>

                <div>
                    <table>
                        <thead>
                        <tr>
                            <th>  </th>
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

                                            @php
                                                $userId = \Illuminate\Support\Facades\Auth::id();
                                            @endphp

                                            @if(isset($userId))

                                                <td><button class="btnCa d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#booking-{{ $session['id'] }}">{{ $session["status"] }}</button></td>

                                                <div class="modal" id="booking-{{ $session['id'] }}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Rezervacija termina</h5>
                                                                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Potvrda rezervacije termina u "{{ $day }}" u {{$session["time"]}}h na terenu {{$session["court_id"]}}</p>
                                                            </div>
                                                            <div class="modal-body d-flex flex-row justify-content-around">
                                                                @if($session["temperature"] !== null)
                                                                    <div>
                                                                        <p><i class="fa-solid fa-temperature-full"></i> {{ $session["temperature"] }}&deg;C</p>
                                                                    </div>

                                                                    <div>
                                                                        <p><i class="fa-solid fa-umbrella"></i> {{ $session["chance_of_rain"] }}%</p>
                                                                    </div>

                                                                    <div>
                                                                        <p><i class="fa-solid fa-wind"></i> {{ $session["wind_speed"] }}km/h</p>
                                                                    </div>
                                                                @endif
                                                            </div>

                                                            <div class="modal-footer">
                                                                <form method="POST" action="{{ route('session.booked') }}">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="sessionId" value="{{ $session['id'] }}">
                                                                    <button class="btn btn-primary">Rezerviši ({{$session["price"]}}din)</button>
                                                                </form>

                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @else
                                                <td>{{ $session["status"] }}</td>
                                            @endif


                                        @else

                                            @if($session["user_id"] == $userId)
                                                <td><button class="btnRe yourSession d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#confirmation-{{ $session['id'] }}">{{ $session["status"] }}</button></td>

                                                <div class="modal" id="confirmation-{{ $session['id'] }}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Otkazivanje</h5>
                                                                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Otkazivanje termina</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form method="POST" action="{{ route('session.cancelled') }}">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="sessionId" value="{{ $session['id'] }}">
                                                                    <button class="btn btn-primary">Otkaži</button>
                                                                </form>

                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
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
    </article>

@endsection
