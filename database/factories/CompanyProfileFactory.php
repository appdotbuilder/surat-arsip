<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyProfile>
 */
class CompanyProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->paragraphs(3, true),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->companyEmail(),
            'website' => $this->faker->url(),
            'logo_path' => $this->faker->optional()->filePath(),
            'vision' => $this->faker->sentence(10),
            'mission' => $this->faker->paragraphs(2, true),
            'history' => $this->faker->paragraphs(5, true),
            'social_media' => [
                'facebook' => $this->faker->optional()->url(),
                'twitter' => $this->faker->optional()->url(),
                'instagram' => $this->faker->optional()->url(),
                'linkedin' => $this->faker->optional()->url(),
            ],
        ];
    }
}