<?php
namespace Database\Seeders;

use App\Models\Subcity;
use App\Models\Wereda;

use Illuminate\Database\Seeder;

class SubcitySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void

     */
    public function run()
    {
        //

        $subcities = [
            array(
                "name"=>"yeka",
                "abbrevation"=>"yeka"

            ),
            array(
                "name"=>"kirkos",
                "abbrevation"=>"kirkos"
            ),
            array(
                "name"=>"arada",
                "abbrevation"=>"arada"
            ),

            array(
                "name"=>"bole",
                "abbrevation"=>"bole"
            ),
            array(
                "name"=>"nefas-Silk Laphto",
                "abbrevation"=>"N/silk"
            ),
            array(

                "name"=>"gullele",
                "abbrevation"=>"gullele"
            ),
            array(
                "name"=>"kolfe-Keranio",
                "abbrevation"=>"kolfe"
            ),
            array(
                "name"=>"lideta",

                "abbrevation"=>"lideta"
            ),
            array(
                "name"=>"addis Ketema",
                "abbrevation"=>"A/Ketema"
            ),
            array(
                "name"=>"akaki-Kality",
                "abbrevation"=>"A/Kality"

            ),
            array(
                "name"=>"lemi Kura",
                "abbrevation"=>"lemi"
            ),
        ];

        foreach($subcities as $subcity){
            $subcity = Subcity::create([

                "name"=>$subcity['name'],
                "abbrevation"=>$subcity['abbrevation']
            ]);

        for($i=1;$i<5;$i++){
            $wereda = Wereda::create([
                'name'=>'Wereda 0'.$i,
                'subcity_id'=>$subcity->id
            ]);

        }



        }
    }
}
