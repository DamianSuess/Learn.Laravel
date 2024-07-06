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
      "tickets",  // Name of pivot table
      "client",   // Column related to our model
      "flight"    // Column related to other model that stores, `client_id`
      )->withTimestamps(); // Update the `created_at` and `updated_at` timestamps

  }
}
