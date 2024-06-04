<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Assert;
use Tests\TestCase;

class CustomerTest extends TestCase
{
  // Perform database migration
  use RefreshDatabase;

  /**
   * A basic feature test example.
   */
  public function testGetCustomersSuccessfully(): void
  {
    $response = $this->get('/customers');
    $response->assertStatus(404);

    $response = $this->get('/api/v1/customers');
    $response->assertStatus(200);
  }

  public function testCreatesCustomerSuccessfully(): void
  {
    // Create 1st Customer using the factory
    $customer = Customer::factory()->create();

    // Create a 2nd via JSON API
    $response = $this->postJson(
      "/api/v1/customers",
      [
        "name" => "Test CustomerName",
        "type" => "2",
        "email" => "ttc1@yahoo.com",
        "address" => "1215 June Street",
        "city" => "Magna Carta",
        "state" => "New England",
        "postalCode" => "40202-5917",
        "country" => "USA",
      ]
    );

    $response->assertStatus(201)
      ->assertJson(
        array('data' =>
        [
          "id" => 2,
          "name" => "Test CustomerName",
          "type" => "2",
          "email" => "ttc1@yahoo.com",
          "address" => "1215 June Street",
          "city" => "Magna Carta",
          "state" => "New England",
          "postalCode" => "40202-5917",
        ])
      );
  }
}
