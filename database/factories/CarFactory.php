<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'carname' => $this->faker->words(rand(2, 4), true),
            'carcolour' => $this->faker->text,
            'rangeprice' => $this->faker->randomFloat(2, 1000, 5000),
            'created_at' => now(),
        ];
    }
}
