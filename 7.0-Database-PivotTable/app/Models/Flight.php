<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
  use HasFactory;

  public function customers()
  {
    return $this
      ->belongsToMany(
        Customer::class,
        "tickets",      // Name of pivot table
        "flight_id",    // Column related to our model
        "customer_id"   // Column related to other model that stores, `customer_id`
      )
      ->as("ticket")          // Custom pivot name for the relationship (default: `pivot`)
      ->withTimestamps()      // Update the `created_at` and `updated_at` timestamps
      ->withPivot(["seat"])   // Columns on the pivot table to retrieve
      ->using(Ticket::class); // Custom pivot model used in the relationship
  }
}
