<?php

namespace App\Http\Controllers;

use App\Http\Services\ResultProviderService;
use App\Models\City;
use App\Models\Link;
use App\Models\Question;
use App\Models\Result;
use App\Models\Sector;
use App\Models\Subcity;
use App\Models\Wereda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    private $resultProviderService;
    public function __construct(ResultProviderService $resultProviderService)
    {
        $this->resultProviderService = $resultProviderService;
    }













    public function getInfoBySectorCity($id)
    {
        $sector = Sector::find($id);

        $sector->subcity =  $this->getSectorSummary('city', false, $id)->subcity['stats'] ?? null;
        $sector->wereda =  $this->getSectorSummary('city', false, $id)->wereda['stats'] ?? null;


        $sector->city =  $this->getSectorSummary('city', false, $id)['stats'] ?? null;

        return view('jonny.sector-summary', compact('sector'));
    }

    public function getInfoBySectorSubcity($id)
    {


        $sector = Sector::where('parent_id', $id)->get()->first();
        $subcities = Subcity::all();

        return view('jonny.sector-subcity', compact('subcities', 'sector'));
    }

    public function getInfoBySectorWereda($id)
    {

        $sector = Sector::find(Link::where('sector_city_id', $id)->with('wereda')->get()->last()->sector_wereda_id);

        $subcities = Subcity::all();

        foreach ($subcities as $subcity) {
            $subcity->stats = $this->statBuilder($this->queryBuilder('wereda', $subcity->id, $sector->id));
        }



        return view('jonny.sector-wereda', compact('sector', 'subcities'));
    }

    public function getWeredasWithSector($sector_id, $subcity_id)
    {

        $weredas = Wereda::where('subcity_id', $subcity_id)->get();
        $subcity = Subcity::find($subcity_id);
        $sector = Sector::find($sector_id);

        foreach ($weredas as $wereda) {
            $wereda->stat = $this->statBuilder($this->queryBuilder('wereda', $wereda->id, $sector->id, false));
        }


        return view('jonny.wereda-list-by-sector', compact('subcity', 'sector', 'weredas'));
    }


    public function sectorDetail($sector_id, $type, $area_id = false)
    {

        $sector = $this->getSectorSummary($type, $area_id, $sector_id);

        $questions = Question::all();

        if ($type == 'city') {
            $area = City::find($area_id);
        } elseif ($type == 'subcity') {
            $area = Subcity::find($area_id);
        } else {
            $area = Wereda::find($area_id);
        }


        foreach ($questions as $question) {

            $sector->total = Result::where('sector_id', '=', $sector_id)
                ->where('question_id', '=', $question->id)
                ->get()->count();

            $sector->bad = Result::where('sector_id', '=', $sector_id)
                ->where('question_id', '=', $question->id)
                ->where('value', 3)
                ->get()->count();

            $sector->medium = Result::where('sector_id', '=', $sector_id)
                ->where('question_id', '=', $question->id)
                ->where('value', '>=', 3)
                ->where('value', '<=', 4)
                ->get()->count();

            $sector->good = Result::where('sector_id', '=', $sector_id)
                ->where('question_id', '=', $question->id)
                ->where('value', '>=', 4)
                ->get()->count();

            $sector->vgood = Result::where('sector_id', '=', $sector_id)
                ->where('question_id', '=', $question->id)
                ->where('value', '>', 4)
                ->get()->count();

            $sector->vgood = $this->cleanDecimal(($sector->vgood / $sector->total) * 100);
            $sector->good = $this->cleanDecimal(($sector->good / $sector->total) * 100);
            $sector->bad = $this->cleanDecimal(($sector->bad / $sector->total) * 100);
            $sector->medium =  $this->cleanDecimal((($sector->total - $sector->bad + $sector->good + $sector->vgood) / $sector->total) * 10);
        }



        return view('jonny.sector-detail', compact('sector', 'type', 'area'));
    }










    public function getData()
    {

        return array(
            'city' => $this->resultProviderService->statBuilderSectorArea(
                $this->resultProviderService->queryBuilder('city', false, false, false)
                // ->whereBetween('created_at', [Carbon::now()->subDays(90), Carbon::now()])
            ),
            'subcity' => $this->resultProviderService->statBuilderSectorArea($this->resultProviderService->queryBuilder('subcity', false, false, false)),
            'wereda' => $this->resultProviderService->statBuilderSectorArea($this->resultProviderService->queryBuilder('wereda', false, false, false))
        );
    }

    public function loadDashboard()
    {
        $sectors = $this->getSectorSummary('city');
        $total = 0;
        foreach ($sectors as $sector) {
            $total += $sector->stats['average'];
        }

        $globalAverage = $this->cleanDecimal(($total / count($sectors)) / 5 * 100, 1);

        $status = $this->defineStats($globalAverage);



        return view('jonny.dashboard', ['sectors' => $sectors,
                                         "globalAverage" => $globalAverage,
                                         "addisAbabaStatus" => $status,
                                         'subcities' => $this->subcitySummary()]);
    }


    public function subcityList()
    {
        $subcities = $this->subcitySummary();
        $sectors =  $this->getSectorSummary('subcity');

        return view('jonny.subcity', ["subcities" => $subcities, "sectors" => $sectors]);
    }

    public function sectorList()
    {

        $sectors = Sector::where('type', 'city')->get();

        foreach ($sectors as $sector) {
            $sector->stats =  $this->statBuilder($this->queryBuilder('city', false, $sector->id, false));
        }


        return view('jonny.list-sectors', ["sectors" => $sectors]);
    }

    public function getDataByQuestions($type = false, $area_id = false, $sector_id = false, $question_id = false)
    {
        $questions =  $question_id ? Question::where('id', $question_id) : Question::all();

        foreach ($questions as $question) {
            unset($question->answer_set);
            $question->stats = $this->statBuilder($this->queryBuilder($type, $area_id, $sector_id, $question->id));
        }
        //one or many
        return $question_id ? $questions->first() : $questions;
    }


    public function calculateAverageScore($type)
    {

        $results = Result::where([['type', $type]])->get();

        $total = 0;

        foreach ($results as $result) {
            if ($result->question_type == 'boolean') {
                $result->value = $result->value == 1 ? 1 : 5;
            }
            $total += $result->value;
        }

        return ($total / ($results->count()));
    }

    public function calculateOverallAverageBySector($type, $sector_id)
    {


        $results = Result::where([['type', $type], ['sector_id', $sector_id]])->get();

        return $results;
        $total = 0;

        foreach ($results as $result) {
            if ($result->question_type == 'boolean') {
                $result->value = $result->value == 1 ? 1 : 5;
            }
            $total += $result->value;
        }

        $questions = Question::all();
        $questions_results = array();
        foreach ($questions as $question) {
            $questions_results[$question->question] = $this->calculateSectorScoreByQuestion($type, $sector_id, false, $question->id);
        }

        $questions_results['average']  = $total / ($results->count());

        return $questions_results;
    }
    public function calculateSectorScore($type, $sector_id, $area_id)
    {


        $absolute_area_id = $area_id;
        if ($type == 'city') {
            $area_id = ['city_id', $area_id];
        } elseif ($type == 'subcity') {
            $area_id = ['subcity_id', $area_id];
        } else {
            $area_id = ['wereda_id', $area_id];
        }


        $questions = Question::all();
        $questions_results = array();
        foreach ($questions as $question) {
            $questions_results[$question->question] = $this->calculateSectorScoreByQuestion($type, $sector_id, $absolute_area_id, $question->id);
        }


        $results = Result::where([['type', $type], ['sector_id', $sector_id], $area_id])->get();

        $total = 0;

        foreach ($results as $result) {
            if ($result->question_type == 'boolean') {
                $result->value = $result->value == 1 ? 1 : 5;
            }
            $total += $result->value;
        }


        $questions_results['average'] = $total / ($results->count());
        return $questions_results;
    }


    public function calculateOverallAverageByArea($type, $area_id)
    {

        $questions =  Question::all();
        $questions_results = array(
            "key" => [],
            "value" => []
        );
        foreach ($questions as $question) {
            array_push($questions_results['key'], $question->question);
            array_push($questions_results['value'], $this->calculateSectorScoreByQuestion($type, false, $area_id, $question->id));
        }

        $questions_results['average'] = $this->cleanDecimal(array_sum($questions_results['value']) / count($questions_results['value']));
        if ($questions_results['average'] > 3.33) {
            $questions_results['status'] = 'good';
        } elseif ($questions_results['average'] > 1.67) {
            $questions_results['status'] = 'danger';
        } else {
            $questions_results['status'] = 'bad';
        }

        return $questions_results;
    }


    public function calculateSectorSummary($type, $sector_id, $area_id)
    {
        $sectors = Sector::where('type', $type)->get();
        $sector_results = array(
            "id" => [],
            "key" => [],
            "value" => []
        );
        foreach ($sectors as $sector) {
            array_push($sector_results['id'], $sector->id);
            array_push($sector_results['key'], $sector->name);
            array_push($sector_results['value'], $this->calculateSectorScore($type, $sector->id, $area_id)['average']);
        }
        return $sector_results;
    }
    public function calculateSectorSummaryView($type, $sector_id, $area_id)
    {
        $sectors = Sector::where('type', $type)->get();
        $sector_results = array(
            "id" => [],
            "key" => [],
            "value" => []
        );
        foreach ($sectors as $sector) {
            array_push($sector_results['id'], $sector->id);
            array_push($sector_results['key'], $sector->name);
            array_push($sector_results['value'], $this->calculateSectorScore($type, $sector->id, $area_id)['average']);
        }
        return $sector_results;
    }


    public function calculateSectorScoreByQuestion($type, $sector_id = false, $area_id = false, $question_id = false)
    {


        // die(json_encode(
        //     array(
        //         "type"=>$type,
        //         "sector_id"=>$sector_id,
        //         "area_id"=>$area_id,
        //         "question_id"=>$question_id
        //         )
        // ));
        $paremeter = [['type', $type]];


        if ($type == 'city') {
            $area_id = ['city_id', $area_id];
        } elseif ($type == 'subcity') {
            $area_id = ['subcity_id', $area_id];
        } else {
            $area_id = ['wereda_id', $area_id];
        }

        $sector_id = $sector_id ? ['sector_id', $sector_id] : false;
        $question_id = ['question_id', $question_id];


        $area_id ? array_push($paremeter, $area_id) : null;
        $question_id ? array_push($paremeter, $question_id) : null;
        $sector_id ? array_push($paremeter, $sector_id) : null;



        $results = Result::where($paremeter)->get();



        $total = 0;

        foreach ($results as $result) {
            if ($result->question_type == 'boolean') {

                $result->value = $result->value == 1 ? 1 : 5;
            }
            $total += $result->value;
        }


        return $total ? $this->cleanDecimal($total / ($results->count())) : 0;
    }


    public function cleanDecimal($value, $pref = false)
    {
        return number_format((float)$value, $pref ? $pref : 2, '.', '');
    }




    public function sectorSummary($type)
    {
        $sectors = Sector::where('type', $type)->get();
        foreach ($sectors as $sector) {
            $sector->value = $this->getSectorAverage($sector->id, $type);
        }
        return $sectors;
    }

    public function subcitySummary()
    {
        $subcities = Subcity::all();

        foreach ($subcities as $subcity) {
            $subcity->average =  $this->cleanDecimal(($this->calculateOverallAverageByArea('subcity', $subcity->id)['average'] / 5) * 100);
            $subcity->status = $this->defineStats($subcity->average);
        }
        return $subcities;
    }
    //   public function getData(){
    //       return $this->getSectorSummary('subcity',1);
    //   }

    //   public function loadDashboard(){
    //     $sectors = $this->getSectorSummary('city');
    //     $total = 0;
    //     foreach($sectors as $sector){
    //         $total += $sector->stats['average'];
    //     }


    //     $globalAverage = $this->cleanDecimal(($total/count($sectors))/5 * 100,1);


    //     $status = $this->defineStats($globalAverage);

    //     return view('dashboard',['sectors'=>$sectors,"globalAverage"=>$globalAverage,"addisAbabaStatus"=>$status,'subcities'=>$this->subcitySummary()]);
    //   }


    public function showSectorSummary($type = "city", $sector_id = false, $area_id = false)
    {
        return view('jonny.sector-summary', ['sector' => $this->getSectorDetail($type, $area_id, $sector_id)]);
    }
    public function getSubcity($id)
    {

        $subcity = Subcity::where('id', $id)->with('weredas')->get()->first();

        $subcity->weredas = Wereda::where('subcity_id', $subcity->id)->get();
        $subcity->sectors = $this->getSectorSummary('subcity', $subcity->id);

        return view('jonny.about-subcity', compact('subcity'));
    }

    public function showSectorDetail($type, $sector_id, $area_id)
    {
        return view('jonny.sector-summary', ['sector' => $this->getSectorDetail($type, $area_id, $sector_id)]);
    }

    public function getWereda($id)
    {
        $wereda = Wereda::findOrfail($id);
        $sectors = Sector::where('type', 'wereda')->get();
        return view('wereda', compact('wereda', 'sectors'));
    }


    // public function combinedSectorAverages($type){
    //     $sectors = Sector::where('type',$type)->get();
    //     foreach($sectors as $sector){
    //         if($sector->type == 'city' && $sector->id == 4){
    //             return Sector::where([['name',$sector->name],['type','subcity']])->get()->pluck('id');
    //         }
    // }
    // }
    public function grandTotal($type, $sector_id)
    {
        $absolute_sector_id = $sector_id;

        switch ($type) {
            case 'city':
                $sector_id  = 'sector_city_id';
                $array = [];
                $link = Link::where($sector_id, $absolute_sector_id)->with('subcity', 'wereda')->get()->first();

                array_push($array, $this->statBuilder($this->queryBuilder($type, false, $link->city->id, false)));

                //1
                if ($link->subcity) {
                    $link->subcity->average = $this->statBuilder($this->queryBuilder($type, false, $link->subcity->id, false));
                    array_push($array, $this->statBuilder($this->queryBuilder($type, false, $link->subcity->id, false)));
                }

                $link->wereda ? array_push($array, $this->statBuilder($this->queryBuilder($type, false, $link->wereda->id, false))) : null;
                //2

                $average = 0;
                foreach ($array as $record) {
                    $average += $record['percentage'];
                }

                $link->average = $average;
                $link->divisor = count($array);
                $link->average = $this->cleanDecimal($link->average / $link->divisor, 1);

                return $link;

                break;
            case 'subcity':
                $sector_id  = 'sector_subcity_id';
                $array = [];
                $link = Link::where($sector_id, $absolute_sector_id)->with('wereda')->get()->first();
                $link->wereda ? array_push($array, $this->statBuilder($this->queryBuilder($type, false, $link->wereda->id, false))) : null;


                $average = 0;
                foreach ($array as $record) {
                    $average += $record['average'];
                }


                $link->average = $average;
                $link->divisor = count($array);

                return $link;
                break;
            case 'wereda':
                return false;
                // $sector_id = 'sector_wereda_id';
                // // $link = Link::where($sector_id,$absolute_sector_id)->with('subcity.wereda')->get();
                break;
        }
    }


    public function getSectorSummary($type, $area_id = false, $sector_id = false)
    {

        $sectors = Sector::where('type', $type)->orderByDesc('id')->get();

        $absolute_area_id = $area_id;
        if ($area_id) {
            if ($type == 'city') {
                $area_id  = 'city_id';
            } elseif ($type == 'subcity_id') {
                $area_id  = 'subcity_id';
            } else {
                $area_id = 'wereda_id';
            }
        }
        $array = [];
        if ($sector_id) {
            $sector = Sector::findorFail($sector_id);
            $divisor = 1;
            $sector->stats = $this->statBuilder($this->queryBuilder($type, $absolute_area_id, $sector->id, false));
            if (Sector::where('parent_id', $sector->id)->get()->count()) {
                $subcity = Sector::where('parent_id', $sector->id)->get()->first();
                $subcity->stats =  $this->statBuilder($this->queryBuilder('subcity', false, $sector->id, false));
                $sector->subcity = $subcity;
                $divisor++;
            }
            if (Sector::where('parent_id', $sector->id)->get()->count() && Sector::where('parent_id', $sector->subcity->id)->get()->count()) {
                $wereda = Sector::where('parent_id', $sector->subcity->id)->get()->first();
                $wereda->stats =  $this->statBuilder($this->queryBuilder('wereda', false, $wereda->id, false));
                $sector->wereda = $wereda;
                $divisor++;
            }
            $sector->questions = $this->getDataByQuestions($type, $absolute_area_id, $sector->id);


            $sector->grandTotal = $this->cleanDecimal((($sector->stats['percentage']) + ($sector->subcity->stats['percentage'] ?? 0) + ($sector->wereda->stats['percentage'] ?? 0)) / $divisor);

            return $sector;
        } else {
            foreach ($sectors as $sector) {
                $divisor = 1;
                $sector->stats = $this->statBuilder($this->queryBuilder($type, $absolute_area_id, $sector->id, false));
                if (Sector::where('parent_id', $sector->id)->get()->count()) {
                    $subcity = Sector::where('parent_id', $sector->id)->get()->first();
                    $subcity->stats =  $this->statBuilder($this->queryBuilder('subcity', false, $sector->id, false));
                    $sector->subcity = $subcity;
                    $divisor++;
                }
                if (Sector::where('parent_id', $sector->id)->get()->count() && Sector::where('parent_id', $sector->subcity->id)->get()->count()) {
                    $wereda = Sector::where('parent_id', $sector->subcity->id)->get()->first();
                    $wereda->stats =  $this->statBuilder($this->queryBuilder('wereda', false, $wereda->id, false));
                    $sector->wereda = $wereda;
                    $divisor++;
                }
                $sector->questions = $this->getDataByQuestions($type, $absolute_area_id, $sector->id);


                $sector->grandTotal = $this->cleanDecimal((($sector->stats['percentage']) + ($sector->subcity->stats['percentage'] ?? 0) + ($sector->wereda->stats['percentage'] ?? 0)) / $divisor);
            }
            return $sectors;
        }
    }



    public function getSubcitiesForGraphs()
    {

        $subcities = Subcity::all();
        $response = array(
            "key" => [],
            "value" => []
        );

        foreach ($subcities as $subcity) {
            array_push($response['key'], $subcity->abbrevation);
            array_push($response['value'], $this->statBuilder($this->queryBuilder('subcity', $subcity->id, false, false))['percentage']);
        }
        return $response;
    }

    public function getSectorsForGraphs($type)
    {


        $sectors = Sector::where('type', $type)->get();;
        $response = array();

        foreach ($sectors as $sector) {

            array_push($response, array(
                "key" => $sector->id,
                "name" => $sector->name,
                "value" => $this->statBuilder($this->queryBuilder($type, false, $sector->id, false))['percentage']
            ));
        }
        return $response;
    }

    public function getQuestionGraphsForGraphs()
    {

        $questions = Question::all();
        $response = array();

        foreach ($questions as $question) {
            array_push($response, array(
                "key" => $question->id,
                "name" => $question->question,
                "value" => $this->statBuilder($this->queryBuilder(false, false, false, $question->id))['percentage']
            ));
        }
        return $response;
    }





    public function getSectorDetail($type, $area_id = false, $sector_id)
    {

        $questions = Question::all();

        $sector = Sector::findorFail($sector_id);

        $absolute_area_id = $area_id;
        if ($area_id) {
            if ($type == 'city') {
                $area_id  = 'city_id';
            } elseif ($type == 'subcity_id') {
                $area_id  = 'subcity_id';
            } else {
                $area_id = 'wereda_id';
            }
        }

        foreach ($questions as $question) {
            if ($question->type == 'boolean') {
                $question->value = !$question->value  ? 5 : 1;
            }
            $question->stats = $this->statBuilder($this->queryBuilder($type, $absolute_area_id, $sector->id, $question->id));
        }
        $sector->questions = $questions;
        return $sector;
    }



    public function queryBuilder($type = false, $area_id = false, $sector_id = false, $question_id = false)
    {
        $paremeter = [];
        $absolute_area_id = $area_id;
        if ($area_id) {
            if ($type == 'city') {
                $area_id = 'city_id';
            } elseif ($type == "subcity") {
                $area_id = 'subcity_id';
            } else {
                $area_id = 'wereda_id';
            }
        }

        $type ? array_push($paremeter, ['type', $type]) : null;
        $area_id ? array_push($paremeter, [$area_id, $absolute_area_id]) : null;
        $sector_id ? array_push($paremeter, ['sector_id', $sector_id]) : null;
        $question_id ? array_push($paremeter, ['question_id', $question_id]) : null;
        return  Result::where($paremeter)->get();
    }

    public function statBuilder($data)
    {



        $total = 0;

        foreach ($data as $record) {

            if ($record->question_type == 'boolean') {
                $record->value = !$record->value ? 5 : 1;
            }
            $total += $record->value;
        }

        $average = $total != 0 ? $total / $data->count() : 0;
        $percentage = ($this->cleanDecimal($average) / 5 * 100);


        return array(
            "total_questions" => $data->count(),
            "total_people" => $data->count() / Question::all()->count(),
            "average" => $this->cleanDecimal($average),
            "percentage" => $this->cleanDecimal($percentage, 1),
            "status" => $this->defineStats($percentage),
            "statusColorClass" => $this->defineStatColors($percentage),
            "isEmpty" => !$data->count() ? true : false
        );
    }
    public function defineStats($value)
    {

        if ($value >= 95) {
            return 'vgood';
        } elseif ($value < 95 && $value >= 80) {
            return 'good';
        } elseif ($value < 80 && $value >= 60) {
            return 'medium';
        } else {
            return 'bad';
        }
    }
    public function defineStatColors($value)
    {

        if ($value >= 95) {
            return 'info';
        } elseif ($value < 95 && $value >= 80) {
            return 'success';
        } elseif ($value < 80 && $value >= 60) {
            return 'warning';
        } else {
            return 'danger';
        }
    }
}
