<?php

namespace App\Console\Commands;

use App\Models\SlotsModel;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ForecastCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slots:forecast';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get("http://api.weatherapi.com/v1/forecast.json", [
            "key" => env("API_KEY"),
            "q" => "Belgrade",
            "days" => 3,
            "lang" => "sr",
        ]);

        $data = $response->json();

        for($i = 0; $i <= 2; $i++)
        {
            foreach($data["forecast"]["forecastday"][$i]["hour"] as $info)
            {
                $hour = Carbon::parse($info["time"])->format("H");

                $date = Carbon::parse($info["time"])->format("Y-m-d");

                if($hour >= 7 && $hour <= 23)
                {
                    SlotsModel::where("date", $date)->where("time", $hour)->update([

                        "temperature" => $info["temp_c"],
                        "wind_speed" => $info["wind_kph"],
                        "chance_of_rain" => $info["chance_of_rain"],
                    ]);


                }
            }
        }

    }
}
