<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\Difficulty;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\projects>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(3);
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'priorityrank' => fake()->unique()->randomDigitNotNull(),
            'description' => fake()->text(),
            'gitrepo' => '',
            'icon' => 'img/default.svg',
            'status_id' => Status::factory(),
            'techstack_ids' => fake()->randomElements([1, 2, 3, 4], 3),
            'difficulty_id' => Difficulty::factory(),
        ];
    }
}
