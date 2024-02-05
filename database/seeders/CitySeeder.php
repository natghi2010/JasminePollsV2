<?php
namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;


class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $predefinedCities = [
            ['name' => 'Addis Ababa', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Dire Dawa', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Gondar', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Hawassa', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Mekelle', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Jimma', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Bahir Dar', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Dessie', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Jijiga', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Shashamane', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Adama', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Arba Minch', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Debre Markos', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Debre Birhan', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Gambela', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Harar', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Jinka', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Negele Borana', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Nekemte', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Semera', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Shire', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Woldiya', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Wolaita Sodo', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Ziway', 'created_at' => now(), 'updated_at' => now()],
            // ['name' => 'Asosa', 'created_at' => now(), 'updated_at'=>now()],
            // Add more cities with timestamps
        ];

        // Use a raw query to insert cities for optimization
        \DB::table('cities')->insert($predefinedCities);

    }
}
