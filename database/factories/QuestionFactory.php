<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quizz;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->sentence(),
            'quizz_id' => Quizz::factory(),
            'answer_id' => null, // Will be set after creating answers
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Question $question) {
            // Create 4 answers for each question
            $answers = Answer::factory()->count(4)->create(['question_id' => $question->id]);
            // Set one random answer as correct
            $correctAnswer = $answers->random();
            $question->update(['answer_id' => $correctAnswer->id]);
        });
    }
}
