<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  use HasFactory;

  public function products()
  {
    // Default: when using table, `invoice_product`
    // return $this->belongsToMany(Product::class);

    return $this
      ->belongsToMany(
        Product::class,
        "invoiceitems",   // Name of pivot table
        "invoice_id",     // Column related to our model
        "product_id"      // Column related to other model that stores, `invoice_id`
      )
      ->as("invoiceitem")     // Custom pivot name for the relationship (default: `pivot`)
      ->withTimestamps()      // Update the `created_at` and `updated_at` timestamps
      ->withPivot(["seat"])   // Columns on the pivot table to retrieve
      ->using(InvoiceItem::class); // Custom pivot model used in the relationship
  }
}
