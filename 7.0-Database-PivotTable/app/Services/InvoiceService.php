<?php

namespace App\Services;

use App\Models\Customer;

class InvoiceService
{
  /**
   * Create a new class instance.
   */
  public function __construct()
  {
  }

  /**
   * Set a coupon code to the invoice.
   *
   * @param int     $flightId    Invoice ID
   * @param string  $couponCode  [Coupon code
   *
   * @return  void
   */
  public function storeCoupon($flightId, $couponCode): void
  {
    $customer = Customer::find(1);
    $customer->flights()->attach($flightId, ["seat" => $couponCode]);
  }

  /**
   * Get list of customer coupons used.
   * @param   int   $customerId  Customer ID
   * @return  array List of coupons ever used
   */
  public function getCustomerCouponsUsed($customerId): array
  {
    $arr = [];

    $customer = Customer::find($customerId);
    foreach ($customer->flights as $flight) {

      array_push($arr, $flight->ticket->seat);

      // Specify the custom pivot accessor (`ticket`) used for the relationship.
      echo "Coupon Used: " . $flight->ticket->seat;

      // Get column data using base "pivot" name
      // echo "Coupon Used: " . $flight->pivot->seat;   // Use
    }

    return $arr;
  }

  /**
   * Update Invoice Coupon Code.
   * @param int     $customerId  Customer ID
   * @param int     $invoiceId   Invoice ID
   * @param string  $couponCode  Coupon Code
   * @return  void
   */
  public function updateInvoiceCoupon($customerId, $invoiceId, $couponCode): void
  {
    $customer = Customer::find($customerId);
    $flight = $customer->flights()->find($invoiceId);
    $flight->ticket->updateCoupon($couponCode);
  }
}
