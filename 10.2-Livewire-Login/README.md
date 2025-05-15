<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
Learn Laravel with Suess Labs and Xeno Innovations, Inc.
</p>

# Laravel 12 - Livewire User Login/Register Example

## Steps to Reproduce

1. Project Setup and Cleanup
   1. `composer create-project laravel/laravel 10.2-Livewire-Login`
   2. `composer require --dev friendsofphp/php-cs-fixer`
   3. `./vendor/bin/php-cs-fixer fix`
2. `composer require livewire/livewire`
3. `php artisan livewire:layout`
4. Create layouts, executing the following commands:
   * `php artisan make:livewire Register`
   * `php artisan make:livewire Login`
   * `php artisan make:livewire Dashboard`
   * `php artisan make:livewire Logout`
5. This will generate the following files:
   * `app/Livewire/Register.php`
   * `app/Livewire/Login.php`
   * `app/Livewire/Dashboard.php`
   * `app/Livewire/Logout.php`
   * `resources/views/livewire/register.blade.php`
   * `resources/views/livewire/login.blade.php`
   * `resources/views/livewire/dashboard.blade.php`
   * `resources/views/livewire/logout.blade.php`

## Code Sample Highlights

...

## References

* [Ref Article 1](https://www.allphptricks.com/laravel-10-livewire-user-registration-and-login/)
* [Ref Article 2](https://www.allphptricks.com/laravel-11-custom-user-registration-and-login-tutorial/)
