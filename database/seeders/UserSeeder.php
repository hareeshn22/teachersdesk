<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([

            [
                'name' => 'Ram Krishna',
                'email' => 'admin@school.com',
                'password' => Hash::make('teach9ram$'),
            ],
            // [
            //     'name' => 'Ravi Teja',
            //     'email' => 'ravi@nexus.com',
            //     'password' => Hash::make('channel123'),
            // ],
            // [
            //     'name' => 'Jr NTR',
            //     'email' => 'store@nexus.com',
            //     'password' => bcrypt('store123'),
            // ],
        ]);
    }
}
