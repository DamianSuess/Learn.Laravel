<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * JSON Resource for returning back a single customer based on it's Id.
 */
class CustomerResource extends JsonResource
{
  // * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
  /**
   * Transform the resource into an array.
   *
   * @param \Illuminate\Http\Request $request
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    // $this derives from resource, model "\App\Models\Customer"
    // NOTE: The attribute names ARE case-sensitive! The 'key' is what gets returned to the user.

    return [
      "id"      => $this->Id,
      "name"    => $this->Name,
      "type"    => $this->CustomerTypeId,
      "email"   => $this->Email,
      "address" => $this->Address,
      "city"    => $this->City,
      "state"    => $this->State,
      "postalCode"  => $this->PostalCode,
      // Only include when an invoice "is loaded"
      // $relationship is the name of `Invoice` table
      "invoices" => InvoiceResource::collection($this->whenLoaded("Invoice")),
    ];
  }
}
