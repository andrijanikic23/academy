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

        foreach($allSessions as $session)
        {
            if($session["date"] !== $previousDate)
            {
                $previousDate = $session["date"];
                Carbon::setLocale("sr");
                $anotherDay = Carbon::parse($session["date"])->translatedFormat("l");
                //!!!!!!
                $anotherDay = mb_convert_case($anotherDay, MB_CASE_TITLE, "UTF-8");
                $dates[$previousDate] = $anotherDay;
            }
        }


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
