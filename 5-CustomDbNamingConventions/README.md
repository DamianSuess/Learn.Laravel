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
4. Update migration stub and create `CustomBlueprint`
   1. Create `Common/CustomBlueprint.php` used to override `Blueprint` class' `snake_case` column names.
   2. Update `stubs/migration.create.stub` to use our `CustomBlueprint` class

## Code Sample Highlights

...

## References

* Item-1
