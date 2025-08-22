<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    public function run(): void
    {
        // Fetch related IDs to maintain foreign key integrity
        // $streams  = DB::table('streams')->pluck('id')->toArray();
        // $courses  = DB::table('courses')->pluck('id')->toArray();
        $subjects = DB::table('subjects')->pluck('id')->toArray();

        if (empty($subjects)) {
            $this->command->warn('⚠️ Skipping LessonSeeder: missing dependent records in streams, courses, or subjects.');
            return;
        }

        // Example dataset — you can make this dynamic or pull from config/arrays
        $lessons = [
            'Introduction to Algebra',
            'Photosynthesis Basics',
            'World War II Overview',
            'Computer Hardware Fundamentals',
            'Shakespearean Literature',
        ];

        // Insert lessons with random but valid relationships
        foreach ($lessons as $lesson) {
            DB::table('lessons')->insert([
                // 'stream_id'  => $streams[array_rand($streams)],
                // 'course_id'  => $courses[array_rand($courses)],
                'subject_id' => $subjects[array_rand($subjects)],
                'name'       => $lesson,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
