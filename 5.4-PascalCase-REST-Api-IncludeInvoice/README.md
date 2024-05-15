# Laravel 11 - Custom DB Naming Conventions

Building on the previous example, **5.3-PascalCase-REST-Api**, we're adding the ability to include Invoices to the Customer(s) being returned in JSON.

This allows the user to filter via the query such as:

```txt
customers?postalCode[gt]=30000&includeInvoice
```

## Reproduce

1. Starting with the previous project, _**5.3-PascalCase-Filter**_
2. Update `CustomerController` adding the `includeInvoices` query filter.
   1. Update `CustomerResource` to include `invoices` field when customer has invoices


## Base Models for PascalCase

## Sample Code Highlights

## References

The example created here is based on the PHP course, [How to build a REST API with Laravel](https://youtu.be/YGqCZjdgJJk?t=3521) sections 3.5. See also, [GitHub](https://github.com/tutsplus/build-a-restful-api-with-laravel-2022)
