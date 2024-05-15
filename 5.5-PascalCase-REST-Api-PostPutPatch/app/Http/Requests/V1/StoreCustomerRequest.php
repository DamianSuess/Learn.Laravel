<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends FormRequest
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
    return [
      "Name" => ["required"],
      "type" => ["required", Rule::in([1, 2, 3])],
      "email" => ["required", "email"],
      "address" => ["required"],
      "city" => ["required"],
      "state" => ["required"],
      "country" => ["required"],
      "postalCode" => ["required"],
    ];
  }

  /**
   * Prepare the data for validation. Overrides, ValidatesWhenResolvedTrait::prepareForValidation()
   * @return void
   */
  protected function prepareForValidation()
  {
    // Convert between DB table schema and incoming json data
    $this->merge([
      "Name"            => $this->name,
      "CustomerTypeId"  => $this->type, // NOTE: "type" is used in 'rules()' method
      "Email"           => $this->email,
      "Address"         => $this->address,
      "City"            => $this->city,
      "State"           => $this->state,
      "Country"         => $this->country,
      "PostalCode"      => $this->postalCode,
    ]);
  }
}
