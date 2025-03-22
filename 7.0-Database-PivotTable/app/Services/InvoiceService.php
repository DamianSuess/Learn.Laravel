<?php

namespace App\Services;

use App\Models\Invoice;

class InvoiceService
{
  /**
   * Create a new class instance.
   */
  public function __construct()
  {
  }

  /**
   * Set a coupon code to the product.
   *
   * @param int     $productId   Product ID
   * @param string  $couponCode  [Coupon code
   *
   * @return  void
   */
  public function storeCoupon($productId, $couponCode): void
  {
    $invoice = Invoice::find(1);
    $invoice->products()->attach($productId, ["coupon" => $couponCode]);
  }

  /**
   * Get list of invoice coupons used.
   * @param   int   $invoiceId  Invoice ID
   * @return  array List of coupons ever used
   */
  public function getInvoiceCouponsUsed($invoiceId): array
  {
    $arr = [];

    $invoice = Invoice::find($invoiceId);
    foreach ($invoice->products as $product) {

      array_push($arr, $product->invoiceitem->coupon);

      // Specify the custom pivot accessor (`ticket`) used for the relationship.
      echo "Coupon Used: " . $product->invoiceitem->coupon;

      // Get column data using base "pivot" name
      // echo "Coupon Used: " . $product->pivot->coupon;   // Use
    }

    return $arr;
  }

  /**
   * Update Invoice Coupon Code.
   * @param int     $invoiceId  Invoice ID
   * @param int     $productId  Product ID
   * @param string  $couponCode Coupon Code
   * @return  void
   */
  public function updateInvoiceCoupon($invoiceId, $productId, $couponCode): void
  {
    $invoice = Invoice::find($invoiceId);
    $product = $invoice->products()->find($productId);
    $product->invoiceitem->updateCoupon($couponCode);
  }
}
