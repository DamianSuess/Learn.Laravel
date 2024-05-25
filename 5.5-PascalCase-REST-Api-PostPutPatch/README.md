# Laravel 11 - Custom DB Naming Conventions

Building on the previous example, **5.4-PascalCase-REST-Api**, we're adding the ability to Post, Put, and Patch.

## Reproduce

### Part 1 - Create POST handler AKA: "_store()_"

1. Starting with the previous project, _**5.4-PascalCase-Filter**_
2. Updated tables to migration script
   1. `CustomerType` for `Customer` table to denote 1=Individual, 2=Business
   2. `PaidStatus` for `Invoice` table
3. Update `CustomerController` adding the `store(..)` method.
4. Update model `Customer`, adding DB columns to `$fillable` (previously, "magic" auto-filled it).
5. Create `StoreCustomerRequest`
   1. `php artisan make:request V1\StoreCustomerRequest`
   2. File: `app\Requests\V1`
   3. Add, `rules()`
6. Create `RestTest.http` for testing
   1. Path: `tests/RestTest.http`
   2. Add `POST` test with `Content-Type:` and `Accept:` set to `application/json`
      1. `Accept: application/json` is very important, otherwise it will redirect to a webpage (HTTP 302)

### Part 2 - Updating entries via PUT

#### Overview

* HTTP PUT - Replace an entire entity
  * You must include ALL fields required to replace, regardless.
* HTTP PATCH - Update using only the supplied fields
* Laravel's Controller `update()` handles both of these requests

#### Steps

1. Crete `UpdateCustomerRequest`
   1. `php artisan make:request V1\UpdateCustomerRequest`
   2. File: `app/Requests/V1/UpdateCustomerRequest.php`
2. Configure the `UpdateCustomerRequest`
   1. Copy\paste the `rules()` and `prepareForValidation()` from `StoreCustomerRequest` class into our class.
   2. Set the `authorization()` to `return true;`
3. Add 'PUT' to our `rules()`
   1. `if $method == 'PUT') {...}` - it **MUST** be UPPERCASE.
4. Add 'PATCH' to our rules `rules()`
   1. Add  `"sometimes"` to the rules array elements
   2. i.e. `"name" => ["sometimes", "required"],`

## Sample Code Highlights

### Request Class - Order of Execution

1. `authorize()` - Check if we're authorized to access
2. `prepareForValidation()` - Prepare the data for validation. _Overrides, ValidatesWhenResolvedTrait::prepareForValidation()_
3. `rules()` - Get the validation rules that apply to the request

### Request Class - Authorization

> **Remember**: Request classes override `authorize()` for our tests only; but NEVER in production.
>
> ```php
>   public function authorize(): bool
>   {
>     // Blindly returning `true` allows anyone to be authorized
>     return true;
>     ////return false;
>   }
> ```

## References

The example created here is based on the PHP course,

* [How to build a REST API with Laravel (Sec 4.1)](https://youtu.be/YGqCZjdgJJk?t=3940).
* [Updating with PUT/PATCH (Sec 4.2)](https://youtu.be/YGqCZjdgJJk?t=4487)
* [GitHub](https://github.com/tutsplus/build-a-restful-api-with-laravel-2022)
* [TutsPlus](https://code.tutsplus.com/how-to-build-a-rest-api-with-laravel-php-full-course--cms-93786t).
