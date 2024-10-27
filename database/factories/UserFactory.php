<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'username' => $this->faker->userName(),
            'role' => $this->faker->randomElement(['user']),
            'status' => $this->faker->randomElement(['aktif']),
            'no_hp' => $this->faker->phoneNumber(),
            'place' => $this->faker->address(),
            'designation' => $this->faker->sentence(),
            'organisation' => $this->faker->sentence(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'age' => $this->faker->numberBetween(30, 60),
            'expertise' => $this->faker->randomElement(['Academia', 'Research', 'Software Development', 'Administration']),
            'qualification' => $this->faker->randomElement(['Bachelor', 'Master', 'Doctorate']),
            'experience' => $this->faker->randomElement(['Less than 5 years', '5 to 10 years', 'More than 10 years']),
            'email' => fake()->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

}
