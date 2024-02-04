<?php
namespace Database\Seeders;

use App\Models\City;
use App\Models\Question;
use App\Models\Subcity;
use App\Models\Survey;
use App\Models\Wereda;
use Illuminate\Database\Seeder;



class SurverySeeder extends Seeder

{


    /**
     * Run the database seeds.
     *
     * @return void

     */
    public function run()
    {
        //

        $subcities = Subcity::all();
        $questions = Question::all();
        $cities = City::all();
        $weredas = Wereda::all();


        foreach($questions as $question){
            foreach($subcities as $subcity){

                Survey::create([
                    "subcity_id"=>$subcity->id,
                    "question_id"=>$question->id,
                    "type"=>"subcity",
                    "city_id"=>1
                ]);
            }

            foreach($cities as $city){
                Survey::create([
                    "question_id"=>$question->id,
                    "type"=>"city",
                    "city_id"=>$city->id
                ]);
            }

            foreach($weredas as $wereda){
                Survey::create([
                    "question_id"=>$question->id,
                    "type"=>"wereda",
                    "wereda_id"=>$wereda->id,
                    "subcity_id"=>$wereda->subcity_id,
                    "city_id"=>1
                ]);
            }

            }
    }
}
