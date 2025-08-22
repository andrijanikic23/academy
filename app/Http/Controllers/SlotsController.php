<?php

namespace App\Http\Controllers;

use App\Models\SlotsModel;
use App\Repositories\SlotsRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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
        $availableSlots = [];

        for($i = 7; $i <=23; $i++)
        {
            array_push($availableSlots, $i);
        }

//        $availableSlots = range(7,23);
//        array_push($availableSlots, )
        Carbon::setLocale("sr");

        foreach($allSessions as $session)
        {
            if($session["date"] !== $previousDate)
            {
                $previousDate = $session["date"];

                $anotherDay = Carbon::parse($session["date"])->translatedFormat("l");
                //!!!!!!
                $anotherDay = mb_convert_case($anotherDay, MB_CASE_TITLE, "UTF-8");
                $dates[$previousDate] = $anotherDay;
            }
        }

//        $dates = $allSessions
//            ->pluck("date")
//            ->unique()
//            ->mapWithKeys(function($date) {
//                $day = Carbon::parse($date)->translatedFormat("l");
//                $day = mb_convert_case($day, MB_CASE_TITLE, "UTF-8");
//                return [$date => $day];
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
