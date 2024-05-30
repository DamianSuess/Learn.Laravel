<?php

namespace Tests\Feature;

use Tests\TestCase;

class InvoiceTest extends TestCase
{
  public function testGetInvoicesReturnSuccess(): void
  {
    $response = $this->get("/invoices");
    $response->assertStatus(404);

    $response = $this->get("/api/v1/invoices");
    $response->assertStatus(500);

    // Examine and debug the response contents
    //$response->dumpHeaders();
    //$response->dumpSession();
    //$response->dump();
  }
}
