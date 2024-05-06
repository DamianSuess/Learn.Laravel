# Laravel 11 - Project Name Here

## Steps to Reproduce

1. Create base project
2. Create new `BaseModel.php`
   1. `php artisan make:model BaseModel`
   2. Override the `const` for CreatedAt, etc.
   3. Override the `getTable()` method
3. Create [stubs](https://laravel-news.com/customizing-stubs-in-laravel)
   1. `php artisan stub:publish`
   2. Edit `stubs/model.stub`, replacing `Model` with `BaseModel`

## Code Sample Highlights

...

## References

* Item-1
