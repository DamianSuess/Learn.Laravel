<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
Learn Laravel with Suess Labs and Xeno Innovations, Inc.
</p>

# Laravel - With Sail

## Steps to Reproduce

1. Download and install Docker
2. Create new Laravel project
   1. `composer create-project laravel/laravel SampleSailApp`
3. Install Sail
   1. `composer require laravel/sail --dev`
   2. `php artisan sail:install` - _Configure project for Docker_
4. `.vendor/bin/sail up` - _Kick off Docker container for our  Laravel Sail app_
5. Navigate to `http://localhost`

## Code Sample Highlights

...

## References

* [Laravel Sail](https://laravel.com/docs/12.x/sail)
* [Laravel Saili in 2 minutes (YouTube)](https://www.youtube.com/watch?v=ZzTkkXZfOkw)
