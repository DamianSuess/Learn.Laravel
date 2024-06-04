<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param \Illuminate\Http\Request $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray(Request $request): array
  {
    // $this derives from resource, model "\App\Models\Invoice"
    // NOTE: The attribute names ARE case-sensitive! The 'key' is what gets returned to the user.

    return [
      "id"          => $this->Id,
      "customerId"  => $this->CustomerId,
      "amount"      => $this->Amount,
      "status"      => $this->PaidStatusId,
      "billedDate"  => $this->BilledDttm,
      "paidDate"    => $this->PaidDttm,
    ];
  }
}
