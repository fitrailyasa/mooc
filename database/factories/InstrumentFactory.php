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
            'date' => now(),
            'name' => $this->faker->name(),
            'place' => $this->faker->address(),
            'designation' => $this->faker->sentence(),
            'organisation' => $this->faker->sentence(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'age' => $this->faker->numberBetween(30, 60),
            'expertise' => $this->faker->randomElement(['Academia', 'Research', 'Software Development', 'Administration']),
            'qualification' => $this->faker->randomElement(['Bachelor', 'Master', 'Doctorate']),
            'experience' => $this->faker->randomElement(['Less than 5 years', '5 to 10 years', 'More than 10 years']),
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
        ];
    }
}
