<?php

namespace App\Console\Commands;

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
            "days" => 14,
            "lang" => "sr",
        ]);

        $data = $response->json();
        $releventData = [];

        for($i = 0; $i <= 2; $i++)
        {
            foreach($data["forecast"]["forecastday"][$i]["hour"] as $info)
            {
                $releventData[] = [
                    "time" => $info["time"],
                    "temperature" => $info["temp_c"],
                    "windSpeed" => $info["wind_kph"],
                    "chanceOfRain" => $info["chance_of_rain"],
                ];
            }
        }


        dd($releventData);
    }
}
