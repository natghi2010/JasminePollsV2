<?php

namespace Database\Seeders;

use App\Enums\UserLevelEnums;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

class UserSeeder extends Seeder

{
    /**

    * Run the database seeds.
     *
     * @return void
     */

     public function run()
    {
        $predefinedUsers = [
            ['name' => 'Natnael', 'email' => 'natghi2010@gmail.com'],

            ['name' => 'Fikir', 'email' => 'fikir@gmail.com'],
            ['name' => 'Bisrat', 'email' => 'bisrat@gmail.com'],
            ['name' => 'Yohannes', 'email' => 'yohannes@gmail.com'],
        ];

        $usersToInsert = array_map(function ($user) {
            return [
                'name' => $user['name'],
                'email' => $user['email'],

                'user_level' => UserLevelEnums::ADMIN,
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Using the default password from the factory
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $predefinedUsers);


        // Use a raw query to insert users for optimization
        DB::table('users')->insert($usersToInsert);
    }
}
