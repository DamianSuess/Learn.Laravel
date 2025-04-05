<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
Learn Laravel with Suess Labs and Xeno Innovations, Inc.
</p>

# Laravel 12 - Livewire Introduction

## Steps to Reproduce

```sh
composer create-project laravel/laravel 10.1-Livewire-Intro
composer require livewire/livewire
php artisan make:livewire sample-world
```

1. Create project
   1. `composer create-project laravel/laravel 10.1-Livewire-Intro`
   2. Copy in the VS Code template from "/0.0-Template--VSCode/"
   3. Erase the "head" and "body" contents from `/resources/views/welcome.blade.php`
2. Install Livewire
   * `composer require livewire/livewire`
3. Create new Livewire
   * `php artisan make:livewire sample-view`
   * NEW FILE: `app/Livewire/SampleView.php`
   * NEW FILE: `resources/views/livewire/sample-view.blade.php`
4. Update files
   1. `welcome.blade.php` - Insert our new Blade view renderer `<livewire:sample-view />`
   2. `sample-view.blade.php` - Add button to live refresh the page and display epoch time
   3. Bonus: Reformatted "H

## Code Sample Highlights

...

## References

For more [LiveWire](https://livewire.laravel.com) examples, check out the official documentation page.

* [LiveWire - Installation](https://livewire.laravel.com/screencast/getting_started/installation)
* [LiveWire - Actions](https://livewire.laravel.com/screencast/getting_started/actions?autoplay=true)
