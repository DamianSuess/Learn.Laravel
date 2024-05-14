<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCollection extends ResourceCollection
{
  /**
   * Transform the resource collection into an array.
   * @param \Illuminate\Http\Request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray(Request $request): array
  {
    return parent::toArray($request);
  }
}
