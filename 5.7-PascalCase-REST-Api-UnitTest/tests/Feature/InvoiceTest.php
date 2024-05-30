<?php

namespace Tests\Feature;

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
}
