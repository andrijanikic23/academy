<?php

namespace App\Http\Controllers;

use App\Models\SlotsModel;
use App\Repositories\SlotsRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SlotsController extends Controller
{

    private $slotsRepo;

    public function __construct()
    {
        $this->slotsRepo = new SlotsRepository();
    }
    public function getSessions()
    {

        $allSessions = SlotsModel::all();
        $dates = [];
        $previousDate = null;
        $availableSlots = range(7,23);


        //Setting up language to Serbian
        Carbon::setLocale("sr");

        foreach($allSessions as $session)
        {
            if($session["date"] !== $previousDate)
            {
                $previousDate = $session["date"];

                //Creating Carbon instance, returning day in Serbian
                $anotherDay = Carbon::parse($session["date"])->translatedFormat("l");

                //multi-byte convert case -> secure option, first letter upper case, UTF characters č,ć,ž...
                $anotherDay = mb_convert_case($anotherDay, MB_CASE_TITLE, "UTF-8");
                $dates[$previousDate] = $anotherDay;
            }
        }

//        $specificDates = $allSessions
//            ->pluck('date')           // uzmi samo datume
//            ->unique()                // jedinstveni datumi
//            ->mapWithKeys(function ($date) {
//                $day = Carbon::parse($date)
//                    ->translatedFormat('l'); // puni naziv dana
//                $day = mb_convert_case($day, MB_CASE_TITLE, 'UTF-8'); // prvo slovo veliko
//                $dates[$date] = $day;
//            });

        return view("reservations", ["sessions" => $allSessions, "dates" => $dates, "availableSlots" => $availableSlots]);
    }

    public function booking(Request $request)
    {
        $this->slotsRepo->booked($request);

        return redirect()->back();

    }

    public function cancelling(Request $request)
    {
        $this->slotsRepo->cancelled($request);

        return redirect()->back();

    }

}
