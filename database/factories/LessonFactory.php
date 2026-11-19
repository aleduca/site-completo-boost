<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->sentence(4);

        return [
            'category_id' => Category::factory(),
            'course_id' => fake()->boolean(70) ? Course::factory() : null,
            'title' => rtrim($title, '.'),
            'slug' => Str::slug($title),
            'video_url' => 'https://www.youtube.com/watch?v='.fake()->regexify('[A-Za-z0-9_-]{11}'),
            'description' => fake()->optional()->paragraph(),
        ];
    }

    /**
     * Indicate that the lesson does not belong to any course.
     */
    public function withoutCourse(): static
    {
        return $this->state(fn (array $attributes): array => [
            'course_id' => null,
        ]);
    }
}
