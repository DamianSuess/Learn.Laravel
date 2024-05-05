# Terminology

## Definitions

### Basics

* **MVC** - Model-View-Controller is a design pattern that organizes code in a way that separates the business logic from the user interface. This allows users to scale their applications and easily manage code.
  * **Model** - Class data such as properties and business rules. Usually reflecting a database table or form entry. The 'M' in MVC.
  * **View** - The presentation layer (web page). This uses the Blade Template engine to join HTML and PHP'ish. The 'V' in MVC.
  * **Controller** - Class that handles user input/requests. The controller is the middle-man between the _View_ and the _Controller_. The 'C' in MVC
* **Composer** - Tool used to create base Laravel projects, dependencies,and libraries.
* **Artisan** - Command line interface included with Laravel (_from Symfony framework_). Allows developers to quickly create files and execute Laravel framework.
  * `php artisal list` - Show all available commands

### Laravel Terminology

* **Middleware** - Offers a convenient mechanism for filtering HTTP requests entering your application, acting as a bridge between a request and a response.
  * As an example, Laravel includes middleware that verifies the user's authentication status to redirect them to the correct page (login or home).
  * Path: `app/Http/Middleware`
  * Two types of middleware, defined in `app/Http/Kernel.php`
    1. Global Middleware - Runs on every HTTP request (`$middleware`).
    2. Route Middleware - Is assigned to a specific route (`$routeMiddleware`).
* **Migrations** - Database version control
* **Seeding** - Method of seeding your database with test data via the "seed classes". (Path: `database/seeders`).
* **Routes** - ...

## Laravel 11 Folder Structure

The base folder structure is as follows:

* `app` - _**Core code of your application**_
  * `Http`
    * `Controllers`
  * `Models`
  * `Providers` - Contains all of the service providers for your application
* `bootstrap` - Contains the app.php file which bootstraps the framework
  * `cache`
* `config` - Contains the application's configuration files
* `database` - Contains database migrations, model factories, and seeds
* `public` - Directory contains your assets such as images, JavaScript, and CSS
* `resources` - Contains your views as well as your raw, un-compiled assets such as CSS or JavaScript
* `routes` - Contains all of the route definitions for your application
  * `web.php`
  * `api.php` (_not installed by default_)
* `storage`
* `tests`
* `vendor` - Composer dependencies. (_DO NOT CHECK THIS INTO SOURCE CONTROL!_)

### Additional Folders

These directories do not exist by default. See [Laravel 11 Structure](https://laravel.com/docs/11.x/structure) for more information.

Many of them can be created via the `php artisal make:...` command

* `app`
  * `Broadcasting` - Broadcast channel classes for your application (`make:channel`)
  * `Console` - Custom Artisan commands for your application (`make:command`)
* `Events`
* `Exceptions`
* `Jobs`
* `Listeners`
* `Mail`
* `Notifications`
* `Policies`
* `Rules` - Contains the custom validation rule objects for your application (`make:rule`)

## References

[Laravel.com - Docs](https://laravel.com/docs/11.x)
[TutorialsPoint.com - Laravel](https://www.tutorialspoint.com/laravel)
