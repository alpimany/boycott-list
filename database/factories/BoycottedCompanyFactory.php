<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BoycottedCompany;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BoycottedCompany>
 */
final class BoycottedCompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'image' => 'https://boycott-israel.org/img/logos/apple.png',
            'location' => fake()->country(),
            'description' => preg_replace('/(.([^.]{100,}\.))/m', '$1\\n', fake()->realTextBetween(200, 450)),
            // 'impact_level' => fake()->numberBetween(1, 5),
        ];
    }
}
