<?php

namespace App\Http\Services;

use App\Enums\FilterType;
use App\Http\Controllers\Controller;

use App\Models\Question;
use App\Models\Result;
use Illuminate\Http\Request;

use Illuminate\Support\Str;


class ResultProviderService
{
    public function queryBuilder($type,$area_id = false,$sector_id = false,$question_id = false){
        $paremeter = [['type',$type]];
        $absolute_area_id = $area_id;
        if($area_id){
            if($type =='city'){
                $area_id = 'city_id';
            }elseif($type =="subcity"){
                $area_id = 'subcity_id';
            }else{
                $area_id= 'wereda_id';
            }
        }

        $area_id ? array_push($paremeter,[$area_id,$absolute_area_id]): null;
        $sector_id ? array_push($paremeter,['sector_id',$sector_id]): null;
        $question_id ? array_push($paremeter,['question_id',$question_id]): null;
        return  Result::where($paremeter)->get();
    }
    public function statBuilderSectorArea($data){

    $total = 0;

    foreach ($data as $record){

        if($record->question_type == 'boolean'){
            $record->value = !$record->value ? 5 : 1;
        }
        $total += $record->value;
    }

    $average = $total != 0 ? $total/$data->count() : 0;
    $percentage = $this->cleanDecimal($average)/5 * 100;


    return array(
        "total_questions"=>$data->count(),
        "total_people"=>$data->count()/ Question::all()->count(),
        "average"=>$this->cleanDecimal($average),
        "percentage"=>$this->cleanDecimal($percentage,1),
        "status"=>$this->defineStats($percentage)
    );
}
public function defineStats($value){

    if($value >= 95){
        return 'vgood';
    }elseif($value < 95 && $value >= 80){
        return 'good';
    }elseif($value < 80 && $value >= 60){
        return 'medium';
    }else{
        return 'bad';
    }

}

    public function cleanDecimal($value,$pref = 2){
        return number_format((float)$value, $pref, '.', '');
    }




    public static function getResultData($type = FilterType::SECTOR,$filters=[]){

        $singularEntity = Str::singular($type);

        return \DB::table($type)
            ->join('results', $type.'.id', '=', 'results.'.$singularEntity.'_id')

            ->select($type.'.id',$type.'.name', \DB::raw('count(*) as total'),
                \DB::raw('ROUND(AVG(results.value),2) as average' ),
                \DB::raw('ROUND(AVG(results.value)/5*100,2) as percentage'),
                \DB::raw('CASE
                WHEN ROUND(AVG(results.value)/5*100,2) >= 95 THEN "vgood"
                WHEN ROUND(AVG(results.value)/5*100,2) < 95 AND ROUND(AVG(results.value)/5*100,2) >= 80 THEN "good"
                WHEN ROUND(AVG(results.value)/5*100,2) < 80 AND ROUND(AVG(results.value)/5*100,2) >= 60 THEN "medium"
                ELSE "bad"
                END as status'
    ),
    //status color
    \DB::raw('CASE
                WHEN ROUND(AVG(results.value)/5*100,2) >= 95 THEN "green"
                WHEN ROUND(AVG(results.value)/5*100,2) < 95 AND ROUND(AVG(results.value)/5*100,2) >= 80 THEN "blue"
                WHEN ROUND(AVG(results.value)/5*100,2) < 80 AND ROUND(AVG(results.value)/5*100,2) >= 60 THEN "yellow"
                ELSE "red"
                END as color'
),


    \DB::raw('CASE
                WHEN ROUND(AVG(results.value)/5*100,2) >= 95 THEN "success"
                WHEN ROUND(AVG(results.value)/5*100,2) < 95 AND ROUND(AVG(results.value)/5*100,2) >= 80 THEN "info"
                WHEN ROUND(AVG(results.value)/5*100,2) < 80 AND ROUND(AVG(results.value)/5*100,2) >= 60 THEN "warning"
                ELSE "danger"
                END as class')
    )





   ->where(function($q) use ($filters){
                foreach ($filters as $key => $value){
                    $q->where('results.'.$key,$value);
                }

   })

            ->groupBy($type.'.id',$type.'.name')
            ->get();

    }
}





