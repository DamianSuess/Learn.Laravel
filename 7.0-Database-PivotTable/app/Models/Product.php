<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  public function invoices()
  {
    return $this
      ->belongsToMany(
        Invoice::class,
        "invoiceitems",   // Name of pivot table
        "product_id",     // Column related to our model
        "invoice_id"      // Column related to other model that stores, `invoice_id`
      )
      ->as("invoiceitem")           // Custom pivot name for the relationship (default: `pivot`)
      ->withTimestamps()            // Update the `created_at` and `updated_at` timestamps
      ->withPivot(["seat"])         // Columns on the pivot table to retrieve
      ->using(InvoiceItem::class);  // Custom pivot model used in the relationship
  }
}
