<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Institution>
 */
class InstitutionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'I. E. M. '.$this->faker->name(),
            'rector' => $this->faker->text(40),
            'zone' => $this->faker->randomElement(['Urbano', 'Rural']),
            'address' => $this->faker->text(50),
            'phone' => $this->faker->numberBetween(3000000000, 3509999999),
            'email' => $this->faker->email()
        ];
    }
}
