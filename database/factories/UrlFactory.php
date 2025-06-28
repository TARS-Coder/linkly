<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Url>
 */
class UrlFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->name(),
            "original_url" => fake()->url(),
            "clicks" => fake()->numberBetween(10,100),
            "user_id" => User::factory(),
            "company_id" => Company::factory(),
        ];
    }
}
