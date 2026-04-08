<?php

namespace Database\Factories;

use App\Models\Chapter;
use App\Models\Subsection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subsection>
 */
class SubsectionFactory extends Factory
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
            'content' => $this->faker->paragraph(),
            'chapter_id' => Chapter::factory(),
        ];
    }
}