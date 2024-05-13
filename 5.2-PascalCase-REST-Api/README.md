# Laravel 11 - Custom DB Naming Conventions

This example builds a full RESTful API with the database using PascalCase naming conventions for both tables and column names.

The example created here is based on the PHP course, [How to build a REST API with Laravel](https://www.youtube.com/watch?v=YGqCZjdgJJk) sections 3.1 and 3.2.

> **Why build this?**
>
> No every organization uses the same database naming conventions, especially when there is a debate between singular vs plural, PascalCase/camelCase/snake_case. >
>
> Frankly, my organization moved away from `snake_case` years ago. And most 3rd-party frameworks (_should_) allow you to pick and choose your own naming conventions.

This example replaces Laravel's database naming conventions with your own custom definitions. Now tables are singular (`Users` -> `User`) and columns use `PascalCase` instead of `snake_case`

This leverages the Stubs for class templates and overrides `Blueprint` class with our own `PascalBlueprint` class.

## Reproduce

1. Starting with the previous project, _**5.1 - PascalCase Seeder**_
2. Install API routes
   1. `php artisan install:api`
3. Create controllers for Customer and Invoice
   1. `php artisan make:controller Api/V1/CustomerController`
   2. `php artisan make:controller Api/V1/InvoiceController`
4. Add routes to `routes/api.php`
   1. Create endpoints to point to our controllers.

## Base Models for PascalCase


## Sample Code Highlights

## References

* [How to build a REST API with Laravel](https://www.youtube.com/watch?v=YGqCZjdgJJk)
  * Sections 3.1 and 3.2
