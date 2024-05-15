# Laravel 11 - Custom DB Naming Conventions

Building on the previous example, **5.3-PascalCase-REST-Api**, we're adding the ability to include Invoices to the Customer(s) being returned in JSON.

## Reproduce

1. Starting with the previous project, _**5.3-PascalCase-Filter**_
2. Update `CustomerController` method `index()` for showing all
   1. Adding the `includeInvoices` query filter.
   2. Update `CustomerResource` to include `invoices` field when customer has invoices
3. Updated `CustomerController` method `show()` method for showing a single record
4. Test
   * http://localhost:8000/api/v1/customers?postalCode[gt]=40000&includeInvoices=true
   * http://localhost:8000/api/v1/customers/1?includeInvoices=true

## Base Models for PascalCase

## Sample Code Highlights

## References

The example created here is based on the PHP course, [How to build a REST API with Laravel](https://youtu.be/YGqCZjdgJJk?t=3521) sections 3.5. See also, [GitHub](https://github.com/tutsplus/build-a-restful-api-with-laravel-2022)
