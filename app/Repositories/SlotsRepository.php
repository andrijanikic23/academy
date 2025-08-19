<?php

namespace App\Repositories;

use App\Models\SlotsModel;
use Illuminate\Support\Facades\Auth;

class SlotsRepository
{
    private $slotsModel;

    public function __construct()
    {
        $this->slotsModel = new SlotsModel();
    }

    public function booked($request)
    {
        $userId = Auth::id();
        $slotId = $request->sessionId;

        $this->slotsModel::whereId($slotId)->update([
            "user_id" => $userId,
            "status" => "RE",
        ]);
    }

    public function cancelled($request)
    {
        $userId = Auth::id();
        $slotId = $request->sessionId;

        $this->slotsModel::whereId($slotId)->update([
            "user_id" => null,
            "status" => null,
        ]);
    }
}
