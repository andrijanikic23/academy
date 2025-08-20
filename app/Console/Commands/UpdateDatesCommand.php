<?php

namespace App\Console\Commands;

use App\Models\CourtsModel;
use App\Models\SlotsModel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateDatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slots:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will update dates for available courts';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $earliestDate = SlotsModel::min("date");
        SlotsModel::where("date", $earliestDate)->delete();

        $latestDate = SlotsModel::max("date");
        $newLatestDate = Carbon::parse($latestDate)->addDays(1);
        $courts = CourtsModel::pluck("id")->toArray();


        for($i = 7; $i <= 23; $i++)
        {
            foreach($courts as $court)
            {
                if($i >= 7 && $i<=17)
                {
                    SlotsModel::create([
                        "court_id" => $court,
                        "date" => $newLatestDate,
                        "time" => $i,
                        "price" => 1400,
                    ]);
                }
                else
                {
                    SlotsModel::create([
                        "court_id" => $court,
                        "date" => $newLatestDate,
                        "time" => $i,
                        "price" => 1800,
                    ]);
                }

            }
        }


    }
}
