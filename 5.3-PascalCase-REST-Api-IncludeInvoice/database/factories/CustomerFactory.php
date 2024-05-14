<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CustomerFactory extends Factory
{
  /**
   * Name of the factory's corresponding model
   * @var string
   */
  protected $model = Customer::class;

  /**
   * Define the model's default state
   *
   * @return  array
   */
  public function definition(): array
  {
    // 1 = Individual, 2 = Business
    //// $type = $this->faker->randomElement(["1", "2"]);
    $type = $this->faker->numberBetween(0, 3);
    $name = $type == "1" ? $this->faker->name() : $this->faker->company();

    return [
      "Name" => fake()->words(asText: true),
      "CustomerTypeId" => $type,
      "Email" => $this->faker->email(),
      "Address" => $this->faker->streetAddress(),
      "City" => $this->faker->city(),
      "State" => $this->faker->state(),
      "PostalCode" => $this->faker->postcode(),
      "Country" => $this->faker->country(),
    ];
  }
}
