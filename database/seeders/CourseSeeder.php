<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $courses = [
            'Pre-Nursery',
            'Nursery',
            'LKG',
            'UKG',
            'Class I',
            'Class II',
            'Class III',
            'Class IV',
            'Class V',
            'Class VI',
            'Class VII',
            'Class VIII',
            'Class IX',
            'Class X',
            'Class XI',
            'Class XII',
        ];

        $streams = DB::table('streams')->pluck('id')->toArray();

        foreach ($streams as $stream) {
            foreach ($courses as $index => $courseName) {
                DB::table('courses')->insert([
                    'stream_id' => $stream,
                    'name' => $courseName,
                ]);
            }
        }


    }
}
