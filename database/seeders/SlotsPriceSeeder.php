<?php

namespace Database\Seeders;

use App\Models\SlotsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlotsPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cheaperSessions = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17];
        $moreExpensiveSessions = [18,19,20,21,22,23];

        SlotsModel::whereIn("time", $cheaperSessions)->update([
            "price" => 1400,
        ]);

        SlotsModel::whereIn("time", $moreExpensiveSessions)->update([
            "price" => 1800,
        ]);
    }
}
