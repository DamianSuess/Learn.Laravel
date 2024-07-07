<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  use HasFactory;

  public function flights()
  {
    // Default: when using table, `customer_flight`
    // return $this->belongsToMany(Flight::class);

    return $this->belongsToMany(
      Flight::class,
      "tickets",    // Name of pivot table
      "customer_id",   // Column related to our model
      "flight_id"      // Column related to other model that stores, `customer_id`
    )->withTimestamps()     // Update the `created_at` and `updated_at` timestamps
      ->withPivot("seat");  // Columns on the pivot table to retrieve
  }
}
