<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [

            [
                'name' => 'Natnael',
                'email' => 'natghi2010@gmail.com',
                'password' => Hash::make('password'),

                'type' => 'Admin',
            ],
            [
                'name' => 'Fikir',
                'email' => 'fikir@gmail.com',
                'password' => Hash::make('password'),
                'type' => 'Admin',
            ],
            [

                'name' => 'Bisrat',
                'email' => 'bisrat@gmail.com',
                'password' => Hash::make('password'),
                'type' => 'Admin',
            ],
            [
                'name' => 'Yohannes',
                'email' => 'yohannes@gmail.com',
                'password' => Hash::make('password'),

                'type' => 'Admin',
            ],
        ];

        DB::table('users')->insert($users);

    }
}
