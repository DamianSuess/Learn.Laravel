<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    // allow anyone to be authorized
    return true;
    ////return false;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    $method = $this->method();

    // NOTE:
    // Array's key is the info coming from the client (hence, camelCase not PascalCase)

    if ($method == 'PUT') {
      return [
        "name" => ["required"],
        "type" => ["required", Rule::in([1, 2, 3])],
        "email" => ["required", "email"],
        "address" => ["required"],
        "city" => ["required"],
        "state" => ["required"],
        "country" => ["required"],
        "postalCode" => ["required"],
      ];
    } else {
      // Assuming, PATCH
      return [
        "name" => ["sometimes", "required"],
        "type" => ["sometimes", "required", Rule::in([1, 2, 3])],
        "email" => ["sometimes", "required", "email"],
        "address" => ["sometimes", "required"],
        "city" => ["sometimes", "required"],
        "state" => ["sometimes", "required"],
        "country" => ["sometimes", "required"],
        "postalCode" => ["sometimes", "required"],
      ];
    }
  }

  /**
   * Prepare the data for validation. Overrides, ValidatesWhenResolvedTrait::prepareForValidation()
   * @return void
   */
  protected function prepareForValidation()
  {
    // Check for required constraint before merging in
    // If a required field is missing then we'll error-out.

    if ($this->type && $this->address)
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
