<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // Works with PascalCase foreign key column, `Inventory.CustomerId`
    for ($i = 1; $i <= 5; $i++) {
      $customer = Customer::factory()->create();
      $invoices = Invoice::factory()
        ->count(3)
        ->for($customer)
        ->create();
    }

    // BUG:
    //  When using "has(...)",  Eloquent will incorrectly generate the column using
    //  "snake_case" as, `Inventory.customer_id`, reverting to snake_case.
    //
    //  Regardless of the FK (`CustomerId`) being called out in the Model, "Invoice", it still fails.
    //  As a workaround, you must create 'Customer::factory' first then attach it using `for($customer)`.
    //
    // Error:
    //  "SQLSTATE[HY000]: General error: 1 table Invoice has no column named customer_Id (Connection: sqlite, SQL: insert into "Invoice" ("CustomerId", "Amount", "PaidStatusId", "BilledDttm", "PaidDttm", "customer_Id", "UpdatedAt", "CreatedAt") values (3, 4426, 1, 2018-11-05 21:26:49, 2015-03-07 20:10:18, 2, 2024-05-12 19:40:11, 2024-05-12 19:40:11))"
    //
    //// Create 25 customers with 10 invoices
    Customer::factory()
      ->count(10)
      // ->hasInvoice(10)                   // Magic method; same as below
      ->has(Invoice::factory()->count(5))  // Same as `->hasInvoice(10)`
      ->create();

    // 5 customer that have 0 invoices
    Customer::factory()
      ->count(5)
      ->create();
  }
}
