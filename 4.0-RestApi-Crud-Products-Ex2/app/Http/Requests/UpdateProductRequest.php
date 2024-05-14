<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateProductRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    // Allow authorization for DEMO ONLY
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      "name"    => "required",
      "details" => "required",
    ];
  }

  // Override base 'failedValidation(..) method
  public function failedValidation(Validator $validator)
  {
    throw new HttpResponseException(response()->json([
      "success" => false,
      "message" => "Update validation errors",
      "data"    => $validator->errors()
    ]));
  }
}
