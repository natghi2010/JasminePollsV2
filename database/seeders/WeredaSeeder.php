<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
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
         // Retrieve all subcities. It's more efficient to just get the IDs if you only need them.
         $subcities = DB::table('subcities')->get(['id']);

         $weredasToInsert = [];
         foreach ($subcities as $subcity) {
             // Assuming you want to insert a single Wereda for each Subcity
             $weredasToInsert[] = [
                 'name' => 'Wereda 01',
                 'subcity_id' => $subcity->id,
                 'created_at' => now(),
                 'updated_at' => now(),
             ];
         }

         // Insert all Weredas in a batch operation
         DB::table('weredas')->insert($weredasToInsert);

    }
}
