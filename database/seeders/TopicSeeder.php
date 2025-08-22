<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Topic;


class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $lessonTopics = [
            'Introduction to Algebra' => [
                'Basic Concepts' => ['Variables and Constants', 'Expressions and Equations'],
                'Operations' => ['Addition and Subtraction', 'Multiplication and Division'],
            ],
            'Photosynthesis Basics' => [
                'Photosynthesis Process' => ['Light-dependent Reactions', 'Calvin Cycle'],
                'Plant Anatomy' => ['Chloroplast Structure', 'Role of Chlorophyll'],
            ],
            'World War II Overview' => [
                'Major Events' => ['Invasion of Poland', 'Battle of Stalingrad'],
                'Key Figures' => ['Winston Churchill', 'Adolf Hitler'],
            ],
            'Computer Hardware Fundamentals' => [
                'Core Components' => ['CPU and RAM', 'Motherboard'],
                'Peripheral Devices' => ['Input Devices', 'Output Devices'],
            ],
            'Shakespearean Literature' => [
                'Major Works' => ['Hamlet', 'Macbeth'],
                'Themes and Style' => ['Tragedy and Comedy', 'Iambic Pentameter'],
            ],
        ];

        foreach ($lessonTopics as $lessonTitle => $topics) {
            $lesson = Lesson::where('name', $lessonTitle)->first();

            if (!$lesson)
                continue;

            foreach ($topics as $topicTitle => $subTopics) {
                $topic = Topic::create([
                    'lesson_id' => $lesson->id,
                    'name' => $topicTitle,
                ]);

                foreach ($subTopics as $subTopicTitle) {
                    Topic::create([
                        'lesson_id' => $lesson->id,
                        'parent_id' => $topic->id,
                        'name' => $subTopicTitle,
                    ]);
                }
            }
        }

    }
}
