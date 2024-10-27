<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instrument>
 */
class InstrumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(6, 100),
            'question' => json_encode([
                'q1' => $this->faker->numberBetween(70, 100),
                'q2' => $this->faker->numberBetween(70, 100),
                'q3' => $this->faker->numberBetween(70, 100),
            ]),

            'result' => json_encode([
                'score' => $this->faker->numberBetween(70, 100),
                'status' => $this->faker->randomElement(['Passed', 'Failed']),
                'comments' => $this->faker->sentence(),
            ]),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
