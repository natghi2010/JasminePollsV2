<?php
namespace Database\Seeders;

use App\Models\City;
use App\Models\Question;

use App\Models\Result;
use App\Models\Sector;
use App\Models\Subcity;
use App\Models\Wereda;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

use Illuminate\Support\Str;


class ResultsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = City::all();

        $subcities = Subcity::all();
        $questions = Question::all();
        $sectors = Sector::all();
        $carbon = new Carbon;
     for($i=0;$i<1;$i++){
        foreach($questions as $question){
         foreach($sectors as $sector){
            foreach($cities as $city){
                Result::create([
                    "city_id"=>$city->id,
                    "sector_id"=>$sector->id,
                    "question_id"=>$question->id,
                    "value"=>$question->type == 'boolean' ? rand(0,1) : rand(1,5),
                    "week"=>date('w'),
                    "month"=>date('m'),
                    "year"=>date('Y'),
                    "type"=>'city',
                    "question_type"=>$question->type,
                    "created_at"=>$carbon->now()->subDays(rand(0, 365))
                ]);

            foreach($subcities as $subcity){

                Result::create([
                    "city_id"=>$city->id,
                    "subcity_id"=>$subcity->id,
                    "sector_id"=>$sector->id,
                    "question_id"=>$question->id,
                    "value"=>$question->type == 'boolean' ? rand(0,1) : rand(1,5),
                    "type"=>'subcity',
                    "week"=>date('w'),
                    "month"=>date('m'),
                    "year"=>date('Y'),
                    "question_type"=>$question->type,
                    "created_at"=>$carbon->now()->subDays(rand(0, 365))
                ]);
                $weredas = Wereda::where('subcity_id',$subcity->id)->get();
                foreach($weredas as $wereda){
                    Result::create([
                        "subcity_id"=>$subcity->id,
                        "wereda_id"=>$wereda->id,
                        "sector_id"=>$sector->id,
                        "question_id"=>$question->id,
                        "value"=>$question->type == 'boolean' ? rand(0,1) : rand(1,5),
                        "type"=>'wereda',
                        "question_type"=>$question->type,
                        "created_at"=>$carbon->now()->subDays(rand(0, 365))
                    ]);
                }
           }

         }
        }

        }
     }



    }
}
