# Laravel 11 - Web and API Service Sample

## Overview

Example for sharing logic between Web and API Controllers using a Service class.

### Problem Statement

The problem with maintaining the same controller for both Web views and API comes down to maintainability.

Because Laravel uses the same method names between Web and API Controllers such as, `index`, `store`, etc., they can technically be shared. However, a few of issues arise from this.

* PHP doesn't have overloaded methods
* Lead to much logic nesting - _if-statement hell_
* Difficult to maintain or grow organically

## Running Sample

```sh
composer install
php artisan migrate:fresh
php artisan serve
```

## Steps to Reproduce

```sh
composer create-project laravel/laravel 6.0-WebApiServiceApp
```

1. Blarg

## Code Sample Highlights

...

## References

* Item-1
