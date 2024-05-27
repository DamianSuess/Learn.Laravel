<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Bulk Store Invoice Request
 *
 * Input Sample:
 *  `[{ customerId: }, { customerId: }]`
 */
class BulkStoreInvoiceRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    // allow anyone to be authorized
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    // Array's key is the info coming from the client (hence, camelCase not PascalCase)
    // validate individual objects inside the array
    return [
      // `*.` signifies we're working with an array of data
      // If the invoices were under "data" element, you define it as: "data.*.customerId"
      "*.customerId" => ["required", "integer"],
      "*.amount" => ["required", "numeric"],
      "*.status" => ["required", Rule::in([1, 2, 3])], // 1=Billed, 2=Paid, 3=Void
      "*.billedDttm" => ["required", "date_format:Y-m-d H:i:s"],
      "*.paidDttm" => ["date_format:Y-m-d H:i:s", "nullable"],
    ];
  }

  /**
   * Prepare the data for validation. Overrides, ValidatesWhenResolvedTrait::prepareForValidation()
   * @return void
   */
  protected function prepareForValidation()
  {
    $data = [];
    foreach ($this->toArray() as $obj) {
      $obj["CustomerId"] = $obj["customerId"] ?? null;
      $obj["BilledDttm"] = $obj["billedDttm"] ?? null;
      $obj["PaidDttm"] = $obj["paidDttm"] ?? null;

      $data[] = $obj;
    }

    $this->merge($data);
  }
}
