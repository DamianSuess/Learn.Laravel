<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
{
  /**
   * 1st - Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    // Allow anyone to be authorized, otherwise `return false;`
    return true;
  }

  /**
   * 3rd - Get the validation rules that apply to the request.
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
   * 2nd - Prepare the data for validation. Overrides, ValidatesWhenResolvedTrait::prepareForValidation()
   * @return void
   */
  protected function prepareForValidation(): void
  {
    // NOTE:
    //  Prepare or sanitize any data from the request before you apply your validation rules.
    //  `merge(..)` sets a route param into the request.
    //
    //  If an item is added below, but missing from POST/PUT/PATCH
    //  it will fail to update the DB. `merge(..)` forcibly adds it to the Form Input array

    // Kept as an example for PUT
    if ($this->postalCode)
      $this->merge(["PostalCode" => $this->postalCode]);

    // Alt approach: For PATCH to rename JSON to Customer model/DB.
    ////if ($this->name)    $this->merge(["Name"            => $this->name]);
    ////if ($this->type)    $this->merge(["CustomerTypeId"  => $this->type]);
    ////if ($this->email)   $this->merge(["Email"           => $this->email]);
    ////if ($this->address) $this->merge(["Address"         => $this->address]);
    ////if ($this->city)    $this->merge(["City"            => $this->city]);
    ////if ($this->state)   $this->merge(["State"           => $this->state]);
    ////if ($this->country) $this->merge(["Country"         => $this->country]);
  }
}
