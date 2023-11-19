<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Remittance>
 */
class RemittanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description'=>$this->faker->text(300),
            'institution_id'=>$this->faker->numberBetween(1, 10),
            'stock'=>$this->faker->numberBetween(1, 9),
            'image' => $this->faker->imageUrl(150,200),
            'numberStudent'=>$this->faker->numberBetween(500, 1000),
        ];
    }
}
