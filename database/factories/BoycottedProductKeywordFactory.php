<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoycottedProductKeyword>
 */
class BoycottedProductKeywordFactory extends Factory
{
    private $keywords = ['apple', 'microsoft', 'google', 'amazon', 'vercel'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'label' => fake()->randomElement($this->keywords),
        ];
    }
}
