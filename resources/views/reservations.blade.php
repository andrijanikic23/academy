@extends("reservationsLayout")

@section("head")

    <style>
        table, th, td {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
            table-layout: fixed;
            text-align: center;
        }


        td {
            height:20px;
            width:30px;
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

    </style>

@endsection

@section("content")

    <article class="container d-flex gap-3 flex-row w-100">
        @foreach($dates as $date => $day)
            <div class="d-flex flex-column" style="width:120px">
                <div>
                    <h5>{{ $day }}</h5>
                    <span>{{ $date }}</span>
                </div>

                <div>
                    <table class="tableBorders">
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
                                            <td>
                                                <form method="POST" action="{{ route('session.booked') }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="sessionId" value="{{ $session["id"] }}">
                                                    <button></button>
                                                </form>
                                            </td>
                                        @else
                                            <form action="">
                                                <td><button>{{ $session["status"] }}</button></td>
                                            </form>
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
