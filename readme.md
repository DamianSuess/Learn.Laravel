# Learn Laravel 11

In this edition of the Suess Labs' Learn repository, we'll dive into the Laravel PHP framework for web applications.

Author: [Damian Suess](https://www.linkedin.com/in/damiansuess/)<br />
Website: [suesslabs.com](https://suesslabs.com)

## Overview

The following projects dive into the basics and customization of Laravel.

### Foreword

Looking back, I've usually always created custom micro-frameworks with PHP to keep things lean, quick, and target a project's needs. However, there are a few bottlenecks that can come of that. Namingly, _rapid prototyping, maintainability, and scalability_ can quickly pinch points throughout a product's lifecycle. As a consideration, frameworks like **Laravel** can assist with such things.

By all means, explore and build your frameworks! This will teach you a lot of solid fundamentals, especially the core functionality of PHP.

### PascalCase

In the PascalCase sample project the following mottos are applied:

> 1) The projects using **PascalCase** are an example of overriding Laravel's default naming conventions. In reality, most organizations have their own (legacy) conventions. Whether it be `passwd` vs. `password`, `userName` vs. `name`, or `rememberToken` instead of `remember_token`.
>
> 2) Most samples people provide are a 1-to-1 on the naming, leaning into the Laravel "_magic glue_".
>
> 3) A framework should be flexible and well-documented to suit the customer's needs. When it's too ridged, copious amounts of scaffolding and code smells will occur.

## Reproduce Samples

```sh
composer install
cp .env.example .env
php artisan migrate
php artisan key:generate
php artisan serve
```

### Extensions and More

Before running a sample project please note the following

1. The `.env` files are not saved by default.
   * Copy `.env.example` as `.env` before running
   * Error 500 may occur when the `.env` file is missing.
2. Run with VS Code and the suggested Extensions
   1. See, `.vscode/extensions.json` for more info.
3. Execute, `composer install` to download the Vendor packages.
4. Execute, `php artisan migrate` to create the database before running
   * `php artisan migrate:fresh` - Drop tables and recreate
   * `php artisan migrate:fresh --seed`  - Seed table with test data (_when project states to do so_)
5. Launch project, `php artisan serve`

## Sample Projects

0. Template Projects
   1. VS Code Project Template
   2. Custom Database Naming Convention Template
1. CRUD - _Basic webpage form with Create, Read, Update, and Delete operations_
2. Form Validation - _Form submission validator with recall of previously entered values_
3. REST API Login and CRUD operation - _Including VS Code tester using REST Client extension_
4. REST API and CRUD - _Slightly more complex implementation of the same thing_
5. Custom DB Naming Conventions - _Column names using PascalCase and not the gross `snake_case`._
   1. Pascal Case - Seeder - _DB Factory and Seeder example using your PascalCase columns_
   2. Pascal Case - API - _Web API for creating "Customers and Products"_
   3. Pascal Case - Filter Results
   4. Pascal Case - Include Invoice
   5. Pascal Case - POST PUT PATCH - _Create and Update items_
   6. Pascal Case - Upload Update - _Massive upload information to store in DB_
   7. Pascal Case - Unit Testing - _How to test your Custom DB Naming Conventions_
   8. _Pivot Table - **COMING SOON**_
6. _Web API Service - **COMING SOON** - Use services to link both View and API logic._
7. Database - Pivot Table

### Creating a Sample

```sh
composer create-project laravel/laravel #.#-AppName
composer require --dev friendsofphp/php-cs-fixer
./vendor/bin/php-cs-fixer fix       # Reformats EVERYTHING!
# ./vendor/bin/php-cs-fixer fix app # Reformats only /app/ folder
```

## References

The projects listed here are based on the following examples. The examples in this repository have been modified and improved upon (_bug fixes, added functionality, testability, etc._)

* [REST API Example](https://www.itsolutionstuff.com/post/laravel-11-rest-api-authentication-using-sanctum-tutorialexample.html)
* [CRUD Example](https://www.itsolutionstuff.com/post/laravel-11-crud-application-example-tutorialexample.html)
* [Form Validation Example](https://www.itsolutionstuff.com/post/laravel-11-form-validation-example-tutorialexample.html)

### Coming Soon

* Deleting Multiple Records
* Publish API Route File
* File Upload Example
* AJAX Request Example
* JQuery Ajax Loading Spinner Example
* Generate and Read Sitemap XML File Example
* Testing Database with Factory and Seeders

## Debugging Tips

Checkout [debugging.md](debugging.md) for more information

1. `php artisan migrate --pretend`
   1. Show the migration SQL queries before they're ran

## Naming Conventions

There are many "rules" out there which veer off from one another, however, the following appears to be widely accepted. (_Frankly, I often use Xeno Innovations' legacy rules._)

* Models - Always singular and `PascalCase`
* Controllers - Usually singular and ending with the word, `Controller`. i.e. `PostController`

## Other References

* [Database: Query Builder](https://laravel.com/docs/11.x/queries)
* [Deleting Multiple Records](https://websolutioncode.com/how-to-deleting-multiple-record-in-laravel)
* [Publish API Route File](https://www.itsolutionstuff.com/post/how-to-publish-api-route-file-in-laravel-11example.html)
* [File Upload Example](https://www.itsolutionstuff.com/post/laravel-11-file-upload-example-tutorialexample.html)
* [AJAX Request Example](https://www.itsolutionstuff.com/post/laravel-11-ajax-request-example-tutorialexample.html)
* [JQuery Ajax Loading Spinner Example](https://www.itsolutionstuff.com/post/laravel-jquery-ajax-loading-spinner-exampleexample.html)
* [Generate and Read Sitemap XML File Example](https://www.itsolutionstuff.com/post/laravel-11-generate-and-read-sitemap-xml-file-tutorialexample.html)
* Testing Database with Factory and Seeders - [Blog](https://code.tutsplus.com/how-to-build-a-rest-api-with-laravel-php-full-course--cms-93786t), [Video](https://www.youtube.com/watch?v=YGqCZjdgJJk&t=1045s)
