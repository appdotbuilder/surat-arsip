<?php

namespace Database\Factories;

use App\Models\LetterCategory;
use App\Models\LetterStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OutgoingLetter>
 */
class OutgoingLetterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'letter_number' => 'OUT/' . date('Y') . '/' . $this->faker->unique()->numberBetween(1000, 9999),
            'recipient' => $this->faker->company(),
            'subject' => $this->faker->sentence(),
            'content' => $this->faker->optional()->paragraphs(3, true),
            'sent_date' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'letter_date' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'attachment_path' => $this->faker->optional()->filePath(),
            'category_id' => LetterCategory::factory(),
            'status_id' => LetterStatus::factory(),
            'created_by' => User::factory(),
            'notes' => $this->faker->optional()->paragraph(),
        ];
    }
}