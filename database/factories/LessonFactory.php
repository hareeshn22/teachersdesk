<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lesson;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    protected $model = Lesson::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        //     'course_id' => \App\Models\Schoolpro\Course::inRandomOrder()->first()->id,
        //     'subject_id' => \App\Models\Schoolpro\Subject::inRandomOrder()->first()->id,

        //     // These IDs should exist in your schoolpro DB
        //     // 'course_id' => $this->faker->numberBetween(1, 10),
        //     // 'subject_id' => $this->faker->numberBetween(1, 50),

        //     'title' => $this->faker->sentence(5),
        //     'content' => $this->faker->paragraphs(3, true),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        ];
    }

}
