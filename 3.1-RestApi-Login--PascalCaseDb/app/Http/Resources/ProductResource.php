<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
  /**
   * Transform the resource into an array (JSON format).
   *
   * @return array<string, \App\Models\Product>
   */
  public function toArray(Request $request): array
  {
    ////return parent::toArray($request);

    // REMEMBER: You must match your model's attribute casing (properties)
    return [
      'id' => $this->Id,
      'name' => $this->Name,
      'detail' => $this->Detail,
      'createdAt' => $this->CreatedAt->format('d/m/Y'),
      'updatedAt' => $this->UpdatedAt->format('d/m/Y'),
    ];
  }
}
