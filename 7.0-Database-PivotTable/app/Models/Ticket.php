<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Ticket extends Pivot
{
  use HasFactory;

  public function updateCoupon($couponCode)
  {
    //$this->coupon = $couponCode;
    $this->seat = $couponCode;
  }
}
