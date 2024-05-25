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

#### Steps - PUT

1. Crete `UpdateCustomerRequest`
   1. `php artisan make:request V1\UpdateCustomerRequest`
   2. File: `app/Requests/V1/UpdateCustomerRequest.php`
   3. Copy the `rules()` and `prepareForValidation()` from `StoreCustomerRequest` class.
2.

## Base Models for PascalCase

## Sample Code Highlights

## References

The example created here is based on the PHP course,

* [How to build a REST API with Laravel (Sec 4.1)](https://youtu.be/YGqCZjdgJJk?t=3940).
* [Updating with PUT/PATCH (Sec 4.2)](https://youtu.be/YGqCZjdgJJk?t=4487)
* [GitHub](https://github.com/tutsplus/build-a-restful-api-with-laravel-2022)
* [TutsPlus](https://code.tutsplus.com/how-to-build-a-rest-api-with-laravel-php-full-course--cms-93786t).
