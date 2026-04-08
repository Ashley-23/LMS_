<?php

namespace Database\Factories;

use App\Models\Quizz;
use App\Models\Subsection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Quizz>
 */
class QuizzFactory extends Factory
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
            'subsection_id' => Subsection::factory(),
        ];
    }
}
