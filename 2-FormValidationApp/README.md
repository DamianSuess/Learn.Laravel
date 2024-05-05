# Laravel 11 Form Validation

Sample web app performing form validation

## Steps to Reproduce

1. `composer create-project laravel/laravel FormValidationApp`
2. Create Controller - FormController
   1. `php artisan make:controller FormController`
   2. File: `app/Http/Controllers/FormController.php`
3. Create Routes in `routes/web.php`
   1. Add routes to manage GET and POST requests
4. Create Blade (view) File
   1. `php artisan make:view createUser`
   2. File: `resources\views\createUser.blade.php`
5. `php artisan serve`
   1. [Launch!](http://localhost:8000/users/create)

## Code Sample Highlights

### FormController.php

There are multiple ways to report back Form errors found via the FormController.php

1. Using `@if ($errors->any()) ... @endif` to display a `Div` block at the top
2. Using `@error('fieldName') ... @enderror` to display a `Span` under the input box.
3. Using `@if ($errors->has('fieldName')) ... @endif` to display a `Span` under the input box

## Reference

https://www.itsolutionstuff.com/post/laravel-11-form-validation-example-tutorialexample.html
