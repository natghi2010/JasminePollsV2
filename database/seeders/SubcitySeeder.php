<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
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


        $subcities = [
            ["name" => "yeka", "abbrevation" => "yeka"],
            ["name" => "kirkos", "abbrevation" => "kirkos"],
            ["name" => "arada", "abbrevation" => "arada"],
            ["name" => "bole", "abbrevation" => "bole"],
            ["name" => "nefas-Silk Laphto", "abbrevation" => "N/silk"],
            ["name" => "gullele", "abbrevation" => "gullele"],
            ["name" => "kolfe-Keranio", "abbrevation" => "kolfe"],
            ["name" => "lideta", "abbrevation" => "lideta"],
            ["name" => "addis Ketema", "abbrevation" => "A/Ketema"],
            ["name" => "akaki-Kality", "abbrevation" => "A/Kality"],
            ["name" => "lemi Kura", "abbrevation" => "lemi"],
        ];

        // Insert subcities and retrieve their IDs to associate weredas
        foreach ($subcities as $subcity) {
            $subcityId = DB::table('subcities')->insertGetId([
                'name' => $subcity['name'],
                'abbrevation' => $subcity['abbrevation'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Prepare weredas related to this subcity
            $weredas = [];
            for ($i = 1; $i <= 4; $i++) {
                $weredas[] = [
                    'name' => 'Wereda 0' . $i,
                    'subcity_id' => $subcityId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Insert weredas in a batch for the current subcity
            DB::table('weredas')->insert($weredas);
        }
    }
    }

