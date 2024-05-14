<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class InvoiceFactory extends Factory
{
  /**
   * Name of the factory's corresponding model
   * @var string
   */
  protected $model = Invoice::class;

  /**
   * Define the model's default state
   *
   * @return  array
   */

  public function definition(): array
  {
    // 1 = Billed, 2 = Paid, 3 = Void
    $statusTypeId = $this->faker->numberBetween(0, 3);

    return [
      "CustomerId" => Customer::factory(),
      "Amount" => $this->faker->numberBetween(1, 5000),
      "PaidStatusId" => $statusTypeId,
      "BilledDttm" => $this->faker->dateTimeThisDecade(),
      "PaidDttm" => $statusTypeId == 1 ? $this->faker->dateTimeThisDecade() : null,
    ];
  }
}
