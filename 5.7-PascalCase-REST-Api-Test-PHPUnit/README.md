# Laravel 11 - API Unit Tests for Custom DB Naming Conventions

Create API Unit Tests, building on the previous example, **5.6-PascalCase-REST-Api**

We will be using PHPUnit instead of Pest. Despite Pest being built on top of PHPUnit, there are some missing features in it, bringing only syntactical sugar to the table - _I'm not the only one who things so_.

## Reproduce - PHPUnit

```sh
php artisan make:test CustomerTest
php artisan make:test InvoiceTest

php artisan test
```

1. Create new test using, `php artisan make:test CustomerTest`
   1. This will be created in the folder, `tests/Feature/`
2. Create new test using, `php artisan make:test InvoiceTest`
3. Validate via `php artisan test`
4. Add the ability to run migration scripts
   1. Inside our new classes add:
   2. `use Illuminate\Foundation\Testing\RefreshDatabase;`  - _after the namespace declaration_
   3. `use RefreshDatabase;` - _inside our class' curly braces_
   4. Now you won't get an HTTP 500 error.
5. Add some tests

## Sample Code Highlights

1. Tests names MUST be camelCase beginning with the suffix `test`
   1. Not, `Test`, it must be `test` or `test_`
2. To create a regular Unit Test, `php artisan make:test SomeTest --unit`
   1. This is suited for regular classes, etc.
3. To run tests in parallel, install an run the following:
   1. `composer require brianium/paratest --dev`
   2. `php artisan test --parallel`
   3. NOTE: `--do-not-cache-result` may not be available when ran in parallel
4. Code Coverage:
   1. `php artisan test --coverage`
   2. `php artisan test --coverage --min=80.3`   - _Enforces minimum coverage threshold_
5. Profiling Tests:
   1. `php artisan test --profile`

## References

* [Laravel v11 - Testing](https://laravel.com/docs/11.x/testing)
* [Does anyone here prefer PHPUnit to Pest? - Reddit](https://www.reddit.com/r/laravel/comments/155cw2e/does_anyone_here_prefer_phpunit_to_pest/)
