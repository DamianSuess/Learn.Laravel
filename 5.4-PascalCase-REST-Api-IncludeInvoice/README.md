# Laravel 11 - Custom DB Naming Conventions

Building on the previous example, **5.2-PascalCase-REST-Api**, we're adding the ability to filter information via the _URL Query_.

This allows the user to filter via the query such as:

```txt
customers?postalCode[gt]=3000
```

> **Why PascalCase and not snake_case?**
>
> No every organization uses the same database naming conventions, especially when there is a debate between singular vs plural, PascalCase/camelCase/snake_case. >
>
> Frankly, my organization moved away from `snake_case` years ago. And most 3rd-party frameworks (_should_) allow you to pick and choose your own naming conventions.

This example replaces Laravel's database naming conventions with your own custom definitions. Now tables are singular (`Users` -> `User`) and columns use `PascalCase` instead of `snake_case`

This leverages the Stubs for class templates and overrides `Blueprint` class with our own `PascalBlueprint` class.

## Reproduce

1. Starting with the previous project, _**5.2-PascalCase-REST-Api**_
2. Install API routes
   1. `php artisan install:api`
   2. NOTE: The `personal_access_tokens` table is still ugly, `snake_case` (_for now_)
3. Create controllers for Customer and Invoice
   1. `php artisan make:controller Api/V1/CustomerController`
   2. `php artisan make:controller Api/V1/InvoiceController`
4. Add routes to `routes/api.php`
   1. Create endpoints to point to our controllers.
5. Debug and preview your results
   1. Seed your DB with test data: ` php artisan migrate:fresh --seed `
   2. [Customers API](http://localhost:8000/api/v1/customers)
   3. [Invoice API](http://localhost:8000/api/v1/invoices)
6. Create Resources, `CustomerResource` for viewing a single customer
   1. `php artisan make:resource V1\CustomerResource`
   2. File: `app\Http\Resources\V1\CustomerResource.php`
   3. Test: [Customers API](http://localhost:8000/api/v1/customers/1)
7. Create Resource, `CustomerCollection` for viewing all customers
   1. `php artisan make:resource V1\CustomerCollection`
   2. File: `app\Http\Resources\V1\CustomerCollection.php`
   3. Test: [Customers - Page 1](http://localhost:8000/api/v1/customers)
   4. Test: [Customers - Page 2](http://localhost:8000/api/v1/customers?page=2)
   5. This allos us to return the CustomerCollection based on CustomerResource using pagnation in CustomerController
8. Create Resources, `InvoiceResource` and `InvoiceCollection`
   1. `php artisan make:resource V1\InvoiceResource`
   2. `php artisan make:resource V1\InvoiceCollection`

## Base Models for PascalCase

## Sample Code Highlights

## References

The example created here is based on the PHP course, [How to build a REST API with Laravel](https://youtu.be/YGqCZjdgJJk?t=3521) sections 3.5. See also, [GitHub](https://github.com/tutsplus/build-a-restful-api-with-laravel-2022)
