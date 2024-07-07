<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class InvoiceItem extends Pivot
{
  use HasFactory;

  public function updateCoupon($couponCode)
  {
    //$this->coupon = $couponCode;
    $this->coupon = $couponCode;
  }
}
