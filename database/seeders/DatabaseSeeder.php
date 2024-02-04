<?php

use Database\Seeders\CitySeeder;
use Database\Seeders\QuestionSeeder;
use Database\Seeders\ResultsSeeder;
use Database\Seeders\SectorSeeder;
use Database\Seeders\SubcitySeeder;
use Database\Seeders\SurverySeeder;
use Database\Seeders\TestSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\WeredaSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([

            QuestionSeeder::class,
            UserSeeder::class,
            CitySeeder::class,
            SubcitySeeder::class,
            WeredaSeeder::class,
            SectorSeeder::class,

            SurverySeeder::class,
            ResultsSeeder::class

        ]);
    }
}
