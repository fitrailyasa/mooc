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
            'question_id' => $this->faker->numberBetween(1, 34),

            'result' => $this->faker->numberBetween(1, 5),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
