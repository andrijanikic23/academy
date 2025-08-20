<?php

namespace Database\Seeders;

use App\Models\CourtsModel;
use App\Models\SlotsModel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SlotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courts = CourtsModel::all()->pluck("id")->toArray();

        $this->fillSessions($courts);


    }

    public function fillSessions($courts)
    {
        for($j = 0; $j <= 9; $j++)
        {
            for($i = 7; $i <= 23; $i++)
            {
                foreach($courts as $court)
                {
                    if($i >= 7 && $i <=17)
                    {
                        SlotsModel::create([
                            "court_id" => $court,
                            "date" => Carbon::now()->addDays($j),
                            "time" => $i,
                            "price" => 1400,
                        ]);
                    }
                    else
                    {
                        SlotsModel::create([
                            "court_id" => $court,
                            "date" => Carbon::now()->addDays($j),
                            "time" => $i,
                            "price" => 1800,
                        ]);
                    }

                }
            }
        }


    }
}
