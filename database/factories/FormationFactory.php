<?php

namespace Database\Factories;

use App\Enums\FormationLevelEnum;
use App\Models\Formation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Formation>
 */
class FormationFactory extends Factory
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
            'description' => $this->faker->paragraph(),
            'duration' => $this->faker->numberBetween(1, 24),
            'user_id' => User::first()?->id, 
            'level' => $this->faker->randomElement(FormationLevelEnum::values()),
        ];
    }
}
