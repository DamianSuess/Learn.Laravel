<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
Learn Laravel with Suess Labs and Xeno Innovations, Inc.
</p>

## About Laravel

This example was created show the delta between Laravel v11 and v12 via the pull request and documented outlines.

Check out the official [upgrade to Laravel 12](https://laravel.com/docs/12.x/upgrade) page for more information. For complete changes, check out the [GitHub 11.x <- 12.x](https://github.com/laravel/laravel/compare/11.x...12.x) comparison.

## Basic Upgrading

1. Open, `composer.json`
2. Updating Dependencies
   * `laravel/framework` to ^12.0
   * `phpunit/phpunit` to ^11.0
   * `pestphp/pest` to ^3.0
3. Carbon 2.x must upgrade to v3.x
4. Update packages
   * `composer update`
5. Update the Laravel Installer
   * `composer global update laravel/installer`

## Creating Delta Sample

The following steps can be used to create your very old comparison project. This uses Git to clearly show the differences between the two versions.

1. `composer create-project laravel/laravel 9.0-Upgrade11to12 11.*`
   1. Generate Laravel v11 project
2. Commit contents to Git
3. Delete folder contents
4. `composer create-project laravel/laravel 9.0-Upgrade11to12`
   1. Generate Laravel v12 project
5. Compare!

### Key Differences

The differences between 11 and 12 are fairly minimal. Version 12 performs the folowing changes. No new files were added to the default project, and two were removed:

* .env.example
  * Removes definition, `APP_TIMEZONE=UTC`
  * Disables definition vs not setting it, `# CACHE_PREFIX=`
* .gitignore
  * NEW: `/storage/pail`
  * NEW: `/.nova`
  * NEW: `/.ZED`
* artisan (_2 lines_)
  * Minor: `$status` app bootstrapper is no longer fluently defined.  `$app` is a eparate statements now.
* composer.json (_5 lines_)
  * Package upgrades
  * `laravel/tinker`
  * `laravel/pail`
  * `laravel/sail`
  * `nunomaduro/collision`
  * `phpunit/phpunit`
* composer.lock (_33 lines_)
  * Package upgrades, specifically Symphony
* config/app.php (_1 line_)
  * Before: `    'timezone' => env('APP_TIMEZONE', 'UTC'),`
  * After: `    'timezone' => 'UTC',`
* config/database.php (_1 line_)
  * Added: `redis => [ options => [ ..., 'persistent' => env('REDIS_PERSISTENT', false), ] ... ]`
* config/logging.php (_2 lines_)
  * Before: `stderr => [ ... 'with' ]`
  * After: `stderr => [ ... 'handler_with' ]`
* package.json (_+3, -4 lines_)
  * Removed: `autoprefixer`
  * Removed: `postcss`
  * Added: `@tailwindcss/vite`
  * Upgraded: `tailwindcss` from 3.4 to 4.0
* postcss.config.js  (**REMOVED**)
* public/index.php (_+5, -2 lines_)
  * No major difference. `$app` bootstrapper changed to inline from fluent style.
* resources/css/app.css (_+11, -3 lines_)
  * Removes `@tailwind definitions`
  * New: `@source .. and @theme` definitions
* resources/views/welcome.blade.php (_+248, -147 lines_)
  * (_LAYOUT IS NOW A LAME ADVERTISEMENT_)
* tailwind.config.js (**REMOVED**)
* vite.config.js (_2 lines_)
  * Adds plugin, tailwindcss
