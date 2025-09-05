<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use App\Models\Course;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $subjects = ['Telugu', 'Hindi', 'English', 'Mathematics', 'Science', 'Social Studies', 'Computer', 'Sanskrit',];

        $courses = Course::where('stream_id', '=', 1)->get();
        

        foreach ($courses as $course) {
            $stream = $course->stream->name;
            foreach ($subjects as $subjectName) {
                Subject::create([
                    'course_id' => $course->id,
                    'name' => $subjectName,
                    'code' => strtoupper(str_replace(' ', '', $stream) . '-' . str_replace(' ', '',$course->name) . '-' . substr($subjectName, 0, 3))
                ]);
            }
        }


    }
}
