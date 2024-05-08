# Laravel 11 Form Validation

Sample web app performing form validation.

This example retains the previous input box details if the user input is incorrect and provides hints in such an event.

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

### Retaining Previous input

The Blade view, `createUser.blade.php` uses the `{{ old('FieldName') }}` feature to reinsert the Input box's previously typed value when an error occurs on the form's submit.

### Form Validation

Inside of `FormController.php` we define rules for the following inputs:

```php
    $validatedData = $request->validate(
      [
        "name"      => "required",
        "password"  => "required|min:5",
        "email"     => "required|email|unique:users",
      ],
      ...
```

This is then handled in the `createuser.blade.php` file to catch the errors, if any. There are 3 different methods used to report back Form input errors caused by the user:

1. Using `@if ($errors->any()) ... @endif` to display a `Div` block at the top
2. Using `@error('fieldName') ... @enderror` to display a `Span` under the input box.
3. Using `@if ($errors->has('fieldName')) ... @endif` to display a `Span` under the input box

## Reference

This sample is extends upon the [Form Validation](https://www.itsolutionstuff.com/post/laravel-11-form-validation-example-tutorialexample.html) blog post.
