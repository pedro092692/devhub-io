<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
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
        return [
            'name' => $this->faker->sentence(),
            'url' => 'https://www.youtube.com/watch?v=-3ZM2iVu0y8',
            'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/-3ZM2iVu0y8?si=3J3EuQBidUi5lWpv"</iframe>',
            'platform_id' => 1
        ];
    }
}
