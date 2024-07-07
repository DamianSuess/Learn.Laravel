<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
  /**
   * Define the model's default state.
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      "name" => $this->faker->unique()->name(),
      "airline" => $this->faker->unique()->name(),
    ];
  }
}
