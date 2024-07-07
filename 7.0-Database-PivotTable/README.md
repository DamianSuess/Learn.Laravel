# Laravel 11 - Database Pivot Table

Demonstration of creating database pivot tables with a many-to-many relationship and linking them via the models.

## Steps to Reproduce

```sh
# Create basic files
composer create-project laravel/laravel 7.0-Database-PivotTable
composer require --dev friendsofphp/php-cs-fixer

# Create migration and base objects
php artisan make:migration create_customer
php artisan make:model Customer
php artisan make:model Flight
php artisan make:class Services/InvoiceService

# Test data seeder
php artisan make:factory CustomerFactory
php artisan make:factory FlightFactory
php artisan make:seeder CustomerSeeder

# Testing
php artisan migrate:fresh
php artisan db:seed --class=CustomerSeeder
```

## Code Sample Highlights

...

## References

* [1](https://cosme.dev/post/using-pivot-tables-in-laravel-the-complete-guide-to-custom-intermediary-tables-in-manytomany-relationships)
