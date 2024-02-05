<?php

namespace Database\Seeders;

use App\Enums\AreaTypeEnums;
use App\Models\City;
use App\Models\Question;
use App\Models\Result;
use App\Models\Sector;
use App\Models\Subcity;
use App\Models\Wereda;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ResultsSeeder extends Seeder
{

    private $carbon;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = Question::all();
        $sectors = Sector::all();
        $this->carbon = Carbon::now();
        $week = date('w');
        $month = date('m');
        $year = date('Y');

        Result::query()->truncate(); // Clear existing records

        foreach ($questions as $question) {
            foreach ($sectors as $sector) {
                foreach (City::all() as $city) {
                    $this->createResult($city->id, null, $sector->id, $question, AreaTypeEnums::CITY, $week, $month, $year);
                    foreach (Subcity::all() as $subcity) {
                        $this->createResult($city->id, $subcity->id, $sector->id, $question, AreaTypeEnums::SUBCITY, $week, $month, $year);
                        $weredas = Wereda::where('subcity_id', $subcity->id)->get();
                        foreach ($weredas as $wereda) {
                            $this->createResult($city->id, $subcity->id, $sector->id, $question, AreaTypeEnums::WEREDA, $week, $month, $year, $wereda->id);
                        }
                    }
                }
            }
        }
    }

    private function createResult($cityId, $subcityId, $sectorId, $question, $areaType, $week, $month, $year, $weredaId = null)
    {
        Result::create([
            "city_id" => $cityId,
            "subcity_id" => $subcityId,
            "sector_id" => $sectorId,
            "question_id" => $question->id,
            "value" => $question->type == 'boolean' ? rand(0, 1) : rand(1, 5),
            "type" => $areaType,
            "week" => $week,
            "month" => $month,
            "year" => $year,
            "question_type" => $question->type,
            "wereda_id" => $weredaId,
            "created_at" => $this->generateRandomDate($this->carbon),
        ]);
    }

    private function generateRandomDate($carbon)
    {
        return $carbon->copy()->subDays(rand(0, 365))->toDateTimeString();
    }
}
