<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
Learn Laravel with Suess Labs and Xeno Innovations, Inc.
</p>

# Laravel 12 - Livewire Startup Kit Example

Note this project uses, Node, which will cause an additional **~50 MB of bloat** in your dev environment.

## Steps to Reproduce

Note, if you prefer a more MVC approach to Livewire (_separating your view from controller_), chose **Volt: "NO"**.

1. `laravel new 10.1-Livewire-StarterKit`
   1. Starter Kit?: `livewire`
   2. Authentication Provider?: `laravel`
   3. Use Volt?: `yes`  (OPTIONAL)
   4. Testing Framewor?: `0` (Pest)
   5. Run npm install? `yes`
2. Enter the newly created directory
3. Install packages (i.e. Vite assets):
   1. `composer install`
   2. `npm install`
   3. `npm run build`
5. `php artisan serve`

## Requirements

* This startup kit uses Vite which requires [NodeJS](https://nodejs.org/en) and [NPM](https://github.com/npm/cli)

## References

* [Livewire](https://livewire.laravel.com/)
* [FluxUI](https://fluxui.dev/)
* [How to install NodeJS and NPM (youtube)](https://www.youtube.com/watch?v=m4D7G3k_TKA)
