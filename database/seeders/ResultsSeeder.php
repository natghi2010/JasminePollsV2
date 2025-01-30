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
use Illuminate\Support\Facades\DB;

class ResultsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Disable foreign key checks for speed
        Result::query()->truncate(); // Clear existing records
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Re-enable foreign key checks

        $questions = Question::all();
        $sectors = Sector::all();
        $cities = City::all();
        $subcities = Subcity::all();
        $weredas = Wereda::all()->groupBy('subcity_id'); // Group by subcity to avoid multiple queries

        $week = date('w');
        $month = date('m');
        $year = date('Y');
        $carbon = Carbon::now();

        $insertData = [];

        foreach ($questions as $question) {
            foreach ($sectors as $sector) {
                foreach ($cities as $city) {
                    $insertData[] = $this->prepareResultData($city->id, null, $sector->id, $question, AreaTypeEnums::CITY, $week, $month, $year, $carbon);

                    foreach ($subcities->where('city_id', $city->id) as $subcity) {
                        $insertData[] = $this->prepareResultData($city->id, $subcity->id, $sector->id, $question, AreaTypeEnums::SUBCITY, $week, $month, $year, $carbon);

                        if (isset($weredas[$subcity->id])) {
                            foreach ($weredas[$subcity->id] as $wereda) {
                                $insertData[] = $this->prepareResultData($city->id, $subcity->id, $sector->id, $question, AreaTypeEnums::WEREDA, $week, $month, $year, $carbon, $wereda->id);
                            }
                        }
                    }
                }
            }
        }

        // **Insert in bulk**
        foreach (array_chunk($insertData, 5000) as $batch) {
            Result::insert($batch);
        }
    }

    private function prepareResultData($cityId, $subcityId, $sectorId, $question, $areaType, $week, $month, $year, $carbon, $weredaId = null)
    {
        return [
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
            "created_at" => $carbon->copy()->subDays(rand(0, 365))->toDateTimeString(),
        ];
    }
}
