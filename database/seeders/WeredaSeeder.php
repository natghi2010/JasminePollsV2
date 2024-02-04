<?php
namespace Database\Seeders;

use App\Models\Subcity;
use App\Models\Wereda;
use Illuminate\Database\Seeder;



class WeredaSeeder extends Seeder
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

        foreach($subcities as $subcity){
            $wereda = new Wereda();
            $wereda->name="Wereda 01";
            $wereda->subcity_id = $subcity->id;
            $wereda->save();

        }

    }
}
