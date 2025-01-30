<?php
namespace Database\Seeders;

use App\Models\City;
use App\Models\Question;

use App\Models\Subcity;
use App\Models\Survey;
use App\Models\Wereda;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SurverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Disable foreign key checks for speed
        Survey::query()->truncate(); // Clear existing records
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Re-enable foreign key checks

        // Load all data at once
        $subcities = Subcity::all();
        $questions = Question::all();
        $cities = City::all();
        $weredas = Wereda::all();
        $now = Carbon::now()->toDateTimeString(); // Get current timestamp for created_at/updated_at

        $surveyData = [];

        foreach ($questions as $question) {
            foreach ($subcities as $subcity) {
                $surveyData[] = [
                    "subcity_id" => $subcity->id,
                    "question_id" => $question->id,
                    "type" => "subcity",
                    "city_id" => 1,
                    "wereda_id" => null, // Explicitly set to null to match all inserts
                    "created_at" => $now,
                    "updated_at" => $now,
                ];
            }

            foreach ($cities as $city) {
                $surveyData[] = [
                    "question_id" => $question->id,
                    "type" => "city",
                    "city_id" => $city->id,
                    "subcity_id" => null, // Explicitly set to null
                    "wereda_id" => null, // Explicitly set to null
                    "created_at" => $now,
                    "updated_at" => $now,
                ];
            }

            foreach ($weredas as $wereda) {
                $surveyData[] = [
                    "question_id" => $question->id,
                    "type" => "wereda",
                    "wereda_id" => $wereda->id,
                    "subcity_id" => $wereda->subcity_id,
                    "city_id" => 1,
                    "created_at" => $now,
                    "updated_at" => $now,
                ];
            }
        }

        // **Insert surveys in bulk**
        foreach (array_chunk($surveyData, 5000) as $batch) {
            Survey::insert($batch);
        }
    }
}
