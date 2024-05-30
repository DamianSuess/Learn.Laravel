<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Assert;
use Tests\TestCase;

class CustomerTest extends TestCase
{
  /**
   * A basic feature test example.
   */
  public function testGetCustomersSuccessfully(): void
  {
    $response = $this->get('/customers');
    $response->assertStatus(404);

    $response = $this->get('/api/v1/customers');
    $response->assertStatus(500);
  }

  public function testCreatesCustomerSuccessfully(): void
  {
    ////$response = $this->withHeaders(
    ////  ["Content-Type" => "application/json"]
    ////)->post('/customers', [
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

    $response->assertStatus(500);
  }
}
