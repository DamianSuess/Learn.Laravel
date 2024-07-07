<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Flight;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Customer::factory()
      ->has(Flight::factory()->count(3))
      ->create();
  }
}
