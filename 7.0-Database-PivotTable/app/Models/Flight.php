<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
  use HasFactory;

  public function customers()
  {
    return $this->belongsToMany(
      Customer::class,
      "tickets",  // Name of pivot table
      "flight",   // Column related to our model
      "client"    // Column related to other model that stores, `client_id`
      )->withTimestamps(); // Update the `created_at` and `updated_at` timestamps
  }
}
