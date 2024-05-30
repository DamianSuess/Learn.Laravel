<?php

namespace Tests\Feature;

use App\Models\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Assert;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
  // Perform database migration
  use RefreshDatabase;

  public function testGetInvoicesReturnSuccess(): void
  {
    $response = $this->get("/invoices");
    $response->assertStatus(404);

    $response = $this->get("/api/v1/invoices");
    $response->assertStatus(200);

    // Examine and debug the response contents
    //$response->dumpHeaders();
    //$response->dumpSession();
    //$response->dump();
  }

  public function testCreateInvoiceThroughModelFactorySuccessfully(): void
  {
    // Create 1st Customer using the factory
    $invoice = Invoice::factory()->create();

    $this->assertEquals(1, $invoice->Id);
  }

  /**
   * Runs the same test to ensure that the DB was cleaned before the test
   * @return  void
   */
  public function testCreateInvoiceThroughModelFactory2Successfully(): void
  {
    // Create 1st Customer using the factory
    $invoice = Invoice::factory()->create();

    // We can't statically validate the other info since it's random
    $this->assertEquals(1, $invoice->Id);
  }

  public function ZtestCreateInvoiceWithAPISuccessfully()
  {
    /*
    $response = $this->postJson(
      "/api/v1/invoices",
      [
        "customerId" => "1",
        "status" => "2",
      ]
    );

    $response->assertStatus(201)
      ->assertJson(
        array('data' =>
        [
          "id" => 2,
          ////"name" => "Test CustomerName",
          ////"type" => "2",
          ////"email" => "ttc1@yahoo.com",
          ////"address" => "1215 June Street",
          ////"city" => "Magna Carta",
          ////"state" => "New England",
          ////"postalCode" => "40202-5917",
        ])
      );
    */
  }
}
